                            <!--page-->
                            <section id="category" class="post-menu">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="span12">
                                            <h1 class="title text-left hr-bottom">
                                                <?php echo ($Id) ? $Category->name : "Destaques" ; ?>
                                                <div class="pull-right second-menu">
<?php menu("category", $Controller); ?>
                                                </div>
                                            </h1>
                                        </div>
                                    </div>
<?php include $ThemePath.'inc/breadcrumbs.php'; ?>
                                    <div class="row">
                                        <div class="span12 page-cover">
                                            <img src="<?php echo MAIN_URL."images/novidades.jpg"; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="span12 text-left">
                                            <div class="the-content" style="margin-top: 20px;">
<?php
$i = 0;
foreach ($Posts as $Row) {
    if($i == 0) echo '<div class="row">';
?> 
                                                <div class="span6 minipost">
                                                    <div class="pull-left">
                                                        <a href="<?php echo MAIN_URL.'destaques/'.$Row->category_ref.'/'.$Row->ref; ?>">
                                                            <img src="<?php echo ($Row->cover) ? MAIN_URL.'images/cover/'.$Row->cover : $ThemeUrl.'img/'.$Row->category_ref.'.jpg'; ?>" class="post-thumb" />
                                                        </a>
                                                    </div>
                                                    <div class="pull-left post-minimeta">
                                                        <div class="category-category-title"><?php echo $Row->category; ?></div>
                                                        <div class="category-post-title"><?php echo $Row->title; ?></div>
                                                        <div class="category-post-subtitle"><?php echo char_excerpt($Row->subtitle, 56); ?>...</div>
                                                        <a href="<?php echo MAIN_URL.'destaques/'.$Row->category_ref.'/'.$Row->ref; ?>">
                                                            <img src="<?php echo $ThemeUrl; ?>img/ver-mais.jpg" />
                                                        </a>
                                                    </div>
                                                </div>
<?php
    $i++;
    if($i == 2) {
        echo '</div>';
        $i = 0;
    }
}
?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="span12 text-left">
                                            
                                        </div>
                                    </div>
<?php include $ThemePath."inc/share.php"; ?>
                                </div>
                            </section>
