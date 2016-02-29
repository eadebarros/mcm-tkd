<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Page class
 * Servus! Open-Source Development Framework
 */

class ShowroomImage extends AppModel {
    public $Table = "{__PREF__}showroom_images";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "legend" => Array("type" => "text"),
        "image_order" => Array("type" => "text"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "legend", "image_order", "last_update"),
        "icon" => "icon-picture"
    );
}
?>