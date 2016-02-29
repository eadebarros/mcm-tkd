<?php
$Page = new Page();
$Page->get((int)$Id);

if($Page->parent != "0") {
    $ParentPage = new Page();
    $ParentPage->get((int)$Page->parent);
    $Bread[0]['ref'] = $ParentPage->ref;
    $Bread[0]['label'] = $ParentPage->title;
}

if($attrs[0] == "sobre-a-eternit") {
    $Bread[0]['ref'] = "sobre-a-eternit/grupo";
    $Bread[0]['label'] = "Sobre a eternit";
    
    $Bread[] = Array("ref" => "sobre-a-eternit/".$Page->ref, "label" => $Page->title);
} else {
    $Bread[] = Array("ref" => $Page->ref, "label" => $Page->title);
}

$View = 'pages/'.$Page->layout.'.page.php';
include $ThemePath.'index.html.php'
?>