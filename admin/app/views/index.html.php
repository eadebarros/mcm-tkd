<?php
if($_GET['as'] === "json" && $ServusMode === "list") {
    header('Content-type: application/json; charset=ISO-8859-1');
    include 'app/views/list.json.php';
    die();
}

header('Content-type: text/html; charset=ISO-8859-1');
include "app/models/header.php";
?>    <body>
<?php

if($ControllerClass === null) {
    redir("?a=products");
    die();
}
$ControllerClass = new $ControllerClass();
include "app/layouts/navbar.html.php";
include "app/layouts/sidebar.html.php"; ?>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="area-top clearfix">
                        <div class="pull-left header">
                            <h3 class="title">
                                <i class="<?php echo $ControllerClass->Conf['icon']; ?>"></i>
                                <?php this_title($ServusController, $ServusMode); ?>

                            </h3>
                            <h5>
                                <?php if($ServusMode === "G" || $ServusMode === "list") echo $ControllerClass->Conf['subtitle']; ?>

                            </h5>
                        </div>
                    </div>
                </div>
                <div class="container-fluid padded">
                    <div class="row-fluid">
                        <!-- Breadcrumb start -->
                        <div id="breadcrumbs">
                            <div class="breadcrumb-button blue">
                                <span class="breadcrumb-label"><i class="icon-home"></i> Home</span>
                                <span class="breadcrumb-arrow">
                                    <span></span>
                                </span>
                            </div>
                            <div class="breadcrumb-button">
                                <span class="breadcrumb-label">
                                    <i class="<?php echo $ControllerClass->Conf['icon'] ?>"></i> <?php this_title($ServusController, $ServusMode); ?>

                                </span>
                                <span class="breadcrumb-arrow">
                                    <span></span>
                                </span>
                            </div>
                        </div>
                        <!-- Breadcrumb end -->
                    </div>
                </div>
<?php alert(); ?>
                <div class="container-fluid padded">
<?php
if(has_view($ServusController, $ServusMode)) {
    include "app/".$ServusController."/".$ServusController."_".$ServusMode.".html.php";
} else
if($ServusMode === "add" || $ServusMode === "edit") {
    include "app/views/form.html.php";
} else
if($ServusMode === "list" || $ServusMode === "delete") {
    include "app/views/list.html.php";
} else
if($ServusMode === "G" && is_controller($ServusController)) {
    include "app/".$ServusController."/".$ServusController.".html.php";
} else {
    include "app/views/".$ServusController.".html.php";
}
?>
                </div>
            </div>
        </div>
        <!-- html components -->
        <!-- find me in partials/modal_simple -->
        <div id="confirm-modal" class="modal hide fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h6 id="modal-tablesLabel">Confirma&ccedil;&atilde;o</h6>
            </div>
            <div class="modal-body">
                Tem certeza?
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="#" id="modal-go" class="btn btn-blue">Sim</a>
            </div>
        </div>
    <!-- find me in partials/modal_form -->
    </body>
</html>
