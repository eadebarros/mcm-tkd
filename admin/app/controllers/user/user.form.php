<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */
?>                                        <form action="" method="post" class="form-horizontal fill-up validatable" enctype="multipart/form-data">
                                            <div class="padded">
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("first_name"); ?></label>
                                                    <div class="controls">
                                                        <?php $User->input("first_name", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("last_name"); ?></label>
                                                    <div class="controls">
                                                        <?php $User->input("last_name", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("gender"); ?></label>
                                                    <div class="controls">
                                                        <div class="span4">
                                                            <?php $User->input("gender", array("id" => "sex_male", "value" => "male", "class" => "icheck")); ?>
                                                            <label for="sex_male">&male; <?php _e("male"); ?></label>
                                                        </div>
                                                        <div class="span4">
                                                            <?php $User->input("gender", array("id" => "sex_female", "value" => "female", "class" => "icheck")); ?>
                                                            <label for="sex_female">&female; <?php _e("female"); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("user"); ?></label>
                                                    <div class="controls">
                                                        <?php $User->input("user", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("email"); ?></label>
                                                    <div class="controls">
                                                        <?php $User->input("email", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("profile_name"); ?></label>
                                                    <div class="controls">
                                                        <div class="span4">
                                                            <select class="chzn-select" name="profile_id">
                                                                <option value="">Selecione...</option>
<?php
if($Profiles) foreach($Profiles as $Row) { ?>
                                                                <option value="<?php echo $Row->id; ?>"<?php if($User->profile_id == $Row->id)echo ' selected="selected"'; ?>><?php echo $Row->name; ?></option>

<?php } ?>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("password"); ?></label>
                                                    <div class="controls">
                                                        <?php $User->input("password", array("value" => null, "data-prompt-position" => "topLeft", "required" => (bool)($User->FormMode == "add"))); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php _e("retype password"); ?></label>
                                                    <div class="controls">
                                                        <input type="password" name="password_2" id="password_2" class="<?php if($User->FormMode == "add") echo 'validate[required,equals[password]]';?>" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php _e("profile picture"); ?></label>
                                                    <div class="controls">
                                                        <input type="file" name="img" />
                                                    </div>
                                                </div>
<?php if($User->FormMode === "edit" && $User->picture != "") { ?>
                                                 <div class="control-group">
                                                    <label class="control-label"></label>
                                                    <div class="controls">
                                                        <input type="checkbox" name="delete_img" id="delete_img" value="1" class="icheck"/>
                                                        <label for="delete_img"> <?php _e("remove image"); ?></label>
                                                    </div>
                                                </div>                               
<?php } ?>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span4">
                                                            <?php $User->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span4">
                                                                <?php $User->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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