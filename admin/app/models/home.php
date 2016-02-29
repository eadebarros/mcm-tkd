<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */
/*
$User = new User();
$userCount = $User->count();
$totalUsers = ceil($userCount / 80 * 100);*/

$conf['icon'] = "icon-dashboard";
$conf['title'] = "Home";
$conf['subtitle'] = __("Dashboard with all your tasks, messages and actions");

$ServusMode = "G";

require_once "app/views/index.html.php";
?>