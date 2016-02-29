<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Seal class
 * Servus! Open-Source Development Framework
 */

class Seal extends AppModel {
    public $Table = "{__PREF__}seals";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "name" => Array("type" => "text", "required" => true),
        "file" => Array("type" => "text"),
        "date" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "date"),
        "icon" => "icon-certificate",
        "parent" => "product"
    );
}
?>