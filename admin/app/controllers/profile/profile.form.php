<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */
?>                                        <form action="" method="post" class="form-horizontal fill-up validatable">
                                            <div class="padded">
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("name"); ?></label>
                                                    <div class="controls">
                                                        <?php $Profile->input("name", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <table class="table table-normal" style="border: 1px solid #dddddd;">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;">
                                                                    <?php _e("controllers"); ?>/<?php _e("permissions"); ?>

                                                                </th>
                                                                <th style="text-align: center;">
                                                                    <?php _e("list"); ?>

                                                                </th>
                                                                <th style="text-align: center;">
                                                                    <?php _e("add"); ?>
                                                                </th>
                                                                <th style="text-align: center;">
                                                                    <?php _e("edit"); ?>
                                                                </th>
                                                                <th style="text-align: center;">
                                                                    <?php _e("delete"); ?>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php foreach(get_controllers() as $controller) {
    $ThisController = Inflector::camelize($controller);
    $ThisController = new $ThisController();
    if($ThisController->Conf['modes'] != "G") {?>
                                                            <tr>
                                                                <td style="text-align: center;">
                                                                    <?php _e($controller); ?>

                                                                </td>
<?php
        foreach(str_split("LAED", 1) as $mode) {
            
            ?>
                                                                <td style="text-align: center;">
                                                                    <input type="checkbox" class="icheck" name="c-<?php echo $controller; ?>[<?php echo $mode;?>]" value="1"<?php if(preg_match('/'.$mode.'/i', $Permissions[$controller]))echo ' checked="checked"'; ?> />
                                                                </td>

<?php   } ?>
                                                            </tr>
                                                            
<?php
    }
} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $Profile->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $Profile->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
                                                            <label for="status_0"><i class="icon-remove"></i> <?php _e("inactive"); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-blue"><?php _e("save"); ?></button>
                                                <a href="?a=<?php echo Inflector::pluralize($ServusController); ?>" class="btn btn-default"><?php _e("cancel"); ?></a>
                                            </div>
                                        </form>