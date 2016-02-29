                            <!--page-->
                            <section id="page" class="post-menu">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="span12">
                                            <h1 class="title text-left hr-bottom">
                                                <?php echo $Page->title; ?>
                                                <div class="pull-right second-menu">
<?php menu("sobre-a-eternit", $Controller); ?>      
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
                                    <div class="row">
                                        <div class="span12 text-left">
                                            <div class="the-content">
                                                <?php echo $Page->content; ?>
                                                <hr />
                                                <div>
                                                    <a href="http://www.eternit.com.br/faq#b1" class="btn-c">
                                                        <div style="float:left; cursor:pointer;width:225px;">
                                                            <img src="images/1.png" width="15" height="50" style="float:left;" />
                                                            <div style="float:left; background:URL('<?php echo MAIN_URL; ?>images/3.png'); height:50px; line-height:50px;">Risco do banimento do mineral<div style="position:relative; top:-15px; text-align:center" class="b1 txt-crisotila"><img src="<?php echo MAIN_URL; ?>images/seta_baixo.png" width="11" height="8" /></div></div>
                                                            <img src="images/2.png" width="15" height="50"  style="float:left;" />
                                                        </div>
                                                    </a>
                                                    <a href="http://www.eternit.com.br/faq#b2" class="btn-c">
                                                        <div style="float:left; cursor:pointer;width:325px;">
                                                            <img src="images/1.png" width="15" height="50" style="float:left;" />
                                                            <div style="float:left; background:URL('<?php echo MAIN_URL; ?>images/3.png'); height:50px; line-height:50px;">A quest&atilde;o jur&iacute;dica do mineral crisotila no Brasil <div style="position:relative; top:-15px; text-align:center" class="b2 txt-crisotila"><img src="<?php echo MAIN_URL; ?>images/seta_baixo.png" width="11" height="8"  /></div></div>
                                                            <img src="images/2.png" width="15" height="50"  style="float:left;" />
                                                        </div>
                                                    </a>
                                                    <a href="http://www.eternit.com.br/faq#b3" class="btn-c">
                                                        <div style="float:left; cursor:pointer;width:142px;">
                                                            <img src="images/1.png" width="15" height="50" style="float:left;" />
                                                            <div style="float:left; background:URL('<?php echo MAIN_URL; ?>images/3.png'); height:50px; line-height:50px;">Audi&ecirc;ncia P&uacute;blica<div style="position:relative; top:-15px; text-align:center" class="b3 txt-crisotila"><img src="<?php echo MAIN_URL; ?>images/seta_baixo.png" width="11" height="8"  /></div></div>
                                                            <img src="images/2.png" width="15" height="50"  style="float:left;" />
                                                        </div>
                                                    </a>
                                                    <a href="http://www.eternit.com.br/faq#b4" class="btn-c">
                                                        <div style="float:left; cursor:pointer;width:207px;">
                                                            <img src="images/1.png" width="15" height="50" style="float:left;" />
                                                            <div style="float:left; background:URL('<?php echo MAIN_URL; ?>images/3.png'); height:50px; line-height:50px;">In&iacute;cio do julgamento no STF<div style="position:relative; top:-15px; text-align:center" class="b4 txt-crisotila"><img src="<?php echo MAIN_URL; ?>images/seta_baixo.png" width="11" height="8"  /></div></div>
                                                            <img src="images/2.png" width="15" height="50"  style="float:left;" />
                                                        </div>
                                                    </a>
                                                    <a href="http://www.eternit.com.br/faq#b5" class="btn-c">
                                                        <div style="float:left; cursor:pointer;width:195px;">
                                                            <img src="images/1.png" width="15" height="50" style="float:left;" />
                                                            <div style="float:left; background:URL('<?php echo MAIN_URL; ?>images/3.png'); height:50px; line-height:50px;">Posicionamento da Eternit<div style="position:relative; top:-15px; text-align:center" class="b5 txt-crisotila"><img src="<?php echo MAIN_URL; ?>images/seta_baixo.png" width="11" height="8"  /></div></div>
                                                            <img src="images/2.png" width="15" height="50"  style="float:left;" />
                                                        </div>
                                                    </a>
                                                    <div class="clearfix"></div>
                                                    <br />
                                                    <a name="b1"></a>
                                                    <div class="b1 txt-crisotila">
<?php
$Page->get(9);
echo $Page->content;
?>
                                                    </div>
                                                    <a name="b2"></a>
                                                    <div class="b2 txt-crisotila">
<?php
$Page->get(10);
echo $Page->content;
?>
                                                    </div>
                                                    <a name="b3"></a>
                                                    <div class="b3 txt-crisotila">
<?php
$Page->get(11);
echo $Page->content;
?>
                                                    </div>
                                                    <a name="b4"></a>
                                                    <div class="b4 txt-crisotila">
<?php
$Page->get(12);
echo $Page->content;
?>
                                                    </div>
                                                    <a name="b5"></a>
                                                    <div class="b5 txt-crisotila">
<?php
$Page->get(13);
echo $Page->content;
?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php include $ThemePath."inc/share.php"; ?>
                                </div>
                            </section>
