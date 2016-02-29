<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */


if($_SERVER['REQUEST_METHOD'] === "POST") {
    if($Admin->login($_POST['user'], $_POST['password'], $_POST['stay'])) {
        redir(ADMIN_URL);
    } else {
        setAlert(__("incorrect username or password", true), "error");
    }
}

include "app/views/sign-in.html.php";
?>