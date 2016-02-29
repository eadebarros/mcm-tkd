        <div id="ShareSidebar" class="hidden-phone hidden-tablet">
            <div>
                <div class="favorito">
                    <div class="favorito_topo">
                        <div class="favorito_flash">
                            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="150" height="100">
                                <param name="movie" value="<?php echo $ThemeUrl.'img/acesso-rapido.swf'; ?>" />
                                <param name="quality" value="high" />
                                <param name="wmode" value="transparent" />
                                <param name="swfversion" value="15.0.0.0" />
                                <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                                <param name="expressinstall" value="<?php echo $ThemeUrl; ?>scripts/expressInstall.swf" />
                                <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                                <!--[if !IE]>-->
                                <object type="application/x-shockwave-flash" data="<?php echo $ThemeUrl.'img/acesso-rapido.swf'; ?>" width="150" height="100">
                                    <!--<![endif]-->
                                    <param name="quality" value="high" />
                                    <param name="wmode" value="transparent" />
                                    <param name="swfversion" value="15.0.0.0" />
                                    <param name="expressinstall" value="<?php echo $ThemeUrl; ?>scripts/expressInstall.swf" />
                                    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                                    <!--[if !IE]>-->
                                </object>
                                <!--<![endif]-->
                            </object>
                        </div>
                    </div>

                    <div class="quick-access">
                        <div class="item">
                            <a href="<?php echo MAIN_URL.'produtos/coberturas/fibrocimento'; ?>" title="Coberturas">
                                <img src="<?php echo $ThemeUrl; ?>img/cobertura.png"  />
                                <img src="<?php echo $ThemeUrl; ?>img/ativo-cobertura.png" class="hover" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo MAIN_URL.'produtos/loucas-sanitarias/bacias-sanitarias'; ?>" title="Lou&ccedil;as sanit&aacute;rias">
                                <img src="<?php echo $ThemeUrl; ?>img/sanitario.png" />
                                <img src="<?php echo $ThemeUrl; ?>img/ativo-sanitario.png" class="hover" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo MAIN_URL.'produtos/metais-sanitarios/duchas'; ?>" title="Metais sanit&aacute;rios">
                                <img src="<?php echo $ThemeUrl; ?>img/metais.png" />
                                <img src="<?php echo $ThemeUrl; ?>img/ativo-metais.png" class="hover" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo MAIN_URL.'produtos/solucoes-construtivas/placas-cimenticias'; ?>" title="Solu&ccedil;&otilde;es construtivas">
                                <img src="<?php echo $ThemeUrl; ?>img/solucoes.png" />
                                <img src="<?php echo $ThemeUrl; ?>img/ativo-solucoes.png" class="hover" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo MAIN_URL.'produtos/acessorios/caixas-dagua'; ?>" title="Acess&oacute;rios">
                                <img src="<?php echo $ThemeUrl; ?>img/acessorios.png" />
                                <img src="<?php echo $ThemeUrl; ?>img/ativo-acessorios.png" class="hover" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo MAIN_URL.'onde-encontrar/encontre-uma-assistencia-tecnica'; ?>"  title="Encontre uma assist&ecirc;ncia t&eacute;cnica">
                                <img src="<?php echo $ThemeUrl; ?>img/assistencias.png" />
                                <img src="<?php echo $ThemeUrl; ?>img/ativo-assistencias.png" class="hover" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo MAIN_URL.'catalogos'; ?>" title="Cat&aacute;logos">
                                <img src="<?php echo $ThemeUrl; ?>img/catalogos.png" />
                                <img src="<?php echo $ThemeUrl; ?>img/ativo-catalogos.png" class="hover" />
                            </a>
                        </div>
                    </div>
                    <div class="favorito_recolher">
                        <div class="quick-access-btn open">
                            Recolher
                        </div>
                    </div>
                </div>
            </div>
        </div>