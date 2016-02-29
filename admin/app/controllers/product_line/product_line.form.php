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
                                                        <?php $ProductLine->input("name", array("data-prompt-position" => "topLeft", "class" => "to-slug mode-".$ProductLine->FormMode)); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("link"); ?></label>
                                                    <div class="controls">
                                                        <input type="text" name="ref" id="productcategory-ref" class="url_slug mode-<?php echo $ProductLine->FormMode; ?>" value="<?php echo $ProductLine->ref; ?>" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("description"); ?></label>
                                                    <div class="controls">
                                                        <textarea name="description" class="simple-tinymce"><?php echo $ProductLine->description; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("order"); ?></label>
                                                    <div class="controls">
                                                        <?php $ProductLine->input("display_order", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $ProductLine->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $ProductLine->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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