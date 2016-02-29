<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Category = new Category();
$Href = new Href();

$Category->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Category->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $Category->loadForm();
    $return = ($ServusMode === "add") ? $Category->insert() : $Category->update("id = '".$_GET['id']."'");
    if($return == true) {
        $id = ($ServusMode === "add") ? $ProductCategory->InsertId : $_GET['id'];
        
        if($_POST['ref']) {
            $Href->delete("content_id = '".$id."' AND type = 'category'");
            $Href->content_id = $id;
            $Href->type = "category";
            $Href->ref = $_POST['ref'];
            $Href->insert();
        }
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return, "f"), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Category->get((int)$_GET['id']);

if($ServusMode == "list" || $ServusMode == "delete") {
    $Categories = $Category->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>
