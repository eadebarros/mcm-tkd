<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Page = new Page();
$Href = new Href();

$Page->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Page->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $Page->loadForm();
    if($_POST['delete_img'] === "1")  $Page->cover = "";

    if($ServusMode === "add") $Page->user_id = $Admin->id;
    $return = ($ServusMode === "add") ? $Page->insert() : $Page->update("id = '".$_GET['id']."'");
    if($return == true) {
        $id = ($ServusMode === "add") ? $Page->InsertId : $_GET['id'];
        if($_FILES['cover']['name'] !== "") {
            $fileName = "page_".$id.".jpg";
            WideImage::loadFromUpload("cover")->saveToFile(THE_ROOT."images/cover/".$fileName, 100);
            $Page->cover = $fileName;
            $Page->update("id = '".$id."'");
        }
        if($_FILES['destaquehome_imagem']['name'] !== "") {
            $fileName = "page_".$id.".jpg";
            WideImage::loadFromUpload("destaquehome_imagem")->saveToFile(THE_ROOT."images/destaquehome_imagem/".$fileName, 100);
            $Page->destaquehome_imagem = $fileName;
            $Page->update("id = '".$id."'");
        }

        if($_POST['ref']) {
            $Href->delete("content_id = '".$id."' AND type = 'page'");
            $Href->content_id = $id;
            $Href->type = "page";
            $Href->ref = $_POST['ref'];
            $Href->insert();
        }
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return, "f"), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Page->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $Pages = $Page->getAll(null, "ORDER BY id DESC");
} else {
    $Pages = $Page->getAll($Page->Table.".status = '1' AND {$Page->Table}.parent = '0' AND {$Page->Table}.id <> '".$_GET['id']."'", "ORDER BY title ASC");
}

require_once "app/views/index.html.php";
?>
