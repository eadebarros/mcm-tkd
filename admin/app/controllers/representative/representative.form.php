
                                                        
                                       <form action="" method="post" class="form-horizontal fill-up validatable">
                                            <div class="padded">
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("name"); ?></label>
                                                    <div class="controls">
                                                        <?php $Representative->input("name", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("contato"); ?></label>
                                                    <div class="controls">
                                                        <?php $Representative->input("contato", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>


                                                
                                                

                                                

                                                
                                                
                                                
                                              <div class="control-group">
                                                    <label class="control-label"><?php elabel("telephone"); ?></label>
                                                    <div class="controls">
                                                        <?php $Representative->input("telephone", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("email"); ?></label>
                                                    <div class="controls">
                                                        <?php $Representative->input("email", array("data-prompt-position" => "topLeft")); ?>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("&Aacute;rea de atua&ccedil;&atilde;o"); ?></label>
                                                    <div class="controls">
                                                        <select name="cidades_estados[]" size="30" multiple="multiple">
                                                        
                                                        
                                                        
                                                        <?php 
														
														foreach($cidades_estados as $item){
															$ativo=false;
															if($cidades_estados_ativos){
																foreach($cidades_estados_ativos as $item_ativos){
																	if($item->id==$item_ativos->id_cidade){
																		$ativo=true;
																		echo '<option value="'.$item->id.'" selected="selected">'.$item->estado.' - '.$item->cidade.'</option>';
																	}
																}
																if(!$ativo){
																	echo '<option value="'.$item->id.'">'.$item->estado.' - '.$item->cidade.'</option>';
																}
															}else{
																echo '<option value="'.$item->id.'">'.$item->estado.' - '.$item->cidade.'</option>';	
															}
															
														}
														
														?>

                                                         
                                                        </select>
                                                  </div>
                                                </div>
                                                     
                                                
                                                
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><?php elabel("status"); ?></label>
                                                    <div class="controls">
                                                        <div class="span2">
                                                            <?php $Representative->input("status", array("id" => "status_1", "value" => "1", "class" => "icheck")); ?>
                                                            <label for="status_1"><i class="icon-ok"></i> <?php _e("active"); ?></label>
                                                        </div>
                                                        <div class="span2">
                                                            <?php $Representative->input("status", array("id" => "status_0", "value" => "0", "class" => "icheck")); ?>
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