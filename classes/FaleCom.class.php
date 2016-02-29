<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class FaleCom extends AppModel {
    public $Table = "{__PREF__}fale_com";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "name" => Array("type" => "text"),
        "state" => Array("type" => "text"),
        "email" => Array("type" => "text"),
        "telephone" => Array("type" => "text"),
        "message" => Array("type" => "text"),
        "type" => Array("type" => "text"),
        "date" => Array()
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "title", "start_date", "address", "last_update"),
        "icon" => "icon-calendar"
    );
}
?>