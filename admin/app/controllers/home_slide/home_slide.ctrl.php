<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$HomeSlide = new HomeSlide();

$HomeSlide->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $HomeSlide->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $HomeSlide->loadForm();
    if($ServusMode === "add") $HomeSlide->user_id = $Admin->id;
    $return = ($ServusMode === "add") ? $HomeSlide->insert() : $HomeSlide->update("id = '".$_GET['id']."'");
    if($return === true) {
        $ext = strtolower(getExtension($_FILES['image']['name']));
		if(empty($id)){$id = $_GET['id'];}
        if(in_array($ext, array("jpg", "jpeg", "gif", "png", "gif", "swf")) && $_FILES['image']['name']) {
            $fName = THE_ROOT.'images/homeslideshow/slide-'.$id.'.'.$ext;
            if(file_exists($fName)) unlink($fName);
            $t = move_uploaded_file($_FILES['image']['tmp_name'], $fName);
            $HomeSlide->image = 'slide-'.$id.'.'.$ext;
            $HomeSlide->update("id = '".$id."'");
		
        }
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return, "f"), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $HomeSlide->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $HomeSlides = $HomeSlide->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>
