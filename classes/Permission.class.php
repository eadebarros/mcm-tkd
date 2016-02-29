<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Permission class
 * Servus! Open-Source Development Framework
 */

class Permission extends AppModel {
    public $Table = "{__PREF__}permissions";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "profile_id" => Array(),
        "control" => Array(),
        "can" => Array()
    );
    
    public function fetch($profile_id) {
        $permissions = $this->getAll("profile_id = '".$profile_id."'");
        $fetch = array();
        foreach($permissions as $item) {
            $fetch[$item->control] = $item->can;
        }
        return $fetch;
    }
}
?>