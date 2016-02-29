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
                                                    <label class="control-label"><?php elabel("title"); ?></label>
                                                    <div class="controls">
                                                        <?php $Event->input("title", array("data-prompt-position" => "topLeft", "data-control" => "post", "class" => "to-slug mode-".$Event->FormMode)); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("product"); ?></label>
                                                    <div class="controls">
                                                        <?php $Event->input("product", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("link"); ?></label>
                                                    <div class="controls">
                                                        <input type="text" name="ref" id="post-ref" class="url_slug mode-<?php echo $Event->FormMode; ?>" value="<?php echo $Event->ref; ?>" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("content"); ?></label>
                                                    <div class="controls">
                                                        <textarea name="content" class="tinymce"><?php echo $Event->content; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("address"); ?></label>
                                                    <div class="controls">
                                                        <?php $Event->input("address", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("start date"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $Event->input("start_date", array("data-prompt-position" => "topLeft", "value" => $Event->start_date ? toDate($Event->start_date, "d/m/Y") : '')); ?>
                                                        </div>
                                                        <div class="span1">
                                                            <input type="text" name="start_time" id="event-start_time" value="<?php echo ($Event->start_date) ? toDate($Event->start_date, "H:i") : '' ; ?>" data-prompt-position="topLeft">
                                                        </div>
                                                        <div class="span2">
                                                            <input type="button" class="btn btn-blue" style="width:80px;" onclick="$('#event-start_date').val(now('dd/mm/yyyy'));$('#event-start_time').val(now('HH:MM'))" value="<?php _e("now"); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("finish date"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $Event->input("finish_date", array("data-prompt-position" => "topLeft", "value" => $Event->finish_date ? toDate($Event->finish_date, "d/m/Y") : '')); ?>
                                                        </div>
                                                        <div class="span1">
                                                            <input type="text" name="finish_time" id="event-finish_time" value="<?php echo ($Event->finish_date) ? toDate($Event->finish_date, "H:i") : '' ; ?>" data-prompt-position="topLeft">
                                                        </div>
                                                        <div class="span2">
                                                            <input type="button" class="btn btn-blue" style="width:80px;" onclick="$('#event-finish_date').val(now('dd/mm/yyyy'));$('#event-finish_time').val(now('HH:MM'))" value="<?php _e("now"); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $Event->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $Event->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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