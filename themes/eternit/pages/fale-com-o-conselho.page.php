<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    include $ThemePath.'inc/fale-com.frm.php';
    ?><script>alert('Mensagem enviada com sucesso. Em breve entraremos em contato');</script>
<?php } ?>
                            <!--page-->
                            <section id="page" class="post-menu">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="span12">
                                            <h1 class="title text-left hr-bottom">
                                                <?php echo $Page->title; ?>
                                            </h1>
                                        </div>
                                    </div>
<?php include $ThemePath.'inc/breadcrumbs.php'; ?>
                                    <div class="row">
                                        <div class="span12 page-cover">
<?php if($Page->cover != "") { ?>
                                            <img src="images/cover/<?php echo $Page->cover; ?>" />
<?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="span12 text-left">
                                            <div class="the-content">
                                                <?php echo $Page->content; ?>
                                                <div style="margin-top:20px;">
                                                    <form action="fale-com-o-conselho?enviado" method="post" class="validate-form">
                                                        <div style="clear:both;"></div>
                                                        <div style="float:left; margin-right:50px; border-right:1px solid #ccc; padding-right:50px;">
                                                            <input name="type" type="hidden" value="conselho" />
                                                            <input name="name" type="text" placeholder="Nome" class="c-input2  validate-required" /> *<br />
                                                            <select name="state" class="validate-required">
                                                                <option value="">Selecione o Estado</option> 
                                                                <option value="ac">Acre</option> 
                                                                <option value="al">Alagoas</option> 
                                                                <option value="am">Amazonas</option> 
                                                                <option value="ap">Amap&aacute;</option> 
                                                                <option value="ba">Bahia</option> 
                                                                <option value="ce">Cear&aacute;</option> 
                                                                <option value="df">Distrito Federal</option> 
                                                                <option value="es">Espírito Santo</option> 
                                                                <option value="go">Goi&aacute;s</option> 
                                                                <option value="ma">Maranh&atilde;o</option> 
                                                                <option value="mt">Mato Grosso</option> 
                                                                <option value="ms">Mato Grosso do Sul</option> 
                                                                <option value="mg">Minas Gerais</option> 
                                                                <option value="pa">Par&aacute;</option> 
                                                                <option value="pb">Para&iacute;ba</option> 
                                                                <option value="pr">Paran&aacute;</option> 
                                                                <option value="pe">Pernambuco</option> 
                                                                <option value="pi">Piau&iacute;</option> 
                                                                <option value="rj">Rio de Janeiro</option> 
                                                                <option value="rn">Rio Grande do Norte</option> 
                                                                <option value="ro">Rond&ocirc;nia</option> 
                                                                <option value="rs">Rio Grande do Sul</option> 
                                                                <option value="rr">Roraima</option> 
                                                                <option value="sc">Santa Catarina</option> 
                                                                <option value="se">Sergipe</option> 
                                                                <option value="sp">S&atilde;o Paulo</option> 
                                                                <option value="to">Tocantins</option>
                                                            </select> *<br />
                                                            <input name="email" type="text" placeholder="E-mail" class="c-input2  validate-email" /> *<br />
                                                            <input name="telephone" type="text" placeholder="Telefone" class="c-input2  validate-required" /> *<br />
                                                            <textarea name="message" class="c-textarea" placeholder="Mensagem" style="width: 300px;vertical-align: top;"></textarea> *<br />
                                                            <input type="submit" class="enviar-red" value="" />
                                                        </div>
                                                    </form>
                                                    <div style="float:left;">
                                                        <img src="<?php echo $ThemeUrl.'img/72-anos.jpg'; ?>"  style="margin-left:60px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php include $ThemePath."inc/share.php"; ?>
                                </div>
                            </section>
