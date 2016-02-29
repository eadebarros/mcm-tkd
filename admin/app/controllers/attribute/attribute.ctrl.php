<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Attribute = new Attribute();

$Attribute->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Attribute->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $Attribute->loadForm();
    $return = ($ServusMode === "add") ? $Attribute->insert() : $Attribute->update("id = '".$_GET['id']."'");
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Attribute->get((int)$_GET['id']);

if($ServusMode == "list" || $ServusMode == "delete") {
    $Attributes = $Attribute->getAll(null, "ORDER BY name ASC");
}

require_once "app/views/index.html.php";
?>