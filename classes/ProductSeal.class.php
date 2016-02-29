<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Attribute class
 * Servus! Open-Source Development Framework
 */

class ProductSeal extends AppModel {
    public $Table = "{__PREF__}product_seals";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "product_id" => Array(),
        "seal_id" => Array(),
        "list_order" => Array(),
        "date" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');")
    );
    
    public function AltQuery($where = null, $plus = null) {
        $Seal = new Seal();

        return "SELECT {$this->Table}.*,
                {$Seal->Table}.name,
                {$Seal->Table}.file
            FROM {$this->Table}
        LEFT JOIN {$Seal->Table}
            ON {$this->Table}.seal_id = {$Seal->Table}.id
        $where $plus";
    }
}
?>