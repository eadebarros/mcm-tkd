<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Permission = new Permission();
$Profile = new Profile();

$Profile->FormMode = ($ServusMode == "add" || $ServusMode == "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $Profile->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $Profile->loadForm();
    if($ServusMode === "add") $Profile->date = date("Y-m-d H:i:s");
    $return = ($ServusMode == "add") ? $Profile->insert() : $Profile->update("id = '".$_GET['id']."'");

    foreach(get_controllers() as $value) {
        //if($value['modes'] != "G") {
            foreach(str_split("LAED", 1) as $thisMode) {
                if($_POST['c-'.$value][$thisMode] == "1") {
                    $Permission->can .= $thisMode;
                }
            }
            if($ServusMode === "add") {
                $Permission->profile_id = $Profile->InsertId;
                $Permission->control = $key;
                $Permission->insert();
            } else {
                if(is_null($Admin->permissions[$value])) {
                    $Permission->profile_id = $_GET['id'];
                    $Permission->control = $value;
                    $Permission->insert();
                } else {
                    $Permission->update("profile_id = '".$_GET['id']."' AND control = '".$value."'");
                }
            }
        //}
    }
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return), __("status-".(int)$return, false));
if($return === true) redir("?a=".$ServusController);

if($ServusMode == "edit") {
    $Profile->get((int)$_GET['id']);
    $Permissions = array();
    foreach($Permission->getAll("profile_id = '".$_GET['id']."'") as $Row) {
        $Permissions[$Row->control] = $Row->can;
    }
}

if($ServusMode == "list" || $ServusMode == "delete") {
    $Profiles = $Profile->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>
