<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class Event extends AppModel {
    public $Table = "{__PREF__}events";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "title" => Array("type" => "text", "required" => true),
        "product" => Array("type" => "text"),
        "start_date" => Array("type" => "text", "class" => "datepicker", "required" => true, "display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "finish_date" => Array("type" => "text", "class" => "datepicker", "required" => true, "display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "address" => Array("type" => "text", "required" => true),
        "content" => Array("type" => "textarea", "class" => "tinymce", "required" => true),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "title", "start_date", "address", "last_update"),
        "icon" => "icon-calendar"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $Href = new Href();
        
        return "SELECT {$this->Table}.*,
                {$Href->Table}.ref
            FROM {$this->Table}
            LEFT OUTER JOIN {$Href->Table}
                ON {$this->Table}.id = {$Href->Table}.content_id AND {$Href->Table}.type = 'event'
                $where $plus";
    }
}
?>