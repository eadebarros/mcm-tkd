<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Attribute class
 * Servus! Open-Source Development Framework
 */

class ProductAttribute extends AppModel {
    public $Table = "{__PREF__}product_attributes";
    public $Fields = Array(
        "id" => Array("id" => "id", "type" => "hidden", "maxlength" => 11, "extra" => "auto_increment"),
        "product_id" => Array(),
        "attribute" => Array(),
        "value" => Array(),
        "link" => Array(),
        "file" => Array(),
        "list_order" => Array(),
        "date" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');")
    );
    
    public static $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "attribute", "last_update"),
        "icon" => "icon-plus-sign-alt",
        "parent" => "product"
    );
    
    /*public function AltQuery($where = null, $plus = null) {
        $Attribute = new Attribute();
        $AttributeValue = new AttributeValue();

        return "SELECT {$this->Table}.*
            FROM {$this->Table}
        LEFT JOIN {$Attribute->Table}
            ON {$this->Table}.attribute_id = {$Attribute->Table}.id
        LEFT JOIN {$AttributeValue->Table}
            ON {$this->Table}.value_id = {$AttributeValue->Table}.id
        $where $plus";
    }*/
}
?>