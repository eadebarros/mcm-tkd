<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Page class
 * Servus! Open-Source Development Framework
 */

class HomeSlide extends AppModel {
    public $Table = "{__PREF__}home_slides";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "title" => Array("type" => "text", "required" => true),
        "subtitle" => Array("type" => "text", "required" => true),
        "swf" => Array("type" => "file"),
        "image" => Array("type" => "file"),
        "link" => Array("type" => "text"),
        "list_order" => Array("type" => "text", "required" => true),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio"),
		"icon" => Array("type" => "text")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "title", "subtitle", "last_update"),
        "icon" => "icon-picture"
    );
    
    public function AltQuery($where = null, $plus = null) {
        
        return "SELECT {$this->Table}.*
            FROM {$this->Table}
            $where $plus";
    }
}
?>