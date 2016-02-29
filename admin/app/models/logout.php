<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$AdminSession->status = 0;
$AdminSession->end = date("Y-m-d H:i:s");
$AdminSession->update("token = '".str_rot13($_COOKIE['s'])."'");

setcookie("s", null);
unset($_SESSION['s']);
setAlert(__("you've been logged out", true), "success");
redir(ADMIN_URL);
