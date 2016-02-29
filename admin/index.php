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
        /*print_r(debug_backtrace());*/
        die("Class $name not found!");
    }
}

if(__DIR__ === "__DIR__") define('__DIR__', dirname(__FILE__));

define('ROOT_PATH', dirname(dirname(__FILE__)) . '/');

require ROOT_PATH. 'config/config.conf.php';

define('ADMIN_URL', MAIN_URL . basename(__DIR__) . '/');

require ROOT_PATH . 'inc/functions.php';

require ROOT_PATH . 'inc/actions.php';

require 'app/models/core.php';
?>