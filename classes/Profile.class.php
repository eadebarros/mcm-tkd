<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Profile class
 * Servus! Open-Source Development Framework
 */

class Profile extends AppModel {
    public $Table = "{__PREF__}profiles";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "name" => Array("type" => "text", "maxlength" => 32, "required" => true),
        "date" => Array(),
        "last_update" => Array(),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "user_count"),
        "icon" => "icon-group"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $user = new user();
        return "SELECT {$this->Table}.*, COUNT({$user->Table}.profile_id) as user_count
        FROM {$this->Table}
        LEFT JOIN {$user->Table}
            ON {$user->Table}.profile_id = {$this->Table}.id
        $where
        GROUP BY {$this->Table}.id $plus";
    }
}
?>