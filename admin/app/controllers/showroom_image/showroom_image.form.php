<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */
?>                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal fill-up validatable">
                                            <div class="padded">
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("legend"); ?></label>
                                                    <div class="controls">
                                                        <?php $ShowroomImage->input("legend", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("image"); ?></label>
                                                    <div class="controls">
                                                        <input type="file" name="image" />
                                                    </div>
                                                </div>
<?php if($ShowroomImage->FormMode == "edit") {?>
                                                <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <img src="<?php echo MAIN_URL."images/showroom/".$ShowroomImage->id.".jpg"; ?>" style="height: 200px;"/>
                                                    </div>
                                                </div>
<?php } ?>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("order"); ?></label>
                                                    <div class="controls">
                                                        <?php $ShowroomImage->input("image_order", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $ShowroomImage->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $ShowroomImage->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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