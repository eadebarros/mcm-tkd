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
                                                <div class="pull-left" style="margin-left:0px;width:540px;">
                                                    <div>
                                                        <a href="javascript:void(0);" class="unity" id="u-showroom-sp" style="margin-left: 357px;margin-top: 333px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-fibr-fili-go" style="margin-left: 342px;margin-top: 251px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-fibr-fili-pr" style="margin-left: 316px;margin-top: 359px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-fibr-fili-rj" style="margin-left: 420px;margin-top: 334px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-fibr-fili-ba" style="margin-left: 430px;margin-top: 208px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-tegu-at-sp" style="margin-left: 353px;margin-top: 352px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-tegu-sj-sp" style="margin-left: 323px;margin-top: 323px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-tegu-sc" style="margin-left: 328px;margin-top: 391px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-tegu-rs" style="margin-left: 277px;margin-top: 407px;;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-tegu-ba" style="margin-left: 451px;margin-top: 208px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-fili-sp" style="margin-left: 342px;margin-top: 341px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-precon-go" style="margin-left: 336px;margin-top: 268px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-mine-go" style="margin-left: 336px;margin-top: 237px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-mine-ce" style="margin-left: 453px;margin-top: 108px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <a href="javascript:void(0);" class="unity" id="u-tegu-go" style="margin-left: 321px;margin-top: 266px;"><img src="<?php echo $ThemeUrl.'img/white-dot.png'; ?>" /></a>
                                                        <img src="<?php echo $ThemeUrl; ?>img/mapa.jpg"  style="float:left; margin-right:30px; max-width:540px;" border="0" />
                                                    </div>
                                                </div>
                                                <div class="span6">
                                                    <br /><br />
<?php
$Pages = $Page->getAll($Page->Table.".parent = '".$Id."' AND {$Page->Table}.status = '1'");
foreach($Pages as $Row) { ?>
                                                    <div class="pagina_unidades <?php echo $Row->ref; ?>" style="<?php if($Row->ref != "u-showroom-sp")echo "display:none;"; ?>">
                                                        <?php echo $Row->content; ?>
                                                    </div>
<?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php include $ThemePath."inc/share.php"; ?>
                                </div>
                            </section>
