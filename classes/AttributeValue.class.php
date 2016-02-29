<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Attribute class
 * Servus! Open-Source Development Framework
 */

class AttributeValue extends AppModel {
    public $Table = "{__PREF__}attribute_values";
    public $Fields = Array(
        "id" => Array("id" => "id", "type" => "hidden", "maxlength" => 11, "extra" => "auto_increment"),
        "attribute_id" => Array(),
        "name" => Array("type" => "text", "required" => true),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "attribute", "last_update"),
        "icon" => "icon-plus-sign-alt",
        "parent" => "product"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $Attribute = new Attribute();
        
        return "SELECT {$this->Table}.*,
                {$Attribute->Table}.name as attribute
            FROM {$this->Table}
        LEFT JOIN {$Attribute->Table}
            ON {$this->Table}.attribute_id = {$Attribute->Table}.id
        $where $plus";
    }
}
?>