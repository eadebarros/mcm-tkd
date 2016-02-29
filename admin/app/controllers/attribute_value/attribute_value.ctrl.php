<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Attribute = new Attribute();
$AttributeValue = new AttributeValue();

$AttributeValue->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $AttributeValue->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $AttributeValue->loadForm();
    $return = ($ServusMode === "add") ? $AttributeValue->insert() : $AttributeValue->update("id = '".$_GET['id']."'");
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $AttributeValue->get((int)$_GET['id']);

if($ServusMode == "list" || $ServusMode == "delete") {
    $AttributeValues = $AttributeValue->getAll(null, "ORDER BY name ASC");
} else {
    $Attributes = $Attribute->getAll("status = '1'", "ORDER BY name ASC");
}

require_once "app/views/index.html.php";
?>