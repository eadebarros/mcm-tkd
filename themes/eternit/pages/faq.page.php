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

      <div class="the-content">
      <?php echo $Page->content; ?>
      <div class="clearfix"></div>
      

      <div class="faq-button faq-button-m <?php if($_GET['faq'] == "faq-coberturas" || $_GET['faq'] == ""){echo " active";} ?>" id="faq-coberturas" style="float:left; margin-right:10px;">
          <img src="<?php echo $ThemeUrl; ?>img/faq/faq-coberturas<?php if($_GET['faq'] == "faq-coberturas" || $_GET['faq'] == ""){echo "-on";} ?>.png" alt="coberturas">
      </div>
      
      <div class="faq-button faq-button-m <?php if($_GET['faq'] == "faq-loucas-sanitarias"){echo " active";} ?>" id="faq-loucas-sanitarias"  style="float:left; margin-right:10px;">
          <img src="<?php echo $ThemeUrl; ?>img/faq/faq-loucas-sanitarias<?php if($_GET['faq'] == "faq-loucas-sanitarias"){echo "-on";} ?>.png" alt="loucas">
      </div>
      
      
      <div class="faq-button faq-button-m <?php if($_GET['faq'] == "faq-acessorios"){echo " active";} ?>" id="faq-acessorios"  style="float:left">
          <img src="<?php echo $ThemeUrl; ?>img/faq/faq-acessorios<?php if($_GET['faq'] == "faq-acessorios"){echo "-on";} ?>.png" alt="acessorios">
      </div>
      
		 <div class="clr"></div>
      

      <div class="clearfix" style="margin-bottom: 30px;"></div>
      
      <?php
      $Pages = $Page->getAll($Page->Table.".status = '1' AND {$Page->Table}.parent = '$Id'");
      foreach($Pages as $Row) { ?>
      <div class="faq-div <?php echo $Row->ref; ?>" <?php if(($_GET['faq'] != "" && $_GET['faq'] != $Row->ref) || ($Row->ref != "faq-coberturas" && $_GET['faq'] == "")) echo ' style="display:none;"'; ?>>
          <?php echo $Row->content; ?>
      </div>
      <?php } ?>
      </div>


    <?php include $ThemePath."inc/share.php"; ?>
    <div class="clr"></div>
  </div>

