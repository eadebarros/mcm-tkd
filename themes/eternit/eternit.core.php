<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$ThemePath = dirname(__FILE__).DIRECTORY_SEPARATOR;
$ThemeUrl = MAIN_URL.str_replace(THE_ROOT, "", $ThemePath);

$ThemeUrl = str_replace("\\", "/", $ThemeUrl);

include $ThemePath.'functions.php';

if($_GET['ht'] == "1") {
    $Href = new Href();
    $attrs = $Href->decode($_GET['a']);
    $url = $Href->encode($attrs);
    
    foreach($attrs as $key) {
        if(!is_array($key)) {
            $cf = true;
            break;
        }
    }
    
    $lastAttr = $attrs[count($attrs) - 1];
    if($cf === true) {
        foreach($exs as $ex => $controller) {
            if($url === $ex) {
                $View = $controller;
                if(is_array($lastAttr)) {
                    $Controller = ($lastAttr['ref']);
                    $Id = $lastAttr['id'];
                } else {
                    $Controller = $lastAttr;
                }
                break;
            } else {
                $View = "404";
            }
        }
    } else {
        $View = $lastAttr['controller'];
        $Id = $lastAttr['id'];
        $Controller = $lastAttr['ref'];
    }

    $ThisUrl = MAIN_URL.trim($_GET['a']).'/';
} else {
    $View = ($_GET['a']) ? $_GET['a'] : "home" ;
}

header('Content-type: text/html; charset=ISO-8859-1');
include $ThemePath.'controllers/'.$View.".ctrl.php";