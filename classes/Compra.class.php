<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class Compra extends AppModel {
    public $Table = "{__PREF__}compra";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "nome" => Array("type" => "text"),
		"telefone" => Array("type" => "text"),
        "endereco" => Array("type" => "text"),
		"bairro" => Array("type" => "text"),
		"municipio" => Array("type" => "text"),
		"cep" => Array("type" => "text"),
		"bairro" => Array("type" => "text"),
		"uf" => Array("type" => "text"),
		"produto" => Array("type" => "text"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "nome", "telefone", "produto", "last_update"),
        "icon" => "icon-wrench"
    );

}
?>