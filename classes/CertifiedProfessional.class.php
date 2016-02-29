<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class CertifiedProfessional extends AppModel {
    public $Table = "{__PREF__}certified_professionals";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "name" => Array("type" => "text"),
        "telephone" => Array("type" => "text"),
        "email" => Array("type" => "text"),
        "region" => Array("type" => "text"),
        "city" => Array("type" => "text"),
        "state" => Array("type" => "text"),
        "certification" => Array("type" => "text"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "email", "telephone", "city", "state", "last_update"),
        "icon" => "icon-briefcase"
    );
    
    public function getCertifications() {
        return $this->getAll(null, "GROUP BY certification ORDER BY certification ASC");
    }
    
    public function getCities() {
        return $this->getAll(null, "GROUP BY city ORDER BY city ASC");
    }
    
    public function getStates() {
        return $this->getAll(null, "GROUP BY state ORDER BY state ASC");
    }
}
?>