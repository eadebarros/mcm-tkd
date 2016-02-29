<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Product = new Product();
$ProductAttribute = new ProductAttribute();
$ProductCategory = new ProductCategory();
$ProductImage = new ProductImage();
$ProductLine = new ProductLine();
$ProductSeal = new ProductSeal();
$Seal = new Seal();
$Href = new Href();

$Product->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") {
    $Href->delete("content_id = '".$_GET['id']."' AND type = 'product'");
    $return = $Product->delete("id = '".$_GET['id']."'");
}

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $Product->loadForm();
    $Product->dwg = null;
    $Product->guide = null;
    $Product->blueprint = null;
    $return = ($ServusMode === "add") ? $Product->insert() : $Product->update("id = '".$_GET['id']."'");
    if($return === true) {
        $id = $Product->FormMode == "add" ? $Product->InsertId : $_GET['id'];

        $i = 0;
        foreach(Array("blueprint", "dwg", "guide", "flow_curve") as $Row) {
            if($_POST['delete'][$Row] == "1") $Product->$Row = "";
            if($_FILES[$Row]['name'] !== "") {
                $ext = getExtension($_FILES[$Row]['name']);
                $fileName = THE_ROOT.'downloads/'.$Row.'/'.$id.'_'.$_POST['ref'].'.'.$ext;
                move_uploaded_file($_FILES[$Row]['tmp_name'], $fileName);
                $Product->$Row = $id.'_'.$_POST['ref'].'.'.$ext;
            }
            if($Product->$Row !== null) $Product->update($Product->Table.".id = '".$id."'");
        }

        if($_POST['ref']) {
            $Href->delete("content_id = '".$id."' AND type = 'product'");
            $Href->content_id = $id;
            $Href->type = "product";
            $Href->ref = $_POST['ref'];
            $Href->insert();
        }

        $i = 0;
        $ProductAttribute->delete("product_id = '".$id."'");
        if($_POST['attribute']) {
            foreach($_POST['attribute'] as $Row) {
                $ProductAttribute->product_id = $id;
                $ProductAttribute->attribute = $Row;
                $ProductAttribute->value = $_POST['value'][$i];
                if($_FILES['file']['name'][$i] != "") {
                    $ProductAttribute->link = "1";
                    $ext = strtolower(getExtension($_FILES['file']['name'][$i]));
                    if(in_array($ext, Array("jpg", "jpeg", "gif", "png"))) {
                        $fileName = $id."-".$i."_".str_friendly($_FILES['file']['name'][$i]).".".$ext;
                        move_uploaded_file($_FILES['file']['tmp_name'][$i], THE_ROOT.'downloads/images/'.$fileName);
                        $ProductAttribute->file = $fileName;
                    }
                } else
                if($_POST['the_file'][$i] != "") {
                    $ProductAttribute->link = "1";
                    $ProductAttribute->file = $_POST['the_file'][$i];
                }
                $ProductAttribute->list_order = $i;
                $ProductAttribute->insert();
                $i++;
            }
        }
        $i = 0;
        $ProductImage->delete("product_id = '".$id."'");
        if(is_array($_POST['filename'])) foreach($_POST['filename'] as $Row) {
            $ProductImage->product_id = $id;
            $ProductImage->name = $Row;
            $ProductImage->type = $_POST['type'][$i++];
            $ProductImage->insert();
        }
        $i = 0;
        $ProductSeal->delete("product_id = '".$id."'");
		if($_POST['seal']){
			foreach ($_POST['seal'] as $Row) {
				$ProductSeal->seal_id = $Row;
				$ProductSeal->product_id = $id;
				$ProductSeal->list_order = $_POST['seal_order'][$i];
				$ProductSeal->insert();
				$i++;
			}
		}
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $Product->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $Products = $Product->getAll(null, "ORDER BY id DESC");
} else {
    $ProductCategories = $ProductCategory->getAll($ProductCategory->Table.".status = '1' AND {$ProductCategory->Table}.parent = '0'", "ORDER BY name ASC");
    $ProductSubCategories = $ProductCategory->getAll($ProductCategory->Table.".status = '1' AND {$ProductCategory->Table}.parent <> '0'", "ORDER BY name ASC");
    $ProductAttributes = $ProductAttribute->getAll("product_id = '".$_GET['id']."'", "GROUP BY attribute ORDER BY list_order ASC");
    $ProductLines = $ProductLine->getAll($ProductLine->Table.".status = '1'");
    $ProductImages = $ProductImage->getAll($ProductImage->Table.".product_id = '".$_GET['id']."'");
    $ListAttributes = $ProductAttribute->getAll(null, "GROUP BY attribute ORDER BY attribute ASC");
    $Seals = $Seal->getAll($Seal->Table.".status = '1'", "ORDER BY name ASC");
    $ProductSeals = $ProductSeal->getAll("product_id = '".$_GET['id']."'", "ORDER BY list_order ASC");
}

require_once "app/views/index.html.php";
?>