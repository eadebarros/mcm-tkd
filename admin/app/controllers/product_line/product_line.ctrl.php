<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$ProductLine = new ProductLine();
$ProductCategory = new ProductCategory();
$Href = new Href();

$ProductLine->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $ProductLine->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $ProductLine->loadForm();
    $return = ($ServusMode === "add") ? $ProductLine->insert() : $ProductLine->update("id = '".$_GET['id']."'");
    if($return == true) {
        $id = ($ServusMode === "add") ? $ProductLine->InsertId : $_GET['id'];

        if($_POST['ref']) {
            $Href->delete("content_id = '".$id."' AND type = 'product_line'");
            $Href->content_id = $id;
            $Href->type = "product_line";
            $Href->ref = $_POST['ref'];
            $Href->insert();
        }
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return, "f"), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $ProductLine->get((int)$_GET['id']);

if($ServusMode == "list" || $ServusMode == "delete") {
    $ProductLines = $ProductLine->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>