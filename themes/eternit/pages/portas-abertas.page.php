<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    include $ThemePath.'inc/portas-abertas.frm.php';
    ?><script>alert('Mensagem enviada com sucesso. Em breve entraremos em contato');</script>
<?php } ?>
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
        foreach ($menus[$Bread[0]['ref']] as $item => $key){
		?>
            <a href="<?php echo $item; ?>"><li class="<?php if($Bread[1]['label']==$key){echo ' ativo';} ?>" ><?php echo $key; ?></li></a>
        <?php
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
	<?php 
$fm = '
                    <div class="form-hide">
                        <form action="sobre-a-precon-goias/portas-abertas?enviado" method="post">
                            <input type="text" name="nome" placeholder="Nome" class="c-input validate-required" style="margin: 0 5px 10px 0 !important;" /><br />
                            <select name="sexo">
                                <option value="" disabled selected>Sexo</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                            </select>
                            <br />
                            <input type="text" placeholder="Nascimento" name="nascimento" class="c-input" style="margin: 0 5px 10px 0 !important;" /><br />
                            <input type="text" placeholder="Email" name="email" class="c-input validate-required" style="margin: 0 5px 10px 0 !important;" /><br />
                            <input type="text" placeholder="Telefone" name="telefone" class="c-input" style="margin: 0 5px 10px 0 !important;" /><br />
                            <select name="fabrica">
                                <option value="" disabled selected>F&aacute;brica de interesse</option>
                                <option value="fabrica-colombo">F&aacute;brica Colombo</option>
                                <option value="fabrica-goiania">F&aacute;brica Goi&acirc;nia</option>
                                <option value="fabrica-rio-de-janeiro">F&aacute;brica Rio de Janeiro</option>
                                <option value="fabrica-simoes-filho">F&aacute;brica Sim&otilde;es Filho</option>
                                <option value="precon-goias-industrial-ltda">Precon Goi&aacute;s Industrial Ltda.</option>
                                <option value="sama-mineracoes-associadas">Sama Minera&ccedil;&otilde;es Associadas S.A.</option>
                            </select><br />
                            <textarea name="mensagem" placeholder="Mensagem" class="c-textarea" style="width:300px;height:75px;"></textarea><br />
                            <input type="submit" class="btn btn-danger fonteItc-bold" value="Enviar" />
                        </form>
                    </div>
';
	
	echo addForm($Page->content,$fm,'[[[form]]]');

	
	?>
                    <div class="clearfix"></div>

    </div>
    <?php include $ThemePath."inc/share.php"; ?>
    <div class="clr"></div>
  </div>




