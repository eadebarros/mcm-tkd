<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class RepresentativeCidadeEstadoAtivos extends AppModel {
    public $Table = "{__PREF__}representantes_cidades_ativo";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "id_representante" => Array("type" => "text"),
        "id_cidade" => Array("type" => "text")
    );
    

}
?>