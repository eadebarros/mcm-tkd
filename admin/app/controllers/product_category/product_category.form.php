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
                                                    <label class="control-label"><?php elabel("name"); ?></label>
                                                    <div class="controls">
                                                        <?php $ProductCategory->input("name", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("link"); ?></label>
                                                    <div class="controls">
                                                        <input type="text" name="ref" id="productcategory-ref" class="url_slug mode-<?php echo $ProductCategory->FormMode; ?>" value="<?php echo $ProductCategory->ref; ?>" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("description"); ?></label>
                                                    <div class="controls">
                                                        <textarea name="description" class="tinymce"><?php echo $ProductCategory->description; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("Texto Interno"); ?></label>
                                                    <div class="controls">
                                                        <textarea name="texto_interno" class="tinymce"><?php echo $ProductCategory->texto_interno; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("cover"); ?></label>
                                                    <div class="controls">
                                                        <?php $ProductCategory->input("cover", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
<?php if($ProductCategory->FormMode === "edit" && $ProductCategory->cover != "") { ?>
                                                 <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <input type="checkbox" name="delete_cover" id="delete_cover" value="1" class="icheck"/>
                                                        <label for="delete_cover"> <?php _e("remove image"); ?></label> <br />
                                                        <img src="<?php echo MAIN_URL."images/cover/".$ProductCategory->cover; ?>" />
                                                    </div>
                                                </div>                               
<?php } ?>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("category image"); ?></label>
                                                    <div class="controls">
                                                        <?php $ProductCategory->input("image", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
<?php if($ProductCategory->FormMode === "edit" && $ProductCategory->image != "") { ?>
                                                 <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <input type="checkbox" name="delete_image" id="delete_image" value="1" class="icheck"/>
                                                        <label for="delete_image"> <?php _e("remove image"); ?></label> <br />
                                                        <img src="<?php echo MAIN_URL."images/display/".$ProductCategory->image; ?>" />
                                                    </div>
                                                </div>                               
<?php } ?>

                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("Nome do Bot&atilde;o"); ?></label>
                                                    <div class="controls">
                                                        <input type="text" name="textobtn" id="textobtn" value="<?php echo $ProductCategory->textobtn; ?>" />
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("Cor do Bot&atilde;o"); ?></label>
                                                    <div class="controls">
                                                            <select name="colorbtn" id="colorbtn" class="chzn-select">
                                                                    <option value="">Selecione...</option>
<?php



$colorbtn_array = array('bgcolors-yellow'=>'amarelo','bgcolors-red'=>'vermelho','bgcolors-blue'=>'azul','bgcolors-green'=>'verde');

if($colorbtn_array) foreach($colorbtn_array as $key => $val) { ?>
                                                                    <option value="<?php echo $key; ?>"<?php if($ProductCategory->colorbtn == $key)echo ' selected="selected"'; ?>>
																	<?php echo $val; ?>
                                                                    </option>

<?php } ?>
                                                            </select>
                                                        
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $ProductCategory->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $ProductCategory->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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