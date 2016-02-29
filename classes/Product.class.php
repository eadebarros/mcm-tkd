<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class Product extends AppModel {
    public $Table = "{__PREF__}products";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "product_category_id" => Array("required" => true),
        "product_subcategory_id" => Array("required" => true),
        "line_id" => Array("required" => true),
        "name" => Array("type" => "text", "required" => true),
        "description" => Array("type" => "text", "class" => "tinymce"),
        "code" => Array("type" => "text"),
        "model" => Array("type" => "text"),
        "details" => Array("type" => "text",  "class" => "tinymce"),        
        "blueprint" => Array("type" => "file"),
        "guide" => Array("type" => "file"),
        "dwg" => Array("type" => "file"),
        "flow_curve" => Array("type" => "file"),
        "video" => Array("type" => "text"),
        "additional_video" => Array("type" => "text"),
        "bndes" => Array("type" => "checkbox"),
        "ambient" => Array(),
        "display_order" => Array("type" => "text"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');", "display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );	
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "code", "category", "subcategory", "product_line", "last_update"),
        "icon" => "icon-shopping-cart"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $ProductCategory = new ProductCategory();
        $ProductLine = new ProductLine();
        $ProductImage = new ProductImage();
        $Href = new Href();
        
        return "SELECT {$this->Table}.*,
                c1.name as category,
                c2.name as subcategory,
                {$ProductLine->Table}.name as product_line,
                {$ProductImage->Table}.name as listing_image,
                {$Href->Table}.ref as ref,
                h1.ref as category_ref,
                h2.ref as subcategory_ref
            FROM {$this->Table}
            LEFT OUTER JOIN {$ProductCategory->Table} c1
                ON {$this->Table}.product_category_id = c1.id
            LEFT OUTER JOIN {$ProductCategory->Table} c2
                ON {$this->Table}.product_subcategory_id = c2.id
            LEFT OUTER JOIN {$ProductLine->Table}
                ON {$this->Table}.line_id = {$ProductLine->Table}.id
            LEFT OUTER JOIN {$ProductImage->Table}
                ON {$ProductImage->Table}.product_id = {$this->Table}.id AND {$ProductImage->Table}.type = 'listing'
            LEFT OUTER JOIN {$Href->Table}
                ON {$Href->Table}.content_id = {$this->Table}.id and {$Href->Table}.type = 'product'
            LEFT OUTER JOIN {$Href->Table} h1
                ON h1.content_id = {$this->Table}.product_category_id and h1.type = 'product_category'
            LEFT OUTER JOIN {$Href->Table} h2
                ON h2.content_id = {$this->Table}.product_subcategory_id and h2.type = 'product_category'
            $where GROUP BY {$this->Table}.id $plus";
    }
    
    public function getLinesByAmbient($where = null, $plus = null) {
        $ProductLine = new ProductLine();
        $Href = new Href();
        
        if($where) $where = "WHERE $where";
        
        $query = "SELECT {$this->Table}.*,
                {$ProductLine->Table}.name as line,
                {$ProductLine->Table}.id as the_line_id
            FROM {$this->Table}
            LEFT OUTER JOIN {$ProductLine->Table}
                ON {$this->Table}.line_id = {$ProductLine->Table}.id
            $where GROUP BY line $plus";
        return $this->fetchQuery($query);
    }
}
?>