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
                                                        <?php $HomeSlide->input("title", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("subtitle"); ?></label>
                                                    <div class="controls">
                                                        <?php $HomeSlide->input("subtitle", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("&iacute;cone"); ?></label>
                                                    <div class="controls">
                                                        <div class="span4">
                                                            <select class="chzn-select" name="icon">
                                                                   <option value="" <?php if($HomeSlide->icon==''){echo 'selected="selected"';}?>>Selecione...</option>
                                                                   <option value="ico_acesssorios" <?php if($HomeSlide->icon=='ico_acesssorios'){echo 'selected="selected"';}?> >Acesssorios</option>
                                                                   <option value="ico_coberturas" <?php if($HomeSlide->icon=='ico_coberturas'){echo 'selected="selected"';}?>>Coberturas</option>
                                                                   <option value="ico_loucas" <?php if($HomeSlide->icon=='ico_loucas'){echo 'selected="selected"';}?>>Lou&ccedil;as</option>
                                                                   <option value="ico_placa" <?php if($HomeSlide->icon=='ico_placa'){echo 'selected="selected"';}?>>Placa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group" style="display:none">
                                                    <label class="control-label"><?php elabel("cinemagraphs"); ?></label>
                                                    <div class="controls">
                                                        <input type="file" name="swf" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("static"); ?></label>
                                                    <div class="controls">
                                                        <input type="file" name="image" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("link"); ?></label>
                                                    <div class="controls">
                                                        <?php $HomeSlide->input("link", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("order"); ?></label>
                                                    <div class="controls">
                                                        <?php $HomeSlide->input("list_order", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $HomeSlide->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $HomeSlide->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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