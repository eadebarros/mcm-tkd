<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Post = new Post();
$Category = new Category();
$Href = new Href();

$Post->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Post->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $Post->loadForm();
    if($_POST['delete_img'] === "1")  $Post->cover = "";

    $Post->featured = $_POST['featured'] == "1" ? "1" : "0";
    $Post->publish_date = ($Post->publish_date) ? fromBrDate($_POST['publish_date'], "Y-m-d")." ".$_POST['publish_time'].":00" : date("Y-m-d H:i:00");
    if($ServusMode === "add") $Post->user_id = $Admin->id;
    $return = ($ServusMode === "add") ? $Post->insert() : $Post->update("id = '".$_GET['id']."'");
    if($return == true) {
        $id = ($ServusMode === "add") ? $Post->InsertId : $_GET['id'];
        if($_FILES['cover']['name'] !== "") {
            $fileName = "post_".$id.".jpg";
            WideImage::loadFromUpload("cover")->saveToFile(THE_ROOT."images/cover/".$fileName, 100);
            $Post->cover = $fileName;
            $Post->update("id = '".$id."'");
        }

        if($_POST['ref']) {
            $Href->delete("content_id = '".$id."' AND type = 'post'");
            $Href->content_id = $id;
            $Href->type = "post";
            $Href->ref = $_POST['ref'];
            $Href->insert();
        }
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Post->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $Posts = $Post->getAll(null, "ORDER BY id DESC");
} else {
    $Categories = $Category->getAll($Category->Table.".status = '1'", "ORDER BY name ASC");
}

require_once "app/views/index.html.php";
?>
