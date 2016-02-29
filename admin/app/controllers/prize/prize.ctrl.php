<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Prize = new Prize();

$Prize->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Prize->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $Prize->loadForm();
    $return = ($ServusMode === "add") ? $Prize->insert() : $Prize->update("id = '".$_GET['id']."'");
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Prize->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $Prizes = $Prize->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>