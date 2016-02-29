<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$ProductCategory = new ProductCategory();
$Href = new Href();

$ProductCategory->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $ProductCategory->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $ProductCategory->loadForm();
    if($_POST['delete_cover'] === "1")  $ProductCategory->cover = "";
    if($_POST['delete_image'] === "1")  $ProductCategory->image = "";

    $return = ($ServusMode === "add") ? $ProductCategory->insert() : $ProductCategory->update("id = '".$_GET['id']."'");
    if($return == true) {
        $id = ($ServusMode === "add") ? $ProductCategory->InsertId : $_GET['id'];
        if($_FILES['cover']['name'] !== "") {
            $fileName = "productcategory_".$id.".".getExtension($_FILES['cover']['name']);
			
            WideImage::loadFromUpload("cover")->saveToFile(THE_ROOT."images/cover/".$fileName);
            $ProductCategory->cover = $fileName;
            $ProductCategory->update("id = '".$id."'");
        }
        
        if($_FILES['image']['name'] !== "") {
            $fileName = "productcategory_".$id.".".getExtension($_FILES['image']['name']);
            WideImage::loadFromUpload("image")->saveToFile(THE_ROOT."images/display/".$fileName);
            $ProductCategory->image = $fileName;
            $ProductCategory->update("id = '".$id."'");
        }

        if($_POST['ref']) {
            $Href->delete("content_id = '".$id."' AND type = 'product_category'");
            $Href->content_id = $id;
            $Href->type = "product_category";
            $Href->ref = $_POST['ref'];
            $Href->insert();
        }
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return, "f"), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $ProductCategory->get((int)$_GET['id']);

if($ServusMode == "list" || $ServusMode == "delete") {
    $ProductCategories = $ProductCategory->getAll(null, "ORDER BY id DESC");
} else {
    $ProductCategories = $ProductCategory->getAll($ProductCategory->Table.".parent = '0'", null);
}

require_once "app/views/index.html.php";
?>