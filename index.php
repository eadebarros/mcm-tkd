<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

function __autoload($name) {
    $ServusClass = ROOT_PATH . 'classes/' . $name . '.class.php';
    $ServusTool = ROOT_PATH . 'inc/' . strtolower($name) . '/' . $name . '.php';
    if(file_exists($ServusClass)) {
        require $ServusClass;
    } else
    if(file_exists($ServusTool)) {
        require $ServusTool;
    } else {
        die("Class $name not found!");
    }
}

define('ROOT_PATH', dirname(__FILE__) . '/');

require ROOT_PATH. 'config/config.conf.php';

require ROOT_PATH . 'inc/functions.php';

require ROOT_PATH . 'inc/actions.php';

$Config = new Config();

require 'lang/'.$Config->LANG.'.php';

header ('Content-type: text/html; charset=UTF-8');

require 'themes/'.$Config->THEME.'/'.$Config->THEME.'.core.php';
?>