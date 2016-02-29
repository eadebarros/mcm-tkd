<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <base href="<?php echo MAIN_URL; ?>" />
        <title>
<?php
$la = @end($attrs);
if(count($attrs) == 0) {
    echo "Eternit | A Marca da Coruja";
} else
if($la['controller'] === "page") {
    echo $Page->title." | Eternit | A Marca da Coruja";
} else
if($la['controller'] === "product") {
    echo $Product->name." | Eternit | A Marca da Coruja";
} else
if($la['controller'] === "post") {
    echo $Post->title." | Eternit | A Marca da Coruja";
} else
if($la['controller'] === "product_category") {
    echo $ProductCategory->name." | Eternit | A Marca da Coruja";
} else
if ($la === "destaques") {
    echo "Destaques | Eternit | A Marca da Coruja";
}
?>

            </title>
        <meta name="keywords" content="coberturas, telhas, crisotila, loucas, sanitarias, solucoes, construtivas, metais, catalogos, caixa dagua, hidraulica, pia, lavabo, torneira, vaso sanitario, placas cimenticias" />
        <meta name="description" content="Conhe&ccedil;a toda a linha de produtos com a qualidade Eternit: coberturas, caixas d'&aacute;gua, placas ciment&iacute;cias, lou&ccedil;as e metais sanit&aacute;rios" />

        <meta property="og:image" content="<?php echo $ThemeUrl; ?>img/eternit.png" >
        
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
            <![endif]-->
        <link rel="stylesheet" type="text/css" id="color" href="<?php echo $ThemeUrl; ?>css/red.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $ThemeUrl; ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $ThemeUrl; ?>css/bootstrap.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo $ThemeUrl; ?>css/bootstrap-responsive.css" >
        <script type="text/javascript" src="<?php echo $ThemeUrl; ?>js/jquery-1.9.1.js"></script>
        
        <link rel="stylesheet" href="<?php echo $ThemeUrl; ?>css/jquery-ui.css">


        
        <script type="text/javascript" src="<?php echo $ThemeUrl; ?>js/jquery-migrate-1.2.1.min.js"></script>
        <!--Revolution slider start here-->
        <script type="text/javascript" src="<?php echo $ThemeUrl; ?>js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="<?php echo $ThemeUrl; ?>js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="<?php echo $ThemeUrl; ?>js/jquery-ui-1.10.4.custom.js"></script>
        <script type="text/javascript" src="<?php echo $ThemeUrl; ?>js/preview-fullwidth.js"></script>
        <script type="text/javascript" src="<?php echo $ThemeUrl; ?>js/color_switcher.js"></script>
        <script type="text/javascript" src="<?php echo $ThemeUrl; ?>js/jquery.elevatezoom.js"></script>


    </head>
