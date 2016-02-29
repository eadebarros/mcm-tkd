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
                                                        <?php $Page->input("title", array("data-prompt-position" => "topLeft", "data-control" => "post", "class" => "to-slug mode-".$Page->FormMode)); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("subtitle"); ?></label>
                                                    <div class="controls">
                                                        <?php $Page->input("subtitle", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("link"); ?></label>
                                                    <div class="controls">
                                                        <input type="text" name="ref" id="page-ref" class="url_slug mode-<?php echo $Page->FormMode; ?>" value="<?php echo $Page->ref; ?>" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("parent page"); ?></label>
                                                    <div class="controls">
                                                        <div class="span4">
                                                            <select class="chzn-select" name="parent">
                                                                <option value="">Selecione...</option>
<?php
if($Pages) foreach($Pages as $Row) { ?>
                                                                <option value="<?php echo $Row->id; ?>"<?php if($Page->parent == $Row->id)echo ' selected="selected"'; ?>><?php echo $Row->title; ?></option>

<?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("layout"); ?></label>
                                                    <div class="controls">
                                                        <div class="span4">
                                                            <select class="chzn-select" name="layout">
<?php
if($pageLayouts) foreach($pageLayouts as $Key => $Row) { ?>
                                                                <option value="<?php echo $Key; ?>"<?php if($Page->layout == $Key)echo ' selected="selected"'; ?>><?php echo $Row; ?></option>

<?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("content"); ?></label>
                                                    <div class="controls">
                                                        <textarea name="content" class="tinymce"><?php echo $Page->content; ?></textarea>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <?php elabel("Destaque HOME"); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("Titulo"); ?></label>
                                                    <div class="controls">
                                                        <input type="text" name="destaquehome_titulo" id="destaquehome_titulo" class=" " value="<?php echo $Page->destaquehome_titulo; ?>" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("Sub Titulo"); ?></label>
                                                    <div class="controls">
                                                        <input type="text" name="destaquehome_sub_titulo" id="destaquehome_sub_titulo" class=" " value="<?php  echo $Page->destaquehome_sub_titulo;  ?>" />
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("Destaque Home"); ?></label>
                                                    <div class="controls">
                                                        <textarea name="destaquehome_content" class="tinymce"><?php echo $Page->destaquehome_content; ?></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("Imagem Destaque"); ?></label>
                                                    <div class="controls">
                                                        <?php $Page->input("destaquehome_imagem", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>                                              
<?php if($Page->FormMode === "edit" && $Page->destaquehome_imagem != "") { ?>
                                                 <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <input type="checkbox" name="delete_img" id="delete_img" value="1" class="icheck"/>
                                                        <label for="delete_img"> <?php _e("remove image"); ?></label> <br />
                                                        <img src="<?php echo MAIN_URL."images/destaquehome_imagem/".$Page->destaquehome_imagem; ?>" />
                                                    </div>
                                                </div>                               
<?php } ?>
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("Home destaque"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $Page->input("destaquehome_status", array("id" => "destaquehome_status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="destaquehome_status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $Page->input("destaquehome_status", array("id" => "destaquehome_status_0", "value" => "0", "class" => "icheck")); ?>
                                                            <label for="destaquehome_status_0"><i class="icon-remove"></i> <?php _e("inactive"); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("cover"); ?></label>
                                                    <div class="controls">
                                                        <?php $Page->input("cover", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
<?php if($Page->FormMode === "edit" && $Page->cover != "") { ?>
                                                 <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <input type="checkbox" name="delete_img" id="delete_img" value="1" class="icheck"/>
                                                        <label for="delete_img"> <?php _e("remove image"); ?></label> <br />
                                                        <img src="<?php echo MAIN_URL."images/cover/".$Page->cover; ?>" />
                                                    </div>
                                                </div>                               
<?php } ?>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $Page->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $Page->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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