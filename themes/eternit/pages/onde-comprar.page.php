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
    
    <section class="row-fluid">
    	<div class="clr"></div>
        <div class="span12" style="margin-top:10px;">
            <div class="span3">
                <select name="">
                 <option value="">Selecione o tipo de produto</option>
                 <option value="loucas">Lou&ccedil;as</option>
                 <option value="telhasecaixadagua">Telhas e Caixa d'&aacute;gua</option>                  
                </select>
            </div>
            <div class="span2">
            
                <input name="revenda-nome" type="text" class="revenda-nome" placeholder="Procure revendas pelo nome" style="font-size:11px; width:141px;" />
            </div>
            <div class="span2">
                <input name="" type="text" class="revenda-cep" placeholder="Localize pelo CEP ou nome da cidade" style="font-size:11px; width:141px;" />
            </div>
            
        </div>
        <div class="clr"></div>

        <div class="span12" style="margin-top:10px;">
            <div style="width:394px; float:left" >
                <img src="<?php echo $ThemeUrl; ?>img/mapa.jpg">
            </div>
            <div style="float:left; margin-left:30px;">
                 <h1 class=" linh" style="font-size:24px;">Confira detalhes das revendas</h1>
                 <div class="info-onde-comprar-geral" style="display:none">
                 
                 	<iframe width="470" height="290" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="" class="mapaiframe"></iframe>
					<div class="nome"></div>
                    <div class="endereco"></div>
                    <div class="endereco-cep"></div>
                    <div class="telefone"></div>
                    <div class="clr"></div>
                 </div>
                 <div class="lista-onde-comprar">

                 <?php $Compra = new Compra();  $Compras =  $Compra->getAll();?>
					 <?php if($Compras){ ?>
                         <ul class="lista-ul">
                             <?php foreach($Compras as $info){ ?>
                             
                                <li class="info-onde-comprar" data-nome="<?=$info->nome?>"  data-endereco="<?=$info->endereco?>" data-cep="<?=$info->cep?>" data-municipio="<?=$info->municipio?>" data-uf="<?=$info->uf?>" data-telefone="<?=$info->telefone?>"  ><span class="nome"><?=$info->nome?></span> | <span class="muni"><?=$info->municipio?></span> | <span class="ufs"><?=$info->uf?></span> <span class="cep" style="display:"><?=$info->cep?></span></li>
                             
                             <?php } ?>
                         </ul>
                     <?php } ?>
                 </div>
            </div>
            
        </div>
        
    </section>
    <?php include $ThemePath."inc/share.php"; ?>
    <div class="clr"></div>
  </div>
  
  
  <script>

(function ($) {
  // custom css expression for a case-insensitive contains()
  jQuery.expr[':'].Contains = function(a,i,m){
      return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
  };



    $('.revenda-nome')
      .change( function () {
        var filter = $(this).val();
        if(filter) {
          $(".lista-ul").find("li.info-onde-comprar span.nome:not(:Contains(" + filter + "))").parent().slideUp();
          $(".lista-ul").find("li.info-onde-comprar span.nome:Contains(" + filter + ")").parent().slideDown();
        } else {
			 $(".lista-ul").find("li").slideDown();
        }
        return false;
      })
    .keyup( function () {
        $(this).change();
    });
	
	$('.revenda-cep')
      .change( function () {
        var filter = $(this).val();

        if(filter) {

         $(".lista-ul").find("li.info-onde-comprar span.cep:not(:Contains(" + filter + "))").parent().slideUp();
         $(".lista-ul").find("li.info-onde-comprar span.cep:Contains(" + filter + ")").parent().slideDown();

        }
		else{
			 $(".lista-ul").find("li").slideDown();
		}
        return false;
      })
    .keyup( function () {
        $(this).change();
    });
	$('.info-onde-comprar').click( function () {
		
        var nome = $(this).attr('data-nome');
		var endereco = $(this).attr('data-endereco');
		var cep = $(this).attr('data-cep');
		var municipio = $(this).attr('data-municipio');
		var uf = $(this).attr('data-uf');
		var telefone = $(this).attr('data-telefone');

		var urlmap="https://www.google.com.br/maps?f=q&source=s_q&hl=pt-BR&amp;geocode=&q="+endereco+","+municipio+","+uf+"&output=embed"
		console.log(urlmap);
		$('.mapaiframe').attr('src',urlmap);
		
		$('.info-onde-comprar-geral .nome').html(nome);
		$('.info-onde-comprar-geral .endereco').html(endereco);
		$('.info-onde-comprar-geral .endereco-cep').html(cep+" - "+municipio+" - "+uf);
		$('.info-onde-comprar-geral .telefone').html(telefone);
		
		
		
		$('.info-onde-comprar-geral').slideDown();
		$('.lista-onde-comprar').slideUp();
		
		
      });



}(jQuery));

  </script>




