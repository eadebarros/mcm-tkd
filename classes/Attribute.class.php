<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Attribute class
 * Servus! Open-Source Development Framework
 */

class Attribute extends AppModel {
    public $Table = "{__PREF__}attributes";
    public $Fields = Array(
        "id" => Array("id" => "id", "type" => "hidden", "maxlength" => 11, "extra" => "auto_increment"),
        "name" => Array("type" => "text", "required" => true),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "last_update"),
        "icon" => "icon-asterisk",
        "parent" => "product"
    );
}
?>