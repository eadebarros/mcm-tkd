<div class="sub_page_top">
  <div class="container">
    <section class="row-fluid">
<?php if($ProductCategory->cover != "") { ?>
                <img src="images/cover/<?php echo $ProductCategory->cover; ?>" />
<?php } ?>
      <div class="clr"></div>
    </section>
    <!--end row-fluid-->
    <div class="clr"></div>
  </div>
  <!--end container-->
  
  <div class="clr"></div>
</div>

<div class="sub-menu-pages-prod">
  <div class="container">
        <div class="row-fluid sub-menu-produtos">
        <a href="produtos/coberturas"><img src="<?php echo $ThemeUrl; ?>img/img-template-produtos/link_coberturas.jpg"  /></a>
        <img src="<?php echo $ThemeUrl; ?>img/img-template-produtos/pro-sep.png" class="pro-sep" />
        <a href="produtos/placascimenticia"><img src="<?php echo $ThemeUrl; ?>img/img-template-produtos/link-placas-cimenticias.jpg"  /></a>
        <img src="<?php echo $ThemeUrl; ?>img/img-template-produtos/pro-sep.png" class="pro-sep" />
        <a href="produtos/loucas-sanitarias"><img src="<?php echo $ThemeUrl; ?>img/img-template-produtos/link-loucas-sanitarias.jpg"  /></a>
        <img src="<?php echo $ThemeUrl; ?>img/img-template-produtos/pro-sep.png" class="pro-sep"  />
        <a href="produtos/acessorios"><img src="<?php echo $ThemeUrl; ?>img/img-template-produtos/link-acessorios.jpg"  /></a>
        </div>
      <div class="clr"></div>
    </section>
    <!--end row-fluid-->
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
</div>


  <div class="container">
  	<div class="row-fluid show-grid sub-menu-pages-border">
        <h1 class="span6 linh <?php echo $ProductCategory->colorbtn;?>-texto"><?php echo $ProductCategory->name; ?></h1>
        <?php include $ThemePath.'inc/breadcrumbs.php'; ?>
        <span class="borders"></span>
    </div>
    <div class="pages">
	<?php echo $ProductCategory->texto_interno; ?>
    

			<div class="clr"></div>
            <section class="row-fluid">
            
<?php
$i = 0;

foreach($Products as $Row) {
    if($i === 0 ){
		echo '<section class="row-fluid">';
	}
    ?>
                <div class="span4">
                    <div class="product-image-div">
                        <a href="<?php echo MAIN_URL.$attrs[0]['ref'].'/'.$attrs[1]['ref'].'/'.$Row->ref; ?>">
                            <img src="<?php echo MAIN_URL.'images/products/listing/'.$Row->listing_image;?>" />
                        </a>
                    </div>
                    <div class="div-btn-cat-produtos bt-<?php echo $ProductCategory->colorbtn;?>" >
                    <div class="div-btn-cat-produtos-left"></div>
                    <div class="div-btn-cat-produtos-right"></div>
                    <a href="<?php echo MAIN_URL.$attrs[0]['ref'].'/'.$attrs[1]['ref'].'/'.$Row->ref; ?>" class=" btn-cat-produtos">
					<div><?php echo $Row->name; ?></div>
                    </a>
                    
                    </div>
                </div>
<?php
$i++;
if($i == 3) {
	echo '</section>';
	$i = 0;

}

} ?>
            </section>
            <div class="clr"></div>
            
            
    </div>
    <?php include $ThemePath."inc/share.php"; ?>
    <div class="clr"></div>
  </div>












