<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    include $ThemePath.'inc/vendor.frm.php';
    ?><script>alert('Mensagem enviada com sucesso. Em breve entraremos em contato');</script>
<?php } ?>
<?php
$fm ='<br />
<form action="" method="post" class="validate-form">
<select name="ser" class="validate-required" style="display:none" >
<option value="cliente" selected="selected">Cliente</option>
<option value="fornecedor">Fornecedor</option>
</select>
  <div style="clear:both;"></div>
  <div style="float:left; margin-right:50px; padding-right:50px;">
	  <input name="cnpj" type="text" placeholder="CNPJ" class="c-input2  validate-required" /> *<br />
	  <input name="razao_social" type="text" placeholder="Raz&atilde;o social" class="c-input2  validate-required" /> *<br />
	  <input name="inscricao_estadual" type="text" placeholder="Inscri&ccedil;&atilde;o estadual" class="c-input2" /><br />
	  <input name="inscricao_municipal" type="text" placeholder="Inscri&ccedil;&atilde;o municipal" class="c-input2" /><br />
	  <input name="endereco" type="text" placeholder="Endere&ccedil;o" class="c-input2" /><input name="numero" type="text" placeholder="N&ordm;" class="c-input2" style="width:40px;" /><br />
	  <input name="complemento" type="text" placeholder="Complemento" class="c-input2" /><br />
	  <input name="cep" type="text" class="c-input2" placeholder="CEP" /><br />
	  <input name="bairro" type="text" class="c-input2" placeholder="Bairro" /><br />
	  <select name="uf" class="validate-required">
		  <option value="">Selecione o Estado</option> 
		  <option value="ac">Acre</option> 
		  <option value="al">Alagoas</option> 
		  <option value="am">Amazonas</option> 
		  <option value="ap">Amap&aacute;</option> 
		  <option value="ba">Bahia</option> 
		  <option value="ce">Cear&aacute;</option> 
		  <option value="df">Distrito Federal</option> 
		  <option value="es">Espírito Santo</option> 
		  <option value="go">Goi&aacute;s</option> 
		  <option value="ma">Maranh&atilde;o</option> 
		  <option value="mt">Mato Grosso</option> 
		  <option value="ms">Mato Grosso do Sul</option> 
		  <option value="mg">Minas Gerais</option> 
		  <option value="pa">Par&aacute;</option> 
		  <option value="pb">Para&iacute;ba</option> 
		  <option value="pr">Paran&aacute;</option> 
		  <option value="pe">Pernambuco</option> 
		  <option value="pi">Piau&iacute;</option> 
		  <option value="rj">Rio de Janeiro</option> 
		  <option value="rn">Rio Grande do Norte</option> 
		  <option value="ro">Rond&ocirc;nia</option> 
		  <option value="rs">Rio Grande do Sul</option> 
		  <option value="rr">Roraima</option> 
		  <option value="sc">Santa Catarina</option> 
		  <option value="se">Sergipe</option> 
		  <option value="sp">S&atilde;o Paulo</option> 
		  <option value="to">Tocantins</option>
	  </select> *<br />
  </div>
  <div style="float:left;">
	  <input name="ddd" type="text" placeholder="DDD" class="c-input2 validate-required"  style="width:40px;margin-right: -3px !important;"/> * <input name="telefone" type="text" placeholder="Telefone" class="c-input2  validate-required" style="width:160px;" /> *<br />
	  <input name="clientes" type="text" class="c-input2" placeholder="Principais clientes" /><br />
	  <input name="contato_comercial" type="text" class="c-input2" placeholder="Nome do contato comercial" /><br />
	  <input name="email" type="text" class="c-input2 validate-email" placeholder="E-mail" /> *<br />
	  <input name="tel_contato_comercial" class="c-input2 validate-required" type="text" placeholder="Telefone do contato comercial" /> *<br />
	  <input name="site" class="c-input2" type="text" placeholder="Site da empresa" /><br />
	  <input name="cidade" type="text" class="c-input2" placeholder="Cidade" /><br />
	  <select name="regiao" class="validate-required">
		  <option value="">Regi&atilde;o de atua&ccedil;&atilde;o</option>
		  <option value="Nacional">Nacional</option>
		  <option value="Centro-Oeste">Centro-Oeste</option>
		  <option value="Nordeste">Nordeste</option>
		  <option value="Norte">Norte</option>
		  <option value="Sudeste">Sudeste</option>
		  <option value="Sul">Sul</option>
	  </select> *<br />
	  <input type="text" placeholder="O que voc&ecirc; quer revender?" name="area" id="form-area" class="validate-required c-input2" />*<br />
	  <input type="file" name="arquivo" style="width: 200px;" id="custom-file-input" />
	  <br /><br />
	  <input type="submit" class="btn btn-danger " value="Enviar" />
  </div>
</form>';
?>



<div class="sub_page_top" >
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
	<?php echo addForm($Page->content,$fm,'[[[form]]]'); ?>
    </div>
    <?php include $ThemePath."inc/share.php"; ?>
    <div class="clr"></div>
  </div>









