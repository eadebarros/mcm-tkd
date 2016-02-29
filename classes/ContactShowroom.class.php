<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class ContactShowroom extends AppModel {
    public $Table = "{__PREF__}contact_showroom";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "name" => Array("type" => "text"),
        "email" => Array("type" => "text"),
        "telephone" => Array("type" => "text"),
        "occupation" => Array("type" => "text"),
        "message" => Array("type" => "text"),
        "date" => Array()
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "title", "start_date", "address", "last_update"),
        "icon" => "icon-calendar"
    );
}
?>