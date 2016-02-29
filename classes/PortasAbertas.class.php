<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class PortasAbertas extends AppModel {
    public $Table = "{__PREF__}portas_abertas";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "nome" => Array("type" => "text"),
        "sexo" => Array("type" => "text"),
        "nascimento" => Array("type" => "text"),
        "email" => Array("type" => "text"),
        "telefone" => Array("type" => "text"),
        "fabrica" => Array("type" => "text"),
        "mensagem" => Array("type" => "text"),
        "date" => Array()
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "title", "start_date", "address", "last_update"),
        "icon" => "icon-calendar"
    );
}
?>