<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class RepresentativeCidadeEstado extends AppModel {
    public $Table = "{__PREF__}representantes_cidade_estado";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "cidade" => Array("type" => "text"),
        "estado" => Array("type" => "text")
    );
    


}
?>