<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class ProductLine extends AppModel {
    public $Table = "{__PREF__}product_lines";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "name" => Array("type" => "text", "required" => true),
        "description" => Array("type" => "textarea", "class" => "simple-tinymce"),
        "display_order" => Array("type" => "text"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "last_update"),
        "icon" => "icon-sitemap",
        "parent" => "product"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $ProductCategory = new ProductCategory();
        $Href = new Href();
        
        return "SELECT {$this->Table}.*,
            {$Href->Table}.ref as ref
        FROM {$this->Table}
        LEFT OUTER JOIN {$Href->Table}
            ON {$Href->Table}.content_id = {$this->Table}.id AND {$Href->Table}.type = 'product_line'
        $where $plus";
    }

    public function getThisLines($where = null, $plus = null, $subcategory = null) {
        $ProductCategory = new ProductCategory();
        $Product = new Product();
        $Href = new Href();
        
        $query = "SELECT {$this->Table}.*,
            {$Href->Table}.ref as ref
        FROM {$this->Table}
        LEFT OUTER JOIN {$Href->Table}
            ON {$Href->Table}.content_id = {$this->Table}.id AND {$Href->Table}.type = 'product_line'
        INNER JOIN {$Product->Table}
            ON {$Product->Table}.product_subcategory_id = '$subcategory' AND {$Product->Table}.line_id = {$this->Table}.id
        $where GROUP BY {$this->Table}.id $plus";

        return $this->fetchQuery($query);
    }
}
?>