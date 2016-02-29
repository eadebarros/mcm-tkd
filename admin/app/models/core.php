<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

session_start();

$Config = new Config();

$langFile = ROOT_PATH . 'lang/' . $Config->LANG . '.php';
if(file_exists($langFile)) include $langFile;

$Admin = new User();
$AdminSession = new Session();


if ($_COOKIE['s'] && !$Admin->logged()) {
    if ($AdminSession->check($_COOKIE['s'])) {
        $Admin->auth();
    } else {
        alert(__("Expired session! Your session has expired and you have been logged out"), "block");
    }
}

if($_GET['action']) {
    if(in_array($_GET['action'], $actionsArray)) {
        eval($_GET['action']."();");
    }
}

if (!$Admin->logged()) {
    include 'app/models/sign-in.php';
} else {
    if (is_array($Admin->permissions) === false) {
        $Permission = new Permission();
        $Admin->permissions = $Permission->fetch($Admin->profile_id);
    }
    
    $ServusController = ($_GET['a']) ? $_GET['a'] : "home";
    
    if(is_pluralized($ServusController)) {
        $ServusController = Inflector::singularize($ServusController);
        $ServusMode = "list";
    } else {
        $ServusMode = (empty($_GET['m'])) ? "list" : $_GET['m'] ;
    }


    if(is_nativeController($ServusController)) {
        include 'app/models/'.$ServusController.'.php';
    } else
    if (is_controller($ServusController)) {
        if ($Admin->can($ServusMode, $ServusController)) {
            $ControllerClass = Inflector::camelize($ServusController);
            $ControllerClass = new $ControllerClass();
            include 'app/controllers/'.$ServusController.'/'.$ServusController.'.ctrl.php';
        } else {
            header('HTTP/1.0 403 Forbidden');
            die("<h1>403 Forbidden</h1>");
        }
    } else {
        header("HTTP/1.0 404 Not Found");
        die("<h1>404 Page not Found</h1>");
    }
}