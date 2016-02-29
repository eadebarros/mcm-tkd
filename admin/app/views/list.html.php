<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Obj = ${Inflector::camelize(Inflector::pluralize($ServusController))};
if(!$ControllerClass->Conf['grid']) {
    alert(__("grid fields not set!"), "error");
} else {
	
if($Admin->can("add", $ServusController)) { ?>

                    <div class="row-fluid">
                        <div class="span12">
                            <!-- find me in partials/action_nav_normal -->
                            <!--big normal buttons-->
                            <div class="action-nav-normal">
                                <div class="row-fluid">
                                    <div class="span2 action-nav-button">
                                        <a href="?a=<?php echo $ServusController; ?>&amp;m=add" title="<?php echo __("add")." ".__($ServusController, false); ?>">
                                            <i class="icon-plus"></i>
                                            <span><?php echo __("add")." ".__($ServusController, false); ?></span>
                                        </a>
                                        <span class="triangle-button red"><i class="icon-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <div class="box-header"><span class="title"><?php _e(Inflector::pluralize($ServusController)); ?></span></div>
                                <div class="box-content">
                                    <!-- find me in partials/data_tables_custom -->
                                    <div id="dataTables">
                                        <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                            <thead>
                                                <tr>
<?php foreach($ControllerClass->Conf['grid'] as $field) { ?>
                                                    <th>
                                                        <div><?php elabel($field); ?></div>
                                                    </th>
<?php } ?>
                                                    <th>
                                                        <?php _e("actions").'asd'; ?>

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

if($Obj)
foreach($Obj as $Row) { ?>
                                                <tr>
<?php foreach($ControllerClass->Conf['grid'] as $field) { ?>
                                                    <td>
                                                        <?php
                                                        if($ControllerClass->Fields[$field]['display']) {
                                                            $fn = str_replace('$1', $Row->$field, $ControllerClass->Fields[$field]['display']);
                                                            echo eval($fn);
                                                        } else {
                                                            echo $Row->$field;
                                                        }
                                                        ?>

                                                    </td>
<?php } ?>
                                                    <td align="right">
<?php if($Admin->can("edit", $ServusController)) { ?>
                                                        <a href="?a=<?php echo $ServusController;?>&amp;m=edit&amp;id=<?php echo $Row->id; ?>"><i class="icon-edit"></i></a>
<?php } ?>
<?php if($Admin->can("delete", $ServusController)) { ?>
                                                        <a href="#confirm-modal" data-toggle="modal" data-href="?a=<?php echo $ServusController;?>&amp;m=delete&amp;id=<?php echo $Row->id; ?>" class="confirm-modal"><i class="icon-remove"></i></a>
<?php } ?>
                                                    </td>
                                                </tr>
<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php }
?>