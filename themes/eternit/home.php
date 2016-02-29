

  <section>
    <div class="fullwidthbanner-container">
      <div class="fullwidthbanner">
      		<div class="container">
                <div class="links-slider">
                    <div class="titulo-links-slider">Produtos em destaque</div>
                    <ul>
                    
						<?php
                            $homeslide = new HomeSlide();
                            $homeslide = $homeslide->getAll(null);
                            foreach($homeslide as $Row) { ?>
                                  <li class="onstep"><?php echo $Row->title;?></li>                                      
                        <?php 
                            } 
                        ?>
                    </ul>
                    <div class="hover-links-slider step-links-slider"></div>
                </div>
               
                <div class="produtos-slider">
						<?php
							$i=0;
                            foreach($homeslide as $Row) { $i++;?>
                            <div class="produto-exibidos" data-step="<?php echo $i;?>" style=" <?php if($i=='1'){echo "top:80px;";} ?>">
                            <img src="images/homeslideshow/<?php echo $Row->image;?>" alt="<?php echo $Row->title;?>"  />
                            </div>
                                   
                        <?php 
                            } 
                        ?>

                    <div class="selo-slider"><img src="<?php echo $ThemeUrl; ?>img/produtos-slider/selo.png" alt="selo"  /></div>
                </div>
                 
                
			</div>
      </div>
    </div>
  </section>
  
  
  <div class="clr"></div>
  

  <section class="banner_bottom">
  	  <div class="container">
      
      
	  <?php
          $i=0;
          $homeslide = new HomeSlide();
          $homeslide = $homeslide->getAll(null);
          foreach($homeslide as $Row) { $i++;?>
          
          <div class="produto-exibidos-textos" data-step="<?php echo $i;?>">
          		<?php if($Row->icon){ ?>
          		<img src="images/homeslideshow/<?php echo $Row->icon;?>.png" style="position:absolute; margin-top:-3px; margin-left:-60px;" />
                <?php } ?>
               <strong style="font-size:18px; font-family:arial">></strong> <?php echo $Row->subtitle;?>
          </div>
      <?php 
          } 
      ?>
      
      </div>
  </section>
  
  
  <div class="container">
  
    <section class="latest_projects">
          <div class="projects_hdng">
            <h1 class="dark edtlarg">Categorias <span class="red edtlarg">de produtos</span></h1>
            <p>Com economia. Com qualidade. Com certeza.</p>
          </div>
    </section>
  
    <section class="row-fluid">
<?php

	$categorias = new ProductCategory();
	$categorias = $categorias->getAll(null);
	foreach($categorias as $Row) { ?>
	
		  <div class="span3 tri_sec">
		  <a href="produtos/<?php echo str_replace("cat-","",$Row->ref);  ?>">
		  <?php if($Row->image){?>
		  <img src="images/display/<?php echo $Row->image;?>" alt="<?php echo $Row->name;  ?>" class="icone-home-produtos" />
		  <?php }?>
			<h2 class="<?php echo $Row->colorbtn;?>-texto"><?php echo $Row->name;  ?></h2>
			
			<p><?php echo $Row->description;  ?></p>
			
			<div class="padding-custon-20">
				<p class="signup"><span class="btn btn-danger fonteItc-bold  <?php echo $Row->colorbtn;?>"><?php echo $Row->textobtn;?></span></p>
			</div>
			
			<span class="borders"></span>
			</a>  
		  </div>                  
					   
								
													
	<?php 
	} 

?>


    </section>
    <!--end row-fluid-->



<?php
$paghome = new Page();
$paghome = $paghome->getAll($paghome->Table.".destaquehome_status = 1", "ORDER BY last_update DESC LIMIT 1");

foreach($paghome as $Row) { ?>



<section class="latest_projects">
      <div class="projects_hdng">
        <h1 class="dark edtlarg"><?php echo doublecolor($Row->destaquehome_titulo);  ?></h1>
        <p><?php echo $Row->destaquehome_sub_titulo;  ?></p>
      </div>
</section>


   
          
<div class="post">

            <div class="post_image">
            <img src="images/destaquehome_imagem/<?php echo $Row->destaquehome_imagem;  ?>" alt="image" />
            </div>
            
            <div class="post_contant">
            
            
            
            <?php echo $Row->destaquehome_content;  ?>
            
              <a href="<?php echo $Row->ref;?>" class="btn btn-danger bold" style="font-size:20px; text-transform:capitalize; margin-top:20px;">Saiba Mais </a>
              <div class="clr"></div>
            </div>
            
            
            <div class="clr"></div>
</div>   
                            
                                                
<?php } ?>





      <div class="list_carousel">
        <ul id="foo2">
          <li><a href="contato/trabalhe-conosco">
            <div class="project">
            <div class="blokhomebooton">
                <h1 class="dark edtlarg homeblocktree">Trabalhe <span class="red edtlarg">conosco</span></h1>
                <div class=" mlzero tahoma" style="font-size:11px; color:#939393">Fa&ccedil;a parte da nossa equipe. Vista a camisa Precon Goi&aacute;s! </div>

            </div>
                <img src="<?php echo $ThemeUrl; ?>img/home-trabalhe-conosco.jpg" alt="image" />
            </div>
            </a></li>
          <li><a href="sobre-a-precon-goias/portas-abertas">
            <div class="project">
            <div class="blokhomebooton">
                <h1 class="dark edtlarg homeblocktree">Portas <span class="red edtlarg">abertas</span></h1>
                <div class=" mlzero tahoma" style="font-size:11px; color:#939393">Conhe&ccedil;a o processo produtivo e as instala&ccedil;&otilde;es.</div>

            </div>
                <img src="<?php echo $ThemeUrl; ?>img/home-portas-abertas.jpg" alt="image" />
            
            </div>
            </a></li>
          <li><a href="#.">
            <div class="project" style="border:none"> 
            <div class="blokhomebooton">
                <h1 class="dark edtlarg homeblocktree">Redes <span class="red edtlarg">sociais</span></h1>
                <div class=" mlzero tahoma" style="font-size:11px; color:#939393">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                <div class="clr"></div>
                <div style=" margin-top:31px">
                <div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/Eternitbrasil" data-width="322" data-height="270" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;color_scheme=light&amp;header=false&amp;height=270&amp;href=https%3A%2F%2Fwww.facebook.com%2FEternitbrasil&amp;locale=pt_BR&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=false&amp;width=370"><span style="vertical-align: bottom; width: 370px; height: 270px;"><iframe name="f1dda3faf8" width="370px" height="270px" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="http://www.facebook.com/plugins/like_box.php?app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2FLEdxGgtB9cN.js%3Fversion%3D40%23cb%3Df20a948e6c%26domain%3Dwww.eternit.com.br%26origin%3Dhttp%253A%252F%252Fwww.eternit.com.br%252Ff342a318e4%26relation%3Dparent.parent&amp;color_scheme=light&amp;header=false&amp;height=270&amp;href=https%3A%2F%2Fwww.facebook.com%2FEternitbrasil&amp;locale=pt_BR&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=false&amp;width=322" class="" style="border: none; visibility: visible; width: 322px; height: 270px;"></iframe></span></div>
				</div>
            </div>
            </div>
            </a>
          </li>

        </ul>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>


    <div class="clr"></div>
  </div>