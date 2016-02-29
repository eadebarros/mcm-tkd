<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$RepresentativeCidadeEstado = new RepresentativeCidadeEstado();
$cidades_estados =  $RepresentativeCidadeEstado->getAll(null,"ORDER BY estado DESC");

$RepresentativeCidadeEstadoAtivos = new RepresentativeCidadeEstadoAtivos();
if(!empty($_GET['id'])){
$cidades_estados_ativos =  $RepresentativeCidadeEstadoAtivos->getAll("id_representante = '".$_GET['id']."'");
}


$Representative = new Representative();
$Representative->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Representative->delete("id = '".$_GET['id']."'");
if($_SERVER['REQUEST_METHOD'] === "POST") {
	
	
    $Representative->loadForm();
    $return = ($ServusMode === "add") ? $Representative->insert() : $Representative->update("id = '".$_GET['id']."'");
    if($return === true) {
        $id = $Representative->FormMode == "add" ? $Representative->InsertId : $_GET['id'];
		
		$cidades_estados = $_POST['cidades_estados'];
		if($cidades_estados){
			$RepresentativeCidadeEstadoAtivos->delete("id_representante = '".$id."'");
			foreach($cidades_estados as $item){
				$RepresentativeCidadeEstadoAtivos->id_representante = $id;
				$RepresentativeCidadeEstadoAtivos->id_cidade=$item;
				$RepresentativeCidadeEstadoAtivos->insert();
			}
		}
	}
	
	
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return, "f"), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Representative->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $Representative = $Representative->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>