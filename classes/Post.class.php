<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class Post extends AppModel {
    public $Table = "{__PREF__}posts";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "category_id" => Array("required" => true),
        "user_id" => Array(),
        "title" => Array("type" => "text", "required" => true),
        "subtitle" => Array("type" => "text"),
        "content" => Array("type" => "textarea", "class" => "tinymce", "required" => true),
        "cover" => Array("type" => "file"),
        "source" => Array("type" => "text"),
        "featured" => Array("type" => "checkbox", "display" => "return ('\$1' == '1') ? '<i class=\"icon-ok\"></i>' : '' ;"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "publish_date" => Array("type" => "text", "class" => "datepicker", "required" => true, "display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "title", "subtitle", "category", "featured", "publish_date", "last_update"),
        "icon" => "icon-list-alt"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $User = new User();
        $Category = new Category();
        $Href = new Href();
        
        return "SELECT {$this->Table}.*,
                {$User->Table}.first_name as author,
                {$Category->Table}.name as category,
                hc.ref as category_ref,
                {$Href->Table}.ref
            FROM {$this->Table}
            LEFT OUTER JOIN {$User->Table}
                ON {$this->Table}.user_id = {$User->Table}.id
            LEFT OUTER JOIN {$Category->Table}
                ON {$this->Table}.category_id = {$Category->Table}.id
            LEFT OUTER JOIN {$Href->Table}
                ON {$this->Table}.id = {$Href->Table}.content_id AND {$Href->Table}.type = 'post'
            LEFT OUTER JOIN {$Href->Table} hc
                ON {$this->Table}.category_id = hc.content_id AND hc.type = 'category'
                $where $plus";
    }
}
?>