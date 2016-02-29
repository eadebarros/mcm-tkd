<div class="sub_page_top">
  <div class="container">
    <section class="row-fluid">
<?php if($Page->cover != "") { ?>
                                            <img src="images/cover/<?php echo $Page->cover; ?>" />
<?php } ?>
      <div class="clr"></div>
    </section>
    <!--end row-fluid-->
    <div class="clr"></div>
  </div>
  <!--end container-->
  
  <div class="clr"></div>
</div>
<div class="sub-menu-pages">
  <div class="container">
    <section class="row-fluid">
    <div class="nav-collapse">
	<ul class="nav sub-menu-pages">
		<?php
		if(count($menus[$Bread[0]['ref']])>=2){
			foreach ($menus[$Bread[0]['ref']] as $item => $key){
			?>
				<a href="<?php echo  $item?>"><li class="<?php if($Bread[1]['label']==$key){echo ' ativo';} ?>" ><?php echo $key; ?></li></a>
			<?php
			}
		}
        ?>

    </ul>
	</div>

      <div class="clr"></div>
    </section>
    <!--end row-fluid-->
    <div class="clr"></div>
  </div>
  <!--end container-->
  
  <div class="clr"></div>
</div>



  <div class="container">
  	<div class="row-fluid show-grid sub-menu-pages-border">
        <h1 class="span6 linh"><?php echo $Page->title; ?></h1>
        <?php include $ThemePath.'inc/breadcrumbs.php'; ?>
        <span class="borders"></span>
    </div>
    <div class="pages">
	<?php echo $Page->content; ?>
    
    <div class="clr"></div>
    <br />
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
				<p class="signup"><span class="btn btn-danger fonteItc-bold <?php echo $Row->colorbtn;?>"><?php echo $Row->textobtn;?></span></p>
			</div>
			
			<span class="borders"></span>
			</a>  
		  </div>                  
					   
								
													
	<?php 
	} 

?>


    </section>
    </div>
    <?php include $ThemePath."inc/share.php"; ?>
    <div class="clr"></div>
  </div>




