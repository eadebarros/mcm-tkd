<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Attribute class
 * Servus! Open-Source Development Framework
 */

class ProductImage extends AppModel {
    public $Table = "{__PREF__}product_images";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "product_id" => Array(),
        "name" => Array("type" => "text"),
        "type" => Array("type" => "text"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');", "display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );

    public $Conf = Array();
}
?>