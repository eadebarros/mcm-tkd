                            <!--page-->
                            <section id="page" class="post-menu">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="span12">
                                            <h1 class="title text-left hr-bottom">
                                                Resultados da busca
                                            </h1>
                                        </div>
                                    </div>
<?php include $ThemePath.'inc/breadcrumbs.php'; ?>
                                    <div class="row">
                                        <div class="span12 page-cover">
                                            <img src="images/cover/page_2.jpg" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="span12 text-left">
                                            <div class="the-content">
                                                <div class="search-results">
                                                    
<?php
if($Results) {
    foreach($Results as $Row) {
        if($Row->type == "page") {
            $Page->get((int)$Row->id);
            if($Page->layout == "sobre-a-eternit" || $Page->layout == "amianto-crisotila" ) {
                $link = 'sobre-a-eternit/'.$Row->href;
            } else {
                $link = $Row->href;
            }
        } else
        if($Row->type == "post") {
            $Post->get((int)$Row->id);
            $link = 'destaques/'.$Post->category_ref.'/'.$Row->href;
        } else
        if($Row->type == "product") {
            $Product->get((int)$Row->id);
            $link = 'produtos/'.$Product->category_ref.'/'.$Product->subcategory_ref.'/'.$Row->href;
        } else {
            $link = $Row->href;
        }
        echo '<p class="title"><a href="'.$link.'">'.$Row->title.'</a></p>';
        echo '<p class="excerpt">'.char_excerpt(strip_tags($Row->content), 256).'</p>';
    }
} else {
    echo "<p style=\"font-weight:bold;color:#2d2d2d;font-size:14px;\">Busca sem resultados</p>
";
}
    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php include $ThemePath."inc/share.php"; ?>
                                </div>
                            </section>
