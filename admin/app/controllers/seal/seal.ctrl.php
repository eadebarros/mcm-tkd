<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Seal = new Seal();

$Seal->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Seal->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $Seal->loadForm();
    $ext = strtolower(getExtension($_FILES['file']['name']));
    if(in_array($ext, Array("jpg", "jpeg", "gif", "png"))) {
        $fileName = $id."-".str_friendly($_FILES['file']['name']).".".$ext;
        move_uploaded_file($_FILES['file']['tmp_name'], THE_ROOT.'images/seals/'.$fileName);
        $Seal->file = $fileName;
    }
    $return = ($ServusMode === "add") ? $Seal->insert() : $Seal->update("id = '".$_GET['id']."'");
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return, "f"), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Seal->get((int)$_GET['id']);

if($ServusMode == "list" || $ServusMode == "delete") {
    $Seals = $Seal->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>