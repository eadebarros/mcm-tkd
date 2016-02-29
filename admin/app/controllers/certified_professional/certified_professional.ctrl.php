<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$CertifiedProfessional = new CertifiedProfessional();

$CertifiedProfessional->FormMode = ($ServusMode === "add" || $ServusMode === "edit") ? $ServusMode : null ;

if($ServusMode == "delete") $return = $CertifiedProfessional->delete("id = '".$_GET['id']."'");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $CertifiedProfessional->loadForm();
    $return = ($ServusMode === "add") ? $CertifiedProfessional->insert() : $CertifiedProfessional->update("id = '".$_GET['id']."'");
}

if($return !== null) setAlert(_m($ServusController, $ServusMode, (bool)$return), __("status-".(int)$return, false));
if($return === true) redir("?a=".  Inflector::pluralize($ServusController));

if($ServusMode === "edit") $CertifiedProfessional->get((int)$_GET['id']);

if($ServusMode === "list" || $ServusMode === "delete") {
    $CertifiedProfessionals = $CertifiedProfessional->getAll(null, "ORDER BY id DESC");
}

require_once "app/views/index.html.php";
?>