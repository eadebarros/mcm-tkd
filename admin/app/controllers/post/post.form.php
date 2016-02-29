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
                                                    <label class="control-label"><?php elabel("title"); ?></label>
                                                    <div class="controls">
                                                        <?php $Post->input("title", array("data-prompt-position" => "topLeft", "data-control" => "post", "class" => "to-slug mode-".$Post->FormMode)); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("subtitle"); ?></label>
                                                    <div class="controls">
                                                        <?php $Post->input("subtitle", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("link"); ?></label>
                                                    <div class="controls">
                                                        <input type="text" name="ref" id="post-ref" class="url_slug mode-<?php echo $Post->FormMode; ?>" value="<?php echo $Post->ref; ?>" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("category"); ?></label>
                                                    <div class="controls">
                                                        <div class="span4">
                                                            <select class="chzn-select" name="category_id">
                                                                <option value="">Selecione...</option>
<?php
if($Categories) foreach($Categories as $Row) { ?>
                                                                <option value="<?php echo $Row->id; ?>"<?php if($Post->category_id == $Row->id)echo ' selected="selected"'; ?>><?php echo $Row->name; ?></option>

<?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("content"); ?></label>
                                                    <div class="controls">
                                                        <textarea name="content" class="tinymce"><?php echo $Post->content; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("cover"); ?></label>
                                                    <div class="controls">
                                                        <?php $Post->input("cover", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
<?php if($Post->FormMode === "edit" && $Post->cover != "") { ?>
                                                <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <input type="checkbox" name="delete_img" id="delete_img" value="1" class="icheck"/>
                                                        <label for="delete_img"> <?php _e("remove image"); ?></label> <br />
                                                        <img src="<?php echo MAIN_URL."images/cover/".$Post->cover; ?>" />
                                                    </div>
                                                </div>                               
<?php } ?>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("source"); ?></label>
                                                    <div class="controls">
                                                        <?php $Post->input("source", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("publish_date"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $Post->input("publish_date", array("data-prompt-position" => "topLeft", "value" => $Post->publish_date ? toDate($Post->publish_date, "d/m/Y") : '')); ?>
                                                        </div>
                                                        <div class="span1">
                                                            <input type="text" name="publish_time" id="post-publish_time" value="<?php echo ($Post->publish_date) ? toDate($Post->publish_date, "H:i") : '' ; ?>" data-prompt-position="topLeft">
                                                        </div>
                                                        <div class="span2">
                                                            <input type="button" class="btn btn-blue" style="width:80px;" onclick="$('#post-publish_date').val(now('dd/mm/yyyy'));$('#post-publish_time').val(now('HH:MM'))" value="<?php _e("now"); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <div class="span6">
                                                            <?php $Post->input("featured", array("data-prompt-position" => "topLeft", "class" => "icheck", "value" => "1")); ?>
                                                            <label for="featured"> <?php _e("featured"); ?></label> <br />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $Post->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $Post->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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