<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Session class
 * Servus! Open-Source Development Framework
 *
 */

class Session extends AppModel {
    public $Table = "{__PREF__}sessions";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "user_id" => Array(),
        "start" => Array(),
        "end" => Array(),
        "stay" => Array(),
        "token" => Array("extra" => "ref"),
        "device" => Array(),
        "os" => Array(),
        "ip" => Array(),
        "status" => Array()
    );
    
    public function register($userId, $token, $stay = 0) {
        $info = userInfo();
        $this->user_id = $userId;
        $this->start = date("Y-m-d H:i:s");
        $this->end = ($stay == 1) ? date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s", mktime()) . " + 365 day")) : null ;
        $this->stay = $stay;
        $this->token = $token;
        $this->device = $info['browser']." ".$info['version'];
        $this->os = $info['os'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->status = 1;
        $this->insert();
    }
    
    public function check() {
        $token = str_rot13($_COOKIE['s']);
        return $this->get($token);
    }
    
    public function getSecret() {
        if($_COOKIE['s'] && $_SESSION['s']) {
            $token = str_rot13($_COOKIE['s']);
            $secret = str_replace($token, "", $_SESSION['s']);
            return $secret;
        } else {
            return false;
        }
    }
}
?>