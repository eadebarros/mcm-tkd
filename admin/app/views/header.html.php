<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */
?>
<!doctype html>
<html lang="<?php echo $Config->LANG; ?>">
    <head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" />
        <meta charset="utf-8">
        <!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <!-- Use title if it's in the page YAML frontmatter -->
        <title><?php the_title(); ?></title>
        <link href="css/application.css" media="screen" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.js" type="text/javascript"></script>
        <script src="js/vendor/excanvas.js" type="text/javascript"></script>
        <![endif]-->
        <script src="js/vendor/jquery191.js" type="text/javascript"></script>
        <script src="js/vendor/jqueryui1102.js" type="text/javascript"></script>
        <script src="js/application.js" type="text/javascript"></script>
        
        <script src="js/vendor/validation/jquery.validationEngine-pt.js" type="text/javascript"></script>
        <script src="js/charts/xcharts_left_sine.js" type="text/javascript"></script>
        <script src="js/charts/xcharts_sine.js" type="text/javascript"></script>
        <script src="js/charts/xcharts_bar.js" type="text/javascript"></script>
        <script src="js/charts/sparkline_samples.js" type="text/javascript"></script>
        <script src="js/charts/xcharts_left_sine.js" type="text/javascript"></script>

        <script src="js/tinymce/tinymce.min.js" type="text/javascript"></script>
        <script src="js/tinymce/tinymce-start.js" type="text/javascript"></script>
        
        <?php src("js/date.format.js"); ?>
        
        <?php src("js/functions.js"); ?>
        <?php src("js/gritter.js"); ?>
        <?php src("js/calendar.js"); ?>
        <?php src("js/generic.js"); ?>
    </head>
