<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$User = new User();
$Profile = new Profile();

$User->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $User->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $User->loadForm();
    if($_POST['delete_img'] == "1") {
        $User->picture = "";
    }
    
    if($_FILES['img']['name'] != "") {
        $filename = str_friendly("avatar-".$User->name."-".$User->surname).".jpg";
        $image = WideImage::loadFromUpload('img');
        $image->resize(120, 120, 'outside')
              ->crop('center', 'center', 120, 120)
              ->saveToFile('images/avatars/'.$filename, 100);
        $User->picture = $filename;
    }
    
    if($User->picture == "" || $User->picture == null) $User->picture = "avatar-".$User->gender.".jpg";
    
    $User->password = $_POST['password'] == "" ? null : md5(SECRET.$_POST['password'].SECRET) ;
    
    if($ServusMode === "add") {
        $User->date = date("Y-m-d H:i:s");
        $User->secret = randStr(16);
    }
    $return = ($ServusMode === "add") ? $User->insert() : $User->update("id = '".$_GET['id']."'");
}

if($return !== null) alert(_m($ServusController, $ServusMode, (bool)$return), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $User->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $Users = $User->getAll(null, "ORDER BY id DESC");
} else {
    $Profiles = $Profile->getAll($Profile->Table.".status = '1'", "ORDER BY name ASC");
}

require_once "app/views/index.html.php";
?>
