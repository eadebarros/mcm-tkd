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
    </div>
    
    <div style="float:right;">
    <?php
	$RepresentativeCidadeEstado = new RepresentativeCidadeEstado();
	$cidades_estados =  $RepresentativeCidadeEstado->getAll(null,"ORDER BY estado DESC");
	if($cidades_estados){
    ?>
    <select name="lista-por-cidade" class="lista-por-cidade">
    	<option value="">Listar por cidade</option>
	<?php foreach($cidades_estados as $cidades){ ?>
    	<option value="citi-<?php echo $cidades->id;?>"><?php echo  $cidades->estado." - ".$cidades->cidade;?></option>
	<?php } ?>
    </select>
    <?php
	}
    ?>
    </div>
    <div class="clr"></div>
    <div  style="padding:10px; border:1px solid #eee; margin-top:15px;">
    <table class="tabela-representantes" cellspacing="10" cellpadding="0">
      <tr class="title-representantes">
        <td align="center">NOME</td>
        <td align="center">CONTATO</td>
        <td align="center">TELEFONE</td>
        <td align="center">E-MAIL</td>
        <td align="center">&Aacute;REA DE ATUA&Ccedil;&Atilde;O</td>
      </tr>
    
    <?php
    $Representative = new Representative();
	$Representatives = $Representative->getAll();
	
	foreach($Representatives as $item){
		

		$cidadesEestado = $Representative->getCidadesEstados($item->id);
		
		$classBusca = '';
		$tableIns = '
		<table width="0" border="0" cellspacing="0" cellpadding="0" class="tabela-veja-area">';
		  
		  if($cidadesEestado){
			  foreach($cidadesEestado as $ufC){
			  $classBusca .= ' citi-'.$ufC->id;
		  	  $tableIns .= '
				<tr>
					<td width="180">'.$ufC->cidade.'</td>
					<td>'.$ufC->estado.'</td>
				</tr>';
			  }
		  }
		$tableIns .= '  
		</table>';
	?>
    
	  <tr class="textos-representantes <?php echo $classBusca?>">
		<td align="center"><?php echo $item->name; ?></td>
		<td align="center"><?php echo $item->contato; ?></td>
		<td align="center"><?php echo $item->telephone; ?></td>
		<td align="center"><?php echo $item->email; ?></td>
		<td align="center" >
          <div class="vermais-area" data-id-area="<?php echo $item->id; ?>">ver &aacute;rea <div class="btn-area"></div></div>
          <div class="vermais-info" data-id-area="<?php echo $item->id; ?>" style="display:none">
                <div class="vermais-area right" data-id-area="<?php echo $item->id; ?>" style="margin-top:10px;">Fechar &nbsp;<div class="btn-area-ativo"></div></div>  
                <div class="vermais-info-scroll" style="margin-top:10px;">
				<?php echo $tableIns;?>
              	</div>
          </div>
        </td>
	  </tr>
	<?php
	}
	
	?>
    </table>
    </div>
    <?php include $ThemePath."inc/share.php"; ?>
    <div class="clr"></div>
  </div>
<script type="text/javascript">
$idativo='';

$(function() {


$(".vermais-area").click(function () {
	


		$(".vermais-info[data-id-area='"+$(this).attr('data-id-area')+"']").slideToggle(600,"easeOutExpo");
		

});


$( ".lista-por-cidade" ).change(function() {
  $cla = $( this ).val();
  if($cla!=""){
	  $( '.textos-representantes' ).hide();
	  $( '.'+$cla ).show('slow'); 
  }else{
	  $( '.textos-representantes' ).show('slow'); 
  }
});


});


</script> 

