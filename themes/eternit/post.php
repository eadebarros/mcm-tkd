                            <!--page-->
                            <section id="post" class="post-menu">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="span12">
                                            <h1 class="title text-left hr-bottom">
                                                <?php echo $Post->title; ?>
                                            </h1>
                                        </div>
                                    </div>
<?php include $ThemePath.'inc/breadcrumbs.php'; ?>                                    
                                    <div class="row">
                                        <div class="span12 page-cover">
                                            <img src="<?php echo MAIN_URL."images/novidades.jpg"; ?>" />
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:20px;">
                                        <div class="span12 text-left">
                                            <div class="the-content">
                                                <?php echo $Post->content; ?>
                                            </div>
                                        </div>
                                    </div>
<?php include $ThemePath."inc/share.php"; ?>
                                </div>
                            </section>
