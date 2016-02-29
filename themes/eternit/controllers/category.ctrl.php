<?php
$Category = new Category();
$Post = new Post();

$Bread[0]['ref'] = "destaques";
$Bread[0]['label'] = "Destaques";

if($Id) {
    $Category->get((int)$Id);
    $Posts = $Post->getAll("category_id = '$Id' AND {$Post->Table}.status = '1'");

    $Bread[1]['ref'] = "destaques/".$Category->ref;
    $Bread[1]['label'] = $Category->name;
} else {
    $Posts = $Post->getAll($Post->Table.".status = '1'", "ORDER BY publish_date DESC LIMIT 0,12");
}

$View = 'category.php';
include $ThemePath.'index.html.php';