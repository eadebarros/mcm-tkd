<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */
?>
<script type="text/javascript">
    var attr = '<li class="control-group"><div class="span1"><a href="javascript:void(0);" class="remove-attribute"><i class="icon-remove-sign"></i></a></div><div class="span1"><a href="javascript:void(0);" class="handle"><i class="icon-sort"></i></a></div><div class="span3"><input type="text" name="attribute[]" list="list-attributes" autocomplete="off" placeholder="atributo" /></div><div class="span3"><input type="text" name="value[]" placeholder="valor" /><input type="hidden" name="list_order[]" class="list_order" value="1" /></div><div class="span1"><label><input type="checkbox" class="file-checkbox" name="link[]" value="1" onclick="fileToggle(this);" /> Link</label></div><div class="span2 input-file-holder"><input type="file" name="file[]" /></div></li>';
</script>
<br />
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal fill-up validatable">
<?php
if($ListAttributes) { ?>
    <datalist id="list-attributes">
<?php
    foreach($ListAttributes as $Row) { ?>
        <option value="<?php echo $Row->attribute; ?>">
<?php } ?>
    </datalist>
<?php } ?>
    <ul class="nav nav-tabs nav-tabs-left">
        <li class="active"><a href="#product" data-toggle="tab"><i class="icon-shopping-cart"></i> <span><?php _e("product"); ?></span></a></li>
        <li><a href="#attributes" data-toggle="tab"><i class="icon-asterisk"></i> <span><?php _e("attributes"); ?></span></a></li>
        <li><a href="#images" data-toggle="tab"><i class="icon-picture"></i> <span><?php _e("images"); ?></span></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="product">
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php elabel("name"); ?></label>
                    <div class="controls">
                        <?php $Product->input("name", array("data-prompt-position" => "topLeft", "data-control" => "post", "class" => "to-slug mode-" . $Product->FormMode)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("code"); ?></label>
                    <div class="controls">
                        <?php $Product->input("code", array("data-prompt-position" => "topLeft")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("description"); ?></label>
                    <div class="controls">
                        <?php $Product->input("description", array("data-prompt-position" => "topLeft")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("link"); ?></label>
                    <div class="controls">
                        <input type="text" name="ref" id="product-ref" class="url_slug mode-<?php echo $Product->FormMode; ?>" value="<?php echo $Product->ref; ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("product_category"); ?></label>
                    <div class="controls">
                        <div class="span4">
                            <select class="chzn-select" name="product_category_id">
                                <option value="">Selecione...</option>
                                <?php if ($ProductCategories) foreach ($ProductCategories as $Row) { ?>
                                        <option value="<?php echo $Row->id; ?>"<?php if ($Product->product_category_id == $Row->id) echo ' selected="selected"'; ?>><?php echo $Row->name; ?></option>

                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="control-group" style="display:none">
                    <label class="control-label"><?php elabel("product_subcategory"); ?></label>
                    <div class="controls">
                        <div class="span4">
                            <select class="chzn-select" name="product_subcategory_id">
                                <option value="">Selecione...</option>
                                <?php if ($ProductSubCategories) foreach ($ProductSubCategories as $Row) { ?>
                                        <option value="<?php echo $Row->id; ?>"<?php if ($Product->product_subcategory_id == $Row->id) echo ' selected="selected"'; ?>><?php echo $Row->name; ?></option>

                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="control-group" style="display:none">
                    <label class="control-label"><?php elabel("product line"); ?></label>
                    <div class="controls">
                        <div class="span4">
                            <select class="chzn-select" name="line_id">
                                <option value="">Selecione...</option>
                                <?php if ($ProductLines) foreach ($ProductLines as $Row) { ?>
                                        <option value="<?php echo $Row->id; ?>"<?php if ($Product->line_id == $Row->id) echo ' selected="selected"'; ?>><?php echo $Row->name; ?></option>

                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("details"); ?></label>
                    <div class="controls">
                        <textarea name="details" class="tinymce"><?php echo $Product->details; ?></textarea>
                    </div>
                </div>
                <div class="control-group" style="display:none">
                    <label class="control-label"><?php elabel("ambient"); ?></label>
                    <div class="controls">
                        <div class="span4">
                            <select class="chzn-select" name="ambient">
                                <option value="">Selecione...</option>
                                <?php if ($ProductAmbients) foreach ($ProductAmbients as $Key => $Row) { ?>
                                        <option value="<?php echo $Key; ?>"<?php if ($Product->ambient == $Key) echo ' selected="selected"'; ?>><?php echo $Row; ?></option>

                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("order"); ?></label>
                    <div class="controls">
                        <?php $Product->input("display_order", array("data-prompt-position" => "topLeft")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("guide"); ?></label>
                    <div class="controls">
                        <?php $Product->input("guide", array("data-prompt-position" => "topLeft")); ?>
                        <br /><br />
<?php if($Product->guide) {?>
                        Download: <a href="<?php echo MAIN_URL.'downloads/guide/'.$Product->guide; ?>" target="_blank"><?php echo MAIN_URL.'downloads/guide/'.$Product->guide; ?></a><br /><br />
                        <label>
                            <input type="checkbox" name="delete[guide]" value="1" class="icheck" /> Excluir arquivo
                        </label>
<?php } ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("DWG"); ?></label>
                    <div class="controls">
                        <?php $Product->input("dwg", array("data-prompt-position" => "topLeft")); ?>
                        <br /><br />
<?php if($Product->dwg) {?>
                        Download: <a href="<?php echo MAIN_URL.'downloads/dwg/'.$Product->dwg; ?>" target="_blank"><?php echo MAIN_URL.'downloads/dwg/'.$Product->dwg; ?></a><br /><br />
                        <label>
                            <input type="checkbox" name="delete[dwg]" value="1" class="icheck" /> Excluir arquivo
                        </label>
<?php } ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("blueprint"); ?></label>
                    <div class="controls">
                        <?php $Product->input("blueprint", array("data-prompt-position" => "topLeft")); ?>
                        <br /><br />
<?php if($Product->blueprint) {?>
                        Download: <a href="<?php echo MAIN_URL.'downloads/blueprint/'.$Product->blueprint; ?>" target="_blank"><?php echo MAIN_URL.'downloads/blueprint/'.$Product->blueprint; ?></a><br /><br />
                        <label>
                            <input type="checkbox" name="delete[blueprint]" value="1" class="icheck" /> Excluir arquivo
                        </label>
<?php } ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("flow curve"); ?></label>
                    <div class="controls">
                        <?php $Product->input("flow_curve", array("data-prompt-position" => "topLeft")); ?>
                        <br /><br />
<?php if($Product->flow_curve) {?>
                        Download: <a href="<?php echo MAIN_URL.'downloads/flow_curve/'.$Product->flow_curve; ?>" target="_blank"><?php echo MAIN_URL.'downloads/flow_curve/'.$Product->flow_curve; ?></a><br /><br />
                        <label>
                            <input type="checkbox" name="delete[flow_curve]" value="1" class="icheck" /> Excluir arquivo
                        </label>
<?php } ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php elabel("video"); ?></label>
                    <div class="controls">
                        <?php $Product->input("video", array("data-prompt-position" => "topLeft")); ?>
                        
                    </div>
                </div>
                <div class="control-group" style="display:none">
                    <label class="control-label"><?php elabel("additional video"); ?></label>
                    <div class="controls">
                        <?php $Product->input("additional_video", array("data-prompt-position" => "topLeft")); ?>
                        
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <input type="checkbox" name="bndes" id="bndes" value="1" class="icheck"<?php if($Product->bndes == "1")echo ' checked="checked"'; ?>/>
                        <label for="bndes"> Pagamento com BNDES</label>
                    </div>
                </div>
                
                
                <div class="control-group">
                    <label class="control-label">Tipos de jato:</label>
                    <div class="controls">
                        <div class="span4">
                            <select class="chzn-select" id="seal">
                                <option value="">Selecione</option>
<?php
foreach($Seals as $Row) { ?>
                                <option value="<?php echo $Row->id; ?>" data-url="<?php echo MAIN_URL.'images/seals/'.$Row->file; ?>"><?php echo $Row->name; ?></option>
<?php } ?>
                            </select>
                            <br /><br />
                            <ul id="seals-ul">
<?php
if($ProductSeals)
foreach($ProductSeals as $Row) { ?>
                                <li id="li-<?php echo $Row->seal_id; ?>">
                                    <img src="<?php echo MAIN_URL.'images/seals/'.$Row->file; ?>" />
                                    <?php echo $Row->name; ?>
                                    <input type="hidden" name="seal[]" value="<?php echo $Row->seal_id; ?>" />
                                    <input type="hidden" class="list_order" name="seal_order[]" value="<?php echo $Row->list_order; ?>" />
                                    <a href="javascript: void(0);" class="remove-seal" onclick="removeSeal(this);">
                                        <i class="icon-remove"></i>
                                    </a>
                                </li>

<?php } ?>

                            </ul>
                        </div>
                        <div class="span1">
                            <a href="javascript:void(0);" id="add-seal" class="btn btn-blue">Adicionar</a>
                        </div>
                    </div>
                </div>
                
                
                <div class="control-group">
                    <label class="control-label"><?php elabel("status"); ?></label>
                    <div class="controls">
                        <div class="span2">
                            <?php $Product->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                        </div>
                        <div class="span2">
                            <?php $Product->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
                            <label for="status_0"><i class="icon-remove"></i> <?php _e("inactive"); ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="attributes">
            <div class="padded">
                <div class="control-group">
                    <div class="span2"></div>
                    <div class="span3 text-center">Atributo</div>
                    <div class="span3 text-center">Valor</div>
                </div>
                <ul class="control-group" id="attr-holder" style="margin-left:0px;list-style:none;">
                    <?php
                    if ($Product->FormMode === "edit" && $ProductAttributes) {
                        foreach ($ProductAttributes as $Row) {
                            ?>
                    <li class="control-group">
                        <div class="span1">
                            <a href="javascript:void(0);" class="remove-attribute"><i class="icon-remove-sign"></i></a>
                        </div>
                        <div class="span1"><a href="javascript:void(0);" class="handle"><i class="icon-sort"></i></a></div>
                        <div class="span3">
                            <input type="text" value="<?php echo $Row->attribute; ?>" name="attribute[]" autocomplete="off" list="list-attributes" placeholder="atributo" />
                        </div>
                        <div class="span3">
                            <input type="text" value="<?php echo $Row->value; ?>" name="value[]" placeholder="valor" />
                            <input type="hidden" name="list_order[]" class="list_order" value="<?php echo $Row->list_order; ?>" />
                        </div>
                        <div class="span1">
                            <label>
                                <input type="checkbox" class="file-checkbox" name="link[]" value="1" onclick="fileToggle(this);"<?php if($Row->link == "1") echo ' checked="checked"';?> />
                                Link
                            </label>
                        </div>
                        <div class="span2 input-file-holder" <?php if($Row->link == "1") echo ' style="display:block;"';?>>
                            <input type="file" name="file[]" />
                            <input type="hidden" name="the_file[]" value="<?php echo $Row->file; ?>" />
                        </div>
                    </li>
                        <?php
                        }
                    } else {
                        ?>
                    <li class="control-group">
                        <div class="span1">
                            <a href="javascript:void(0);" class="remove-attribute"><i class="icon-remove-sign"></i></a>
                        </div>
                        <div class="span1"><a href="javascript:void(0);" class="handle"><i class="icon-sort"></i></a></div>
                        <div class="span3">
                            <input type="text" name="attribute[]" list="list-attributes" autocomplete="off" placeholder="atributo" />
                        </div>
                        <div class="span3">
                            <input type="text" name="value[]" placeholder="valor" />
                            <input type="hidden" name="list_order[]" class="list_order" value="1" />
                        </div>
                        <div class="span1">
                            <label>
                                <input type="checkbox" class="file-checkbox" name="link[]" value="1" onclick="fileToggle(this.value);" />
                                Link
                            </label>
                        </div>
                        <div class="span2 input-file-holder">
                            <input type="file" name="file[]" />
                        </div>
                    </li>
<?php } ?>
                </ul>
                <div class="control-group">
                    <div class="span2"></div>
                    <div class="span3">
                        <a href="javascript:void(0);" class="btn btn-blue add-attr"><?php _e("add more"); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="images">
            <div class="padded">
<?php include "app/controllers/product/upload.html.php"; ?>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?php _e("save"); ?></button>
        <a href="?a=<?php echo Inflector::pluralize($ServusController); ?>" class="btn btn-default"><?php _e("cancel"); ?></a>
    </div>
</form>