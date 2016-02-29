<?php

function __autoload($name) {
    $ServusClass = '../../../../../classes/' . $name . '.class.php';
    $ServusTool = '../../../../../inc/' . strtolower($name) . '/' . $name . '.php';
    if(file_exists($ServusClass)) {
        require_once $ServusClass;
    } else
    if(file_exists($ServusTool)) {
        require_once $ServusTool;
    } else {
        die("Class $name not found!");
    }
}

// Use install
if (file_exists("install")) {
	header("location: install/index.php");
	die();
}

require_once("../../../../../config/config.conf.php");
require_once("includes/general.php");
require_once("classes/Utils/Error.php");
require_once("classes/ManagerEngine.php");

$MCErrorHandler = new Moxiecode_Error(false);

set_error_handler("HTMLErrorHandler");

// NOTE: Remove default value
$type = getRequestParam("type");
$page = getRequestParam("page", "index.html");
$domain = getRequestParam("domain");

// Clean up type, only a-z stuff.
$type = preg_replace ("/[^a-z]/i", "", $type);

if (!$type) {
	header('location: examples.html');
	die();
}

// Include Base and Core and Config.
$man = new Moxiecode_ManagerEngine($type);

require_once($basepath ."CorePlugin.php");
require_once("config.php");

$man->dispatchEvent("onPreInit", array($type));

// Include all plugins
$pluginPaths = $man->getPluginPaths();

foreach ($pluginPaths as $path)
	require_once($path);

$config = $man->getConfig();

$suffix = "";

if ($domain)
	$suffix .= "?domain=" . $domain;

// Dispatch onInit event
$User = new User();
$_SESSION['isLoggedIn'] = $User->logged();

if ($man->isAuthenticated()) {
	$man->dispatchEvent("onInit");
	header("Location: pages/". $config["general.theme"] ."/" . $page . $suffix);
	die();
} else {
	header("Location: ". $config["authenticator.login_page"] . "?return_url=" . urlencode($_SERVER['REQUEST_URI']));
	die();
}

?>