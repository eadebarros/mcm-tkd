<?php
$Post = new Post();
$Page = new Page();
$Product = new Product();
$Href = new Href();
$Prize = new Prize();
$CertifiedProfessional = new CertifiedProfessional();
$Search = new Search();

$T = Array(
    "post" => Array("title" => "title", "content" => "content"),
    "page" => Array("title" => "title", "content" => "content"),
    "product" => Array("title" => "name", "content" => "details"),
    "prize" => Array("title" => "prize", "content" => "category"),
    "certified_professional" =>  Array("title" => "name", "content" => "certification")
);

$w = explode(" ", utf8_decode(trim($_GET['q'])));

$Query = "SELECT * FROM (";
if(count($w) == 1) {
    $q = $w[0];
    $Query .= "
    SELECT * FROM (
";
    $comma = false;
    foreach($T as $Key => $Row) {
        $Class = ${Inflector::camelize($Key)};
        if($comma === true) {
            $Query .= "    UNION
";
        }
        $Query .= "        SELECT {$Class->Table}.id,
            {$Class->Table}.".$Row['title']." as title,
            {$Class->Table}.".$Row['content']." as content,
            {$Href->Table}.ref as href,
            {$Href->Table}.type as type
        FROM {$Class->Table}
        LEFT OUTER JOIN {$Href->Table}
            ON {$Class->Table}.id = {$Href->Table}.content_id AND type = '$Key'
        WHERE ".$Row['title']." LIKE '".addslashes($q)."%' AND status = '1'
";
        $comma = true;
    }
    $Query .= "    ) T1
";
} else {
    $i = 1;
    foreach($w as $q) {
        if($i > 1) {
            $Query .= "    UNION
";
        }
    $Query .= "    SELECT * FROM (
";
    $comma = false;
    foreach($T as $Key => $Row) {
        $Class = ${Inflector::camelize($Key)};
        if($comma === true) {
            $Query .= "    UNION
";
        }
        $Query .= "        SELECT {$Class->Table}.id,
            {$Class->Table}.".$Row['title']." as title,
            {$Class->Table}.".$Row['content']." as content,
            {$Href->Table}.ref as href,
            {$Href->Table}.type as type
        FROM {$Class->Table}
        LEFT OUTER JOIN {$Href->Table}
            ON {$Class->Table}.id = {$Href->Table}.content_id AND type = '$Key'
        WHERE ".$Row['title']." LIKE '".addslashes($q)."%' AND status = '1'
";
        $comma = true;
    }
    $Query .= "    ) T$i
";
        $i++;
    }
}
$Query .= ") Q1
UNION
SELECT * FROM (
";
if(count($w) == 1) {
    $q = $w[0];
    $Query .= "    SELECT * FROM (
";
    $comma = false;
    foreach($T as $Key => $Row) {
        $Class = ${Inflector::camelize($Key)};
        if($comma === true) {
            $Query .= "    UNION
";
        }
        $Query .= "        SELECT {$Class->Table}.id,
            {$Class->Table}.".$Row['title']." as title,
            {$Class->Table}.".$Row['content']." as content,
            {$Href->Table}.ref as href,
            {$Href->Table}.type as type
        FROM {$Class->Table}
        LEFT OUTER JOIN {$Href->Table}
            ON {$Class->Table}.id = {$Href->Table}.content_id AND type = '$Key'
        WHERE ".$Row['title']." LIKE '".addslashes($q)."%' AND status = '1'
";
        $comma = true;
    }
    $Query .= "    ) AT1
";
} else {
    $i = 1;
    foreach($w as $q) {
        if($i > 1) {
            $Query .= "    UNION
";
        }
    $Query .= "    SELECT * FROM (
";
    $comma = false;
    foreach($T as $Key => $Row) {
        $Class = ${Inflector::camelize($Key)};
        if($comma === true) {
            $Query .= "    UNION
";
        }
        $Query .= "        SELECT {$Class->Table}.id,
            {$Class->Table}.".$Row['title']." as title,
            {$Class->Table}.".$Row['content']." as content,
            {$Href->Table}.ref as href,
            {$Href->Table}.type as type
        FROM {$Class->Table}
        LEFT OUTER JOIN {$Href->Table}
            ON {$Class->Table}.id = {$Href->Table}.content_id AND type = '$Key'
        WHERE ".$Row['title']." LIKE '".addslashes($q)."%' AND status = '1'
";
        $comma = true;
    }
    $Query .= "    ) AT$i
";
        $i++;
    }
}
$Query .= ") Q2
UNION
SELECT * FROM (
";
if(count($w) == 1) {
    $q = $w[0];
    $Query .= "    SELECT * FROM (
";
    $comma = false;
    foreach($T as $Key => $Row) {
        $Class = ${Inflector::camelize($Key)};
        if($comma === true) {
            $Query .= "    UNION
";
        }
        $Query .= "        SELECT {$Class->Table}.id,
            {$Class->Table}.".$Row['title']." as title,
            {$Class->Table}.".$Row['content']." as content,
            {$Href->Table}.ref as href,
            {$Href->Table}.type as type
        FROM {$Class->Table}
        LEFT OUTER JOIN {$Href->Table}
            ON {$Class->Table}.id = {$Href->Table}.content_id AND type = '$Key'
        WHERE ".$Row['content']." LIKE '%".addslashes($q)."%' AND status = '1'
";
        $comma = true;
    }
    $Query .= "    ) C1
";
} else {
    $i = 1;
    foreach($w as $q) {
        if($i > 1) {
            $Query .= "    UNION
";
        }
    $Query .= "    SELECT * FROM (
";
    $comma = false;
    foreach($T as $Key => $Row) {
        $Class = ${Inflector::camelize($Key)};
        if($comma === true) {
            $Query .= "    UNION
";
        }
        $Query .= "        SELECT {$Class->Table}.id,
            {$Class->Table}.".$Row['title']." as title,
            {$Class->Table}.".$Row['content']." as content,
            {$Href->Table}.ref as href,
            {$Href->Table}.type as type
        FROM {$Class->Table}
        LEFT OUTER JOIN {$Href->Table}
            ON {$Class->Table}.id = {$Href->Table}.content_id AND type = '$Key'
        WHERE ".$Row['content']." LIKE '%".addslashes($q)."%' AND status = '1'
";
        $comma = true;
    }
    $Query .= "    ) C$i
";
        $i++;
    }
}
$Query .= ") Q3
";
    
$Results = $Search->fetchQuery($Query);

$Bread[0]['ref'] = "busca?q=".$_GET['q'];
$Bread[0]['label'] = "Resultados da Busca";

$View = 'busca.html.php';
include $ThemePath.'index.html.php';