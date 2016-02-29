<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class Representative extends AppModel {
    public $Table = "{__PREF__}representative";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "name" => Array("type" => "text"),
		"contato" => Array("type" => "text"),
        "telephone" => Array("type" => "text"),
		"email" => Array("type" => "text"),
        "date" => Array("function" => "return date('Y-m-d H:i:s');"),
        "last_update" => Array("display" => "return toDate('\$1', 'd/m/Y H:i:s');"),
        "status" => Array("type" => "radio")
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "grid" => Array("id", "name", "contato","telephone", "last_update"),
        "icon" => "icon-wrench"
    );
    
    public function getCidadesEstados($idRepresentante) {
        $RepresentativeCidadeEstado = new RepresentativeCidadeEstado();
		$RepresentativeCidadeEstadoAtivos = new RepresentativeCidadeEstadoAtivos();
        
        $query= "SELECT 
			    c1.id,
                c1.cidade,
                c1.estado
            FROM 
				{$RepresentativeCidadeEstado->Table} c1,
				{$RepresentativeCidadeEstadoAtivos->Table} c2
            WHERE c1.id=c2.id_cidade
			AND c2.id_representante = $idRepresentante
			";
			
		return $this->fetchQuery($query);
    }
}
?>