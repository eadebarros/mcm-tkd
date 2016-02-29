<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$ShowroomImage = new ShowroomImage();

$ShowroomImage->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $ShowroomImage->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $ShowroomImage->loadForm();
    if($ServusMode === "add") $ShowroomImage->user_id = $Admin->id;
    $return = ($ServusMode === "add") ? $ShowroomImage->insert() : $ShowroomImage->update("id = '".$_GET['id']."'");
    if($return == true) {
        $id = ($ServusMode === "add") ? $ShowroomImage->InsertId : $_GET['id'];
        if($_FILES['image']['name'] !== "") {
            $fileName = $id.".jpg";
            $Image = WideImage::loadFromUpload("image")->resize(1000, 600, 'inside');
            $Thumb = $Image;
            $Image->saveToFile(THE_ROOT."images/showroom/".$fileName, 100);
            $Image->resize(120, 120, 'outside')->crop('center', 'center', 120, 120)->saveToFile(THE_ROOT."images/showroom/thumb/".$fileName, 100);
        }
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return, "f"), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $ShowroomImage->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $ShowroomImages = $ShowroomImage->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>
