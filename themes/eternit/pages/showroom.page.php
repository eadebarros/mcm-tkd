<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    include $ThemePath.'inc/showroom.frm.php';
    ?><script>alert('Mensagem enviada com sucesso. Em breve entraremos em contato');</script>
<?php } ?>
                            <!--page-->
                            <section id="page" class="post-menu">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="span12">
                                            <h1 class="title text-left hr-bottom">
                                                <?php echo $Page->title; ?>
                                                <div class="pull-right second-menu">
<?php menu("showroom", $Controller); ?>
                                                </div>
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
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="span6 text-left">
                                            <div class="the-content">
                                                <?php echo $Page->content; ?>
                                                <div class="clearfix"></div>
                                                <p style="color:red;">
                                                    <strong></strong>
                                                </p>
                                                <div class="clearfix"></div>
                                                <div>
                                                    <form method="post" action="showroom?enviado" class="validate-form">
                                                        <input type="text" name="name" class="c-input validate-required" placeholder="Nome" style="margin: 0 5px 10px 0 !important;" /> <span style="color:red;">*</span><br />
                                                        <input type="text" name="email" class="c-input validate-required validate-email" placeholder="E-mail" style="margin: 0 5px 10px 0 !important;" /> <span style="color:red;">*</span><br />
                                                        <input type="text" name="telephone" class="c-input validate-required" placeholder="Telefone" style="margin: 0 5px 10px 0 !important;" /> <span style="color:red;">*</span><br />
                                                        <input type="text" name="occupation" class="c-input validate-required" placeholder="Ocupa&ccedil;&atilde;o atual" style="margin: 0 5px 10px 0 !important;" /> <span style="color:red;">*</span><br />
                                                        <textarea class="c-textarea" name="message" placeholder="Mensagem" style="width:300px;height:75px;"></textarea><br />
                                                        <input type="submit" class="enviar-red" value="">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div id="showroom" style="text-align: left;">
                                                <p style="color:#ee1c25;font-family: verdana;font-size: 17px;border-bottom: solid 1px #cbcbcb;">
                                                    Galeria de Imagens
                                                </p>
<?php
$ShowroomImage = new ShowroomImage();
$ShowroomImages = $ShowroomImage->getAll(null, "ORDER BY image_order ASC");
foreach($ShowroomImages as $Row) { ?>
                                                <a href="<?php echo MAIN_URL."images/showroom/".$Row->id.".jpg"; ?>" rel="showroom" title="<?php echo $Row->legend; ?>">
                                                    <img src="<?php echo MAIN_URL."images/showroom/thumb/".$Row->id.".jpg"; ?>" />
                                                </a>
<?php } ?>
                                            </div>
                                        </div>
                                    </div>
<?php include $ThemePath."inc/share.php"; ?>
                                </div>
                            </section>
