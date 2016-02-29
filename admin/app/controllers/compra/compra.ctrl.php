<?php

$Compra = new Compra();
$Compra->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Compra->delete("id = '".$_GET['id']."'");
if($_SERVER['REQUEST_METHOD'] === "POST") {

	$Compra->loadForm();
    $return = ($ServusMode === "add") ? $Compra->insert() : $Compra->update("id = '".$_GET['id']."'");

	
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return, "f"), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Compra->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $Compras = $Compra->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>