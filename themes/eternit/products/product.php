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
        <h1 class="span7 linh" style="font-size:34px;"><?php echo $Product->name; ?></h1>
        <?php include $ThemePath.'inc/breadcrumbs.php'; ?>
        <span class="borders"></span>
    </div>
  </div>

<!--page-->

     <div class="container">

        <div class="the-content">
            <div class="single-product">
                <div class="row-fluid">
                    <div class="span5">
                        <div style="padding-top: 22px;">
                            <div class="image-canvas">
                                <img style="position: static !important;" src="<?php echo MAIN_URL.'images/products/product/'.$ProductImages[0]->name;?>" id="le-img" data-zoom-image="<?php echo MAIN_URL.'images/products/zoom/'.$ProductImages[0]->name;?>" />
                            </div>
                        </div>
                        <div class="clr"></div>
                        <div id="product-gallery">
<?php
$i = 1;
foreach($ProductImages as $Row) { ?>
                            <div class="product-image-thumb">
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo MAIN_URL.'images/products/medium/'.$Row->name;?>" data-zoom-image="<?php echo MAIN_URL.'images/products/original/'.$Row->name;?>">
                                    <img id="img_<?php echo $i; ?>" src="<?php echo MAIN_URL.'images/products/thumb/'.$Row->name;?>" />
                                </a>
                            </div>

<?php
$i++;
} ?>
                        </div>
                        <script type="text/javascript">
                        $(document).ready(function () {
                            $("#le-img").elevateZoom({
                                gallery: 'product-gallery',
                                cursor: 'pointer',
                                galleryActiveClass: "active",
                                imageCrossfade: false,
                                loadingIcon: "http://www.elevateweb.co.uk/spinner.gif"
                            }); 
                        });
                        </script>
                    </div>
                    
                    <div class="span7">
                    
                    
                    	<div class="clr"></div>
                        <div >
                            <div class="tab-info btn active " id="tab-product-details">
                                Informa&ccedil;&otilde;es
                            </div>
                            <div class="tab-info btn" id="tab-product-downloads">
                                Instala&ccedil;&atilde;o
                            </div>                         
                        </div>
                        
                        
                        
                        
                        
                        
                        <div class="clr"></div>
                        <div class="">
                        
                            <div class="p-tab tab-product-details">
                                <div style="border: solid 1px #dedede; margin-top: 3px; text-align:justify ">
                                    <div class="product-description" style="padding: 20px;" >
                                        <?php echo $Product->details; ?>
                                    </div>
                                    <?php 
									if($Product->bndes == "1"){
									?>
                                    <a href="" target="_blank"><img src="<?php echo $ThemeUrl.'img/brinde.png'; ?>"  /></a>
                                    <?php 
									}
									?>
                                    <div class="clr"></div>
                                </div>
                                
                            </div>
                            
                            <div class="p-tab tab-product-downloads product-info"  style="display:none" >
                            	<div class="download-div text-left">
<?php
if($Product->blueprint) {
?>
                                
                                    <a href="<?php echo MAIN_URL.'downloads/blueprint/'.$Product->blueprint; ?>" target="_blank" class="<?php echo $attrs[1]['ref']; ?>">
                                       <img src="<?php echo $ThemeUrl.'img/download.png'; ?>" />
                                       Desenho t&eacute;cnico
                                    </a>
                                
<?php }
if($Product->guide) {
?>
                                
                                    <a href="<?php echo MAIN_URL.'downloads/guide/'.$Product->guide; ?>" target="_blank" class="<?php echo $attrs[1]['ref']; ?>">
                                       <img src="<?php echo $ThemeUrl.'img/download.png'; ?>" />
                                       Manual de instala&ccedil;&atilde;o
                                    </a>
                               
<?php
}
if($Product->dwg) {
?>
                                
                                    <a href="<?php echo MAIN_URL.'downloads/dwg/'.$Product->dwg; ?>" target="_blank" class="<?php echo $attrs[1]['ref']; ?>">
                                       <img src="<?php echo $ThemeUrl.'img/download.png'; ?>" />
                                       DWG
                                    </a>
                                
<?php
}
if($Product->flow_curve) {
?>
                                
                                    <a href="<?php echo MAIN_URL.'downloads/flow_curve/'.$Product->flow_curve; ?>" target="_blank" class="<?php echo $attrs[1]['ref']; ?>">
                                       <img src="<?php echo $ThemeUrl.'img/download.png'; ?>" />
                                       Curva de vaz&atilde;o
                                    </a>
                               
<?php
}
?>
							 </div>
<?php                       
if($Product->video || $Product->additional_video) {
if($hr === true) echo "<hr />";
?>
                                <div class="download-div text-left product-videos ">
                                
                                <div class="sub-menu-pages-border">
                                <span class="borders"></span>
                                </div>
                                <div class="clr"></div>
                                <h1 class="span6 linh" style="font-size:18px; letter-spacing: -1px; margin:10px 0px -10px 0px">V&iacute;deo de instala&ccedil;&atilde;o</h1>
                                    
                                    <?php if($Product->video) { ?>
                                    <iframe id="ifv" width="100%" height="315" src="//www.youtube.com/embed/<?php echo $Product->video; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                                    <?php } ?>

                                </div>
<?php } ?>

                            </div>


                        </div>
                    </div>
                    
                    
                    
                    
  <div class="clr"></div> 
  <div class="row-fluid " style="margin-top:30px;">
      <h1 class="span6 linh" style="font-size:18px; letter-spacing: -1px;">Caracter&iacute;sticas b&aacute;sicas</h1>
  </div>
  <div class="clr"></div>  
  <div class="row-fluid " >
  
      <div class="span12 detalhes-atributos-produtos" style="background:#ededed; padding:10px 0px 10px 0px">        
      <?php                  
      $i = 0;
      if($ProductAttributes)
      foreach($ProductAttributes as $Row) { ?>
      		<div class="span12 detalhes-atributos-produtos-lista">
                <div class="span3 bold"><?php echo $Row->attribute; ?></div>
                <div class="span6 ">
                    <?php
                if($Row->link == "1") {
                    echo '<a href="'.MAIN_URL.'downloads/images/'.$Row->file.'" target="_blank" class="attr-link">'.$Row->value.'</a>';
                } else {
                    echo $Row->value;
                } ?>
                </div>
            </div>
           
      <?php
      $i++;
      } ?>
      </div>                
  </div>  
  <div class="clr"></div>
  <?php 
  if($Product->description) {
  ?>
       
      <div class="row-fluid ">
          <h1 class="span6 linh" style="font-size:18px; letter-spacing: -1px; margin:20px 0px 10px 0px">Dimens&otilde;es, pesos nominais e n&uacute;mero de apoios</h1>
      </div>
      <div class="row-fluid">
          <div class="span12 product-main-title">
              <?php 
              if($Product->description) {
                                      echo "<br />
              <span class=\"code\">".$Product->description."</span><br />";
              }
              ?>
          </div>
      </div>
  <?php 
  }
  ?>                
                   
                   
                   
                </div>

            </div>
        </div>
<?php include $ThemePath."inc/share.php"; ?>
    </div>
