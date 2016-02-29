<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Event = new Event();
$Href = new Href();

$Event->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Event->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $Event->loadForm();
    $Event->start_date = ($Event->start_date) ? fromBrDate($_POST['start_date'], "Y-m-d")." ".$_POST['start_time'].":00" : date("Y-m-d H:i:00");
    $Event->finish_date = ($Event->finish_date) ? fromBrDate($_POST['finish_date'], "Y-m-d")." ".$_POST['finish_time'].":00" : date("Y-m-d H:i:00");
    if($ServusMode === "add") $Event->user_id = $Admin->id;
    $return = ($ServusMode === "add") ? $Event->insert() : $Event->update("id = '".$_GET['id']."'");
    if($return == true) {
        $id = ($ServusMode === "add") ? $Event->InsertId : $_GET['id'];

        if($_POST['ref']) {
            $Href->delete("content_id = '".$id."' AND type = 'event'");
            $Href->content_id = $id;
            $Href->type = "event";
            $Href->ref = $_POST['ref'];
            $Href->insert();
        }
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Event->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $Events = $Event->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>
