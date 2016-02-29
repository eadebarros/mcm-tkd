<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class ProductCategory extends AppModel {
    public $Table = "{__PREF__}product_categories";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "name" => Array("type" => "text", "required" => true),
        "cover" => Array("type" => "file"),
        "image" => Array("type" => "file"),
        "parent" => Array("required" => true),
        "description" => Array("type" => "text", "class" => "tinymce"),
		"texto_interno" => Array("type" => "text", "class" => "tinymce"),
		"colorbtn" => Array("type" => "text"),    
		"textobtn" => Array("type" => "text"),    
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "parent_category", "last_update"),
        "icon" => "icon-sitemap",
        "parent" => "product"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $Href = new Href();
        
        return "SELECT {$this->Table}.*,
            c.name as parent_category,
            {$Href->Table}.ref as ref
        FROM {$this->Table}
        LEFT OUTER JOIN {$this->Table} c
            ON c.id = {$this->Table}.parent
        LEFT OUTER JOIN {$Href->Table}
            ON {$Href->Table}.content_id = {$this->Table}.id
                AND {$Href->Table}.type = 'product_category'
        $where $plus";
    }
}
?>