<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * User class
 * Servus! Open-Source Development Framework
 *
 */

class User extends AppModel {
    public $Table = "{__PREF__}users";
    public $Logged;
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "profile_id" => Array("maxlength" => 11, "required" => true),
        "department_id" => Array("type" => "select", "required" => true),
        "user" => Array("type" => "text", "maxlength" => 64, "required" => true, "onlyLetterNumber" => true, "extra" => "ref"),
        "email" => Array("type" => "text", "maxlength" => 64, "required" => true, "email" => true),
        "first_name" => Array("type" => "text", "maxlength" => 32, "required" => true),
        "last_name" => Array("type" => "text", "maxlength" => 64),
        "gender" => Array("type" => "radio"),
        "password" => Array("type" => "password", "maxlength" => 32, "required" => true),
        "picture" => Array(),
        "secret" => Array(),
        "date" => Array(),
        "last_update" => Array(),
        "status" => Array("type" => "radio")
    );

    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "full_name", "user", "profile_name", "register_date"),
        "icon" => "icon-user"
    );
    
    public function login($user, $password, $stay) {
        global $AdminSession;
        $this->connect();
        $query = "SELECT * FROM {$this->Table} WHERE user = '".mysql_real_escape_string($user)."' AND password = '".md5(SECRET.$password.SECRET)."'";
        $result = $this->query($query);
        if($result == true && mysql_num_rows($result) > 0) {
            $this->Logged = true;
            $this->get((int)mysql_result($result, 0, 'id'));
            $token = randStr(16);
            $_SESSION['s'] = $token.$this->secret;
            $cookie = str_rot13($token);
            $expire = ($stay == 1) ? time() + (3600 * 24 * 365) : null ;
            setcookie("s", $cookie, $expire, null, null, null, true);
            $AdminSession->register($this->id, $token, $stay);
            return true;
        } else {
            return false;
        }
    }
    
    
    
    public function can($mode, $control) {
        global $core;
        if($core->Controls[$control]['modes'] === "G") {
            return true;
        } else {
            return (bool)preg_match('/'.$mode[0].'/i', $this->permissions[$control]);
        }
    }
    
    public function auth() {
        global $AdminSession, $Admin;
        $this->Logged = true;
        $Admin->get((int)$AdminSession->user_id);
        $_SESSION['s'] = $AdminSession->token.$Admin->secret;
    }
    
    public function logged() {
        global $AdminSession;
        if(!$AdminSession) $AdminSession = new Session();
        $secret = $AdminSession->getSecret();
        if($this->Logged === true) {
            return true;
        } else
        if($secret === false) {
            return false;
        } else {
            $logged = $this->find("secret = '$secret'");
            if($logged === false) {
                return false;
            } else {
                $this->Logged = true;
                $this->get((int)$logged->id);
                return true;
            }
        }
    }
    
    public function picture($id, $file = null) {
        $user = new user();
        if($file == "" || $file === null) {
            $user->get((int)$id);
            if($user->picture != "") {
                echo 'images/avatars/'.$user->picture;
            } else {
                echo 'images/avatars/avatar-'.$user->sex.'.jpg';
            }
        } else {
            echo 'images/avatars/'.$file;
        }
    }
    
    // database functions
    public function AltQuery($where = null, $plus = null) {
        $Profile = new Profile();
        return "SELECT {$this->Table}.*, concat({$this->Table}.first_name, ' ', {$this->Table}.last_name) AS full_name, DATE_FORMAT({$this->Table}.date, '%d/%m/%Y') AS register_date,
                IF(LENGTH({$Profile->Table}.name)>0, {$Profile->Table}.name, 'Indefinido') AS profile_name
            FROM {$this->Table}
            LEFT OUTER JOIN {$Profile->Table}
            ON {$this->Table}.profile_id = {$Profile->Table}.id $where $plus";
    }
}
?>