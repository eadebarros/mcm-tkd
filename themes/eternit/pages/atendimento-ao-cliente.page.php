<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    include $ThemePath.'inc/atendimento-ao-cliente.frm.php';
    ?><script>alert('Mensagem enviada com sucesso. Em breve entraremos em contato');</script>
<?php } ?>

<?php
$fm ='
<form action="" method="post" class="validate-form atendimento-cliente-form">

<div class="span3">
    <input type="hidden" name="form" value="produto" />
    <input type="hidden" name="type" class="type-form" value="duvida-tecnica" />
    <input name="name" class="c-input2 f-name" type="text" placeholder="Nome" /><span class="f-name-required f-required"> *</span><br />
    <input name="cpf" class="c-input2 f-cpf" type="text" placeholder="CPF" /><span class="f-cpf-required f-required"> *</span><br />
    <input name="address" class="c-input2 f-address" type="text" placeholder="Endere&ccedil;o" /><span class="f-address-required f-required"> *</span>
    <input name="number" class="c-input2 f-number" type="text" placeholder="N&ordm;" style="width:40px;" /><br />
    <input name="complement" class="c-input2 f-complement" type="text" placeholder="Complemento" /><br />
    <input name="district" class="c-input2 f-district" type="text" placeholder="Bairro" /><br />
</div>
<div class="span2">
    <input name="cep" class="c-input2 f-cep" type="text" placeholder="CEP" /><span class="f-cep-required f-required"> *</span><br />
    <input name="city" class="c-input2 f-city" type="text" placeholder="Cidade" /><span class="f-city-required f-required"> *</span><br />
    <select name="state" class="f-state">
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
    </select><span class="f-state-required f-required"> *</span><br />
    <input name="telephone" class="c-input2 f-telephone" placeholder="Telefone" type="text" /><span class="f-telephone-required f-required"> *</span><br />
    <input name="email" class="c-input2 f-email" placeholder="E-mail" type="text" /><span class="f-email-required f-required"> *</span><br />
</div>
<div class="span3">
    <input name="shop" class="c-input2 f-shop" placeholder="Loja que adquiriu o produto" type="text" /><br />
    <input name="purchase_date" class="c-input2 f-purchase_date" placeholder="Data da compra" type="text" /><br />
    <input type="text" name="product"  class="c-input2 f-product" placeholder="Produto" /><span class="f-product-required f-required"> *</span><br />
</div>
<div class="span8">
    <textarea name="message" class="c-textarea f-message" placeholder="Mensagem" style="vertical-align: top; width:98%; height:80px;"></textarea><br />
    <input type="submit" class="btn btn-danger " value="Enviar" style="float:right">
</div>
</form>
';
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






