<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class Vendor extends AppModel {
    public $Table = "{__PREF__}vendor";
    public $Fields = Array(
        "id" => Array(),
        "ser" => Array(),
        "cnpj" => Array(),
        "razao_social" => Array(),
        "inscricao_estadual" => Array(),
        "inscricao_municipal" => Array(),
        "endereco" => Array(),
        "numero" => Array(),
        "complemento" => Array(),
        "cep" => Array(),
        "bairro" => Array(),
        "uf" => Array(),
        "ddd" => Array(),
        "telefone" => Array(),
        "clientes" => Array(),
        "contato_comercial" => Array(),
        "email" => Array(),
        "tel_contato_comercial" => Array(),
        "site" => Array(),
        "cidade" => Array(),
        "regiao" => Array(),
        "area" => Array(),
        "data" => Array()
);
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "cpf", "email", "last_update"),
        "icon" => "icon-calendar"
    );
}
?>