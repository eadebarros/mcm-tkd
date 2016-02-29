<?php
$Post = new Post();
$Post->get((int)$Id);

$Bread[0]['ref'] = "destaques";
$Bread[0]['label'] = "Destaques";

$Bread[1]['ref'] = "destaques/".$Post->category_ref;
$Bread[1]['label'] = $Post->category;

$Bread[2]['ref'] = "destaques/".$Post->category_ref."/".$Post->category_ref;
$Bread[2]['label'] = $Post->title;

$View = 'post.php';
include $ThemePath.'index.html.php'
?>