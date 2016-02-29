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
                                                        <?php $CertifiedProfessional->input("name", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("telephone"); ?></label>
                                                    <div class="controls">
                                                        <?php $CertifiedProfessional->input("telephone", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("email"); ?></label>
                                                    <div class="controls">
                                                        <?php $CertifiedProfessional->input("email", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("neighborhood"); ?></label>
                                                    <div class="controls">
                                                        <?php $CertifiedProfessional->input("region", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("city"); ?></label>
                                                    <div class="controls">
                                                        <?php $CertifiedProfessional->input("city", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("certification"); ?></label>
                                                    <div class="controls">
                                                        <?php $CertifiedProfessional->input("certification", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("state"); ?></label>
                                                    <div class="controls">
                                                        <?php $CertifiedProfessional->input("state", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $CertifiedProfessional->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $CertifiedProfessional->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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