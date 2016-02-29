<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Page class
 * Servus! Open-Source Development Framework
 */

class Page extends AppModel {
    public $Table = "{__PREF__}pages";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "parent" => Array("required" => true),
        "user_id" => Array(),
        "title" => Array("type" => "text", "required" => true),
        "subtitle" => Array("type" => "text"),
        "layout" => Array(),
		"destaquehome_status" => Array("type" => "radio"),
		"destaquehome_titulo" => Array("type" => "textarea"),
		"destaquehome_sub_titulo" => Array("type" => "textarea"),
		"destaquehome_content" => Array("type" => "textarea"),
		"destaquehome_imagem" => Array("type" => "file"),
        "content" => Array("type" => "textarea", "class" => "tinymce", "required" => true),
        "cover" => Array("type" => "file"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "title", "subtitle", "parent_page", "author", "last_update"),
        "icon" => "icon-file-alt",
        "parent" => "post"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $User = new User();
        $Href = new Href();
        
        return "SELECT {$this->Table}.*,
                {$User->Table}.first_name as author,
                p.title as parent_page,
                {$Href->Table}.ref
            FROM {$this->Table}
            LEFT OUTER JOIN {$this->Table} p
                ON p.id = {$this->Table}.parent
            LEFT OUTER JOIN {$User->Table}
                ON {$this->Table}.user_id = {$User->Table}.id
            LEFT OUTER JOIN {$Href->Table}
                ON {$this->Table}.id = {$Href->Table}.content_id AND {$Href->Table}.type = 'page'
            $where $plus";
    }
}
?>