<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class CustomerService extends AppModel {
    public $Table = "{__PREF__}atendimento";
    public $Fields = Array(
        "id" => Array(),
        "name" => Array(),
        "cpf" => Array(),
        "address" => Array(),
        "number" => Array(),
        "complement" => Array(),
        "district" => Array(),
        "cep" => Array(),
        "city" => Array(),
        "state" => Array(),
        "telephone" => Array(),
        "email" => Array(),
        "shop" => Array(),
        "purchase_date" => Array(),
        "product" => Array(),
        "message" => Array(),
        "type" => Array(),
        "form" => Array(),
        "date" => Array()
);
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "cpf", "email", "last_update"),
        "icon" => "icon-calendar"
    );
}
?>