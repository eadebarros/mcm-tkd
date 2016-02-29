<?php
$rand = rand(0, 9999999);
/*
            <div class="event_description evcal_eventcard" style="display:none">
                <a href="javascript:void(0);" class="event-sign-up">
                    <img src="<?php echo $ThemeUrl; ?>img/inscreva-se.png" style="float:right;margin-top:10px;margin-right:10px;" />
                </a>
                <div class="evcal_evdata_row bordb evcal_event_details">
                    <div class="event_excerpt" style="display:none">
                        <h3>Detalhes</h3>
                        <?php echo $Row->content; ?>
                    </div>
                    <span class="evcal_evdata_icons evcalicon_1"></span>
                    <div class="evcal_evdata_cell shorter_desc">
                        <div class="eventon_details_shading_bot" style="display: none;">
                            <p class="eventon_shad_p" content="less">
                                <span class="ev_more_text" txt="menos">mais</span>
                                <span class="ev_more_arrow"></span>
                            </p>
                        </div>
                        <div class="eventon_full_description">
                            <h3 class="padb5 evo_h3">Detalhes</h3><div class="eventon_desc_in" itemprop="description">
                                <?php echo $Row->content; ?>
                            </div><div class="clr"></div>
                        </div>
                    </div>
                </div>
                <div class="evcal_evdata_row bordb evcal_evrow_sm evo_metarow_signup">
                    <a href="javascript:void(0);" class="close-form">
                        Fechar [x]
                    </a>
                    <span class="evcal_evdata_icons evcalicon_3"></span>
                    <div class="evcal_evdata_cell">							
                        <h3 class="evo_h3">Inscri&ccedil;&atilde;o: <?php echo $Row->title; ?> - <?php echo $Row->address; ?></h3>
                    </div>
                    <div class="signup-form">
                        <form action="cursos/cursos-e-treinamentos?enviado-<?php echo str_friendly($Row->title); ?>-<?php echo toDate($Row->start_date, "Ymd"); ?>" class="validate-form" method="post">
                            <input type="hidden" name="event_id" value="<?php echo $Row->id; ?>" />
                            <div style="width:40%;float:left;">
                                Nome<br />
                                <?php $Inscreva->input("nome"); ?><br />
                                Endere&ccedil;o<br />
                                <?php $Inscreva->input("endereco"); ?><br />
                                Telefone<br />
                                <?php $Inscreva->input("telefone"); ?><br />
                                Email<br />
                                <?php $Inscreva->input("email"); ?><br />
                                Profiss&atilde;o<br />
                                <?php $Inscreva->input("profissao"); ?><br />
                                Empresa<br />
                                <?php $Inscreva->input("empresa"); ?><br />
                                CNPJ<br />
                                <?php $Inscreva->input("cnpj"); ?><br />
                            </div>
                            <div style="width:40%;float:left;">
                                Como ficou sabendo da exist&ecirc;ncia do treinamento?<br />
                                <?php $Inscreva->input("como_ficou_sabendo"); ?><br />
                                Regi&atilde;o de interesse para presta&ccedil;&atilde;o de servi&ccedil;os / m&atilde;o de obra<br />
                                <?php $Inscreva->input("regiao"); ?><br />
                                Servi&ccedil;os prestados nas duas &uacute;ltimas obras e respectivos locais<br />
                                <?php $Inscreva->input("ultimas_obras"); ?><br />
                                Qual &eacute; o seu interesse no treinamento de <?php echo $Row->title; ?>?<br />
                                <?php $Inscreva->input("qual_interesse"); ?><br />
                                Precisar&aacute; de vaga para autom&oacute;vel ou motocicleta?<br />
                                <label style="display: inline-block;">
                                    <?php $Inscreva->input("vaga_automovel", array("value" => "1")); ?>
                                    Sim
                                </label>
                                <label style="display: inline-block;margin-left:20px;">
                                    <?php $Inscreva->input("vaga_automovel", array("value" => "0")); ?>
                                    N&atilde;o
                                </label><br />
                                <input type="submit" class="enviar-red" value="" style="margin-top:12px;" />
                            </div>
                        </form>
                        <br />
                        <div style="clear:both;"></div>
                        <div style="font-size: 12px;">
                            <b style="font-weight: bold;">EQUIPAMENTOS OBRIGAT&Oacute;RIOS</b>
                            <br /><br />
                            Para participar dos treinamentos, é obrigatório levar os EPI’s mencionados abaixo:
                            <br />
                            - &Oacute;culos de prote&ccedil;&atilde;o 
                            <br />
                            - Sapato fechado 
                            <br />
                            - Trena 
                            <br />
                            - Esquadro
                            <br />
                            - L&aacute;pis carpinteiro
                            <br />
                            - Vestimenta confort&aacute;vel 
                            <br /><br />
                            <b style="font-weight: bold;">Importante:</b> A participa&ccedil;&atilde;o n&atilde;o ser&aacute; permitida, sem os respectivos equipamentos.
                        </div>
                    </div>
                </div>
                <div class="evcal_evdata_row bordb evcal_evrow_sm evo_metarow_time">
                    <span class="evcal_evdata_icons evcalicon_6"></span>
                    <div class="evcal_evdata_cell">							
                        <h3 class="evo_h3">Hor&aacute;rio</h3><p><?php echo toDate($Row->start_date, "H:i"); ?> - <?php echo toDate($Row->finish_date, "H:i"); ?></p>
                    </div>
                </div>
                <div class="evcal_evdata_row bordb evcal_evrow_sm evo_metarow_location">
                    <span class="evcal_evdata_icons evcalicon_7"></span>
                    <div class="evcal_evdata_cell">							
                        <h3 class="evo_h3">Endere&ccedil;o</h3><p><?php echo $Row->address; ?></p>
                    </div>
                </div>
                <div class="evcal_gmaps bordb evo_metarow_gmap" id="evc<?php echo $rand; ?>_gmap"></div>
                <div class="evcal_evdata_row bordb evcal_evrow_sm evo_metarow_socialmedia">
                </div>
                <div class="evcal_evdata_row bordb evcal_close">
                    <p>Fechar</p>
                </div>
            </div>
            <div class="clr"></div>
			*/
?>


<div class="lista_evento data-selectDate-<?php echo toDate($Row->start_date, "m")."-".toDate($Row->start_date, "Y")?>"  >

    <div class="span12" style="padding:20px;">

        
        	<div >
                <div class="span9">
                    <h1 class="linh"><?php echo $Row->title; ?></h1>
                    <span class="evo_date"><?php echo toDate($Row->start_date, "d"); ?><span> - <?php echo toDate($Row->finish_date, "d"); ?></span></span>
                    <span class="evo_month" mo="<?php _e("month-".toDate($Row->start_date, "m")."-min"); ?>"><?php _e("month-".toDate($Row->start_date, "m")."-min"); ?></span>
                </div>
               
                <div class="span3">
                    <div style="float:right"><a href="javascript:void(0)" class="btn btn-danger btn-saibamais-treinamento" data-id="<?php echo $Row->id; ?>">Saiba Mais </a></div>
                    <div class="clr"></div>
                </div>
                <div class="clr"></div>
            </div>
			<div class="clr"></div>
            <div class="conteudo-treinamento">
            		<div class="clr"></div>
                    <div>
                            <h3 class="evo_h3">Detalhes</h3>
                            <?php echo $Row->content; ?>
                    </div>
                    <div >				
                            <br /><h3 class="evo_h3">Hor&aacute;rio</h3><p><?php echo toDate($Row->start_date, "H:i"); ?> - <?php echo toDate($Row->finish_date, "H:i"); ?></p>
                    </div>
                    <div>		
                            <br /><h3 class="evo_h3">Endere&ccedil;o</h3><p><?php echo $Row->address; ?></p>
                    </div>
                    
                    <div style="padding-top:10px;">
                    <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=<?php echo $Row->address; ?>&amp;output=embed"></iframe>
                	</div>
                    <div class="clr"></div>
            </div>
            <div class="clr"></div>

    </div>
    
    <div class="clr"></div>



</div>