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
                                                    <label class="control-label"><?php elabel("attribute"); ?></label>
                                                    <div class="controls">
                                                        <div class="span4">
                                                            <select class="chzn-select" name="attribute_id">
                                                                <option value="">Selecione...</option>
<?php
if($Attributes) foreach($Attributes as $Row) { ?>
                                                                <option value="<?php echo $Row->id; ?>"<?php if($AttributeValue->category_id == $Row->id)echo ' selected="selected"'; ?>><?php echo $Row->name; ?></option>

<?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("name"); ?></label>
                                                    <div class="controls">
                                                        <?php $AttributeValue->input("name", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $AttributeValue->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $AttributeValue->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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