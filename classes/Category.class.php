<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Category class
 * Servus! Open-Source Development Framework
 */

class Category extends AppModel {
    public $Table = "{__PREF__}categories";
    public $Fields = Array(
        "id" => Array("id" => "id", "type" => "hidden", "maxlength" => 11, "extra" => "auto_increment"),
        "name" => Array("id" => "name", "type" => "text", "size" => 25, "maxlength" => 32, "required" => true),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array(),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "post_count", "date"),
        "icon" => "icon-sitemap",
        "parent" => "post"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $Post = new Post();
        $Href = new Href();
        
        return "SELECT {$this->Table}.*,
            COUNT({$Post->Table}.category_id) as post_count,
            {$Href->Table}.ref
        FROM {$this->Table}
        LEFT JOIN {$Post->Table}
            ON {$Post->Table}.category_id = {$this->Table}.id
        LEFT JOIN {$Href->Table}
            ON {$this->Table}.id = {$Href->Table}.content_id AND {$Href->Table}.type = 'category'
        $where
        GROUP BY {$this->Table}.id $plus";
    }
}
?>