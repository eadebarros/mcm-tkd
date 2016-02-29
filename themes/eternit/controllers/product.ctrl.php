<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Product = new Product();
$Product->get((int)$Id);

$ProductCategory = new ProductCategory();
$ProductCategory->get((int)$Product->product_category_id);
/*
$ParentProductCategory = new ProductCategory();
$ParentProductCategory->get((int)$Product->product_category_id);
*/
$ProductImage = new ProductImage();
$ProductImages = $ProductImage->getAll("product_id = '".$Id."' AND type <> 'listing' ORDER BY type ASC");

$ProductAttribute = new ProductAttribute();
$ProductAttributes = $ProductAttribute->getAll("product_id = '".$Id."'", "ORDER BY list_order ASC");

$ProductSeal = new ProductSeal();
$ProductSeals = $ProductSeal->getAll("product_id = '".$Id."'", "ORDER BY list_order ASC");

$Bread[0]['ref'] = "produtos";
$Bread[0]['label'] = "Produtos";



$Bread[1]['ref'] = "produtos/".$ParentProductCategory->ref."/".$ProductCategory->ref;
$Bread[1]['label'] = $ProductCategory->name;

$Bread[2]['ref'] = "produtos/".$ParentProductCategory->ref."/".$ProductCategory->ref."/".$Product->ref;
$Bread[2]['label'] = $Product->name;

$View = 'products/product.php';
include $ThemePath.'index.html.php';
?>