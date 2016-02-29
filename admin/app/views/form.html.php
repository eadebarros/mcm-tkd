<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Class = ${Inflector::camelize($ServusController)};
?>
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- find me in partials/action_nav_normal -->
                            <!--big normal buttons-->
                            <div class="action-nav-normal">
                                <div class="row-fluid">
                                    <div class="span1" style="margin-bottom: 15px;">
                                        <a href="?a=<?php echo Inflector::pluralize($ServusController); ?>" title="<?php _e($ServusController); ?>" class="btn btn-default pull-left">
                                            <i class="icon-arrow-left"></i>
                                            <span><?php _e("back"); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <div class="box-header"><span class="title"><i class="icon-plus-sign"></i> <?php echo __($ServusMode)." ".__($ServusController, false); ?></span></div>
                                <div class="box-content">
<?php include "app/controllers/".$ServusController."/".$ServusController.".form.php"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
