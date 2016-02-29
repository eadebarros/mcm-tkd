<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class Prize extends AppModel {
    public $Table = "{__PREF__}prizes";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "year" => Array("type" => "text"),
        "prize" => Array("type" => "text"),
        "entity" => Array("type" => "text"),
        "category" => Array("type" => "text"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "year", "prize", "entity", "category"),
        "icon" => "icon-certificate"
    );
    
    public function getYears() {
        return $this->getAll(null, "GROUP BY year ORDER BY year DESC");
    }
}
?>