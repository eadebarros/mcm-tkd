

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
    <div class="clr"></div>
  </div>




<div class="container">
  <section class="row-fluid ">
    <!--calendario-->
    <div class="span3 marr_lft_none" style="min-width: 212px!important; margin-bottom:20px;">
      
      <div class="side_bar_nav">
<?
        $Inscreva = new Inscreva();
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $Inscreva->loadForm();
            $Inscreva->insert();
        }
        
        $Event = new Event();
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            $M = $_GET['m'];
			$Y = $_GET['y'];
        }
        if(empty($M) || $M<=0 || $M>=13 || !is_numeric($M)){
            $M = date('m');	
        }
        if(empty($Y) || $Y<=2014 || !is_numeric($Y)){
            $Y = date('Y');	
        }
        $M = str_pad($M, 2, "0", STR_PAD_LEFT);

            $Events = $Event->getAll("status = '1'", "ORDER BY start_date ASC");
			
			$MFormulario = date('m');
			//if($MFormulario<10){$MFormulario = "0".$MFormulario;}
			
			$Events_list = $Event->getAll("status = '1' AND start_date LIKE '2014-".$MFormulario."-%'", "ORDER BY start_date ASC");
            if($Events_list) {
                foreach ($Events_list as $Row) {
					$selects .= '<option value="'.$Row->id.'">'.$Row->title.'</option>';
                }
            }	

 
?>
      
          <script>
		  var dates = [
<?php
            if($Events) {
                foreach ($Events as $Row) {
					$ano = explode(" ",$Row->start_date);
					$ano = str_replace('-',',',$ano[0]);
                    echo '['.$ano.'],';
                }
            }	
?>			
		  ];

		  
            $(function() {
              $("#datatreinamento").datepicker({
                  dateFormat: 'dd/mm/yy',
                  dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                  dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                  dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                  monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                  monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                  nextText: 'Próximo',
                  prevText: 'Anterior',
				  beforeShowDay: function (date){
						var year = date.getFullYear(), month = date.getMonth(), day = date.getDate();
						for (var i=0; i < dates.length; ++i)
							if (year == dates[i][0] && month == dates[i][1] - 1 &&  day == dates[i][2])
							return [false, 'ui-state-active'];
				
						return [false];
					},
				  onChangeMonthYear:function(novoano, novomes, objeto){
					  
						$('.lista_evento').hide( 400 );
						$('.data-selectDate-0'+novomes+'-'+novoano).slideToggle(800,"easeOutExpo");
						
				  }
              });
			  
          
			  
            });
          
          </script>
          <div id="datatreinamento"></div>
          <a href="javascript:void(0)"><img src="<?php echo $ThemeUrl; ?>img/inscrevase.jpg" alt="inscreva-se"  class="btn-inscrevase btn-formulario"></a>
          <div class="clr"></div>
      </div>
     
      
      <div class="clr"></div>
    </div>
    <!--calendario-->
    
    
    <div class="span9 float_right telaevento">
      <div class="blog_post">
      
      
      
<div class="lista_evento formulario-treinamento"  >


    <div class="span12" style="padding:20px;">
    
    <div style="padding-bottom:30px;" >
        <div class="span9">
            <h1 class="linh">Formulario de Inscrição</h1>
        </div>
       
        <div class="span3">
            <div style="float:right; margin-top:-20px;"><a href="javascript:void(0)" class="btn btn-danger btn-formulario" data-id="<?php echo $Row->id; ?>">Fechar </a></div>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
    
                        <form action="treinamentos" class="validate-form" method="post">
                            
                            <div style="width:40%;float:left;">
                            	Curso<br />
                                <select name="event_id">
                                <option value="">Selecione</option>
                                <?php echo $selects;?>
                                </select>
                                
                                <br />
                                Nome<br />
                                <?php $Inscreva->input("nome"); ?><br />
                                Endere&ccedil;o<br />
                                <?php $Inscreva->input("endereco"); ?><br />
                                Telefone<br />
                                <?php $Inscreva->input("telefone"); ?><br />
                                Email<br />
                                <?php $Inscreva->input("email"); ?><br />
                                Profiss&atilde;o<br />
                                <?php $Inscreva->input("profissao"); ?><br />
                                Empresa<br />
                                <?php $Inscreva->input("empresa"); ?><br />
                                CNPJ<br />
                                <?php $Inscreva->input("cnpj"); ?><br />
                            </div>
                            <div style="width:60%;float:left;">
                                Como ficou sabendo da exist&ecirc;ncia do treinamento?<br />
                                <?php $Inscreva->input("como_ficou_sabendo"); ?><br />
                                Regi&atilde;o de interesse para presta&ccedil;&atilde;o de servi&ccedil;os / m&atilde;o de obra<br />
                                <?php $Inscreva->input("regiao"); ?><br />
                                Servi&ccedil;os prestados nas duas &uacute;ltimas obras e respectivos locais<br />
                                <?php $Inscreva->input("ultimas_obras"); ?><br />
                                Qual &eacute; o seu interesse no treinamento de <?php echo $Row->title; ?>?<br />
                                <?php $Inscreva->input("qual_interesse"); ?><br />
                                Precisar&aacute; de vaga para autom&oacute;vel ou motocicleta?<br />
                                <label style="display: inline-block;">
                                    <?php $Inscreva->input("vaga_automovel", array("value" => "1")); ?>
                                    Sim
                                </label>
                                <label style="display: inline-block;margin-left:20px;">
                                    <?php $Inscreva->input("vaga_automovel", array("value" => "0")); ?>
                                    N&atilde;o
                                </label><br />
                                <input type="submit" class="btn btn-danger" value="Enviar" style="margin-top:12px;" />
                            </div>
                        </form><br />
   	</div>
	<div class="clr"></div><br />
</div>
      
      
      
      
      
      
      
      
      
      
      
		<?php
            if($Events) {
                foreach ($Events as $Row) {
                    include $ThemePath."event.php";
                }
            }
        ?>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
    
    <div class="clr"></div>
  </section>
  <!--end row-fluid-->
  
  <div class="clr"></div>
</div>



  <div class="container">
    <?php include $ThemePath."inc/share.php"; ?>
    <div class="clr"></div>
  </div>











<?php if($_SERVER['REQUEST_METHOD'] == "POST") { ?>
                            <script type="text/javascript">
                                alert("Mensagem enviada.\n\nA Eternit agradece o contato.\nEm breve, entraremos em contato para confirmar sua participação no treinamento.\nObrigado.");
                            </script>
<?php } ?>

<script type="text/javascript">
	$('.conteudo-treinamento, .lista_evento').hide();
	$('.data-selectDate-<?php echo $M."-".$Y?>').show();
	$(function() {
		
	$(".btn-saibamais-treinamento").click(function () {
	   
	   $(this).parent().parent().parent().next().next('.conteudo-treinamento').slideToggle(800,"easeOutExpo");
		
	});

	$(".btn-saibamais-treinamento").toggle(function (){
		$(this).text("Recolher").stop();
	}, function(){
		$(this).text("Saiba Mais").stop();
	});



	$(".btn-formulario").toggle(function (){
		$('.formulario-treinamento').slideToggle(800,"easeOutExpo");
	}, function(){
		$('.formulario-treinamento').slideToggle(800,"easeOutExpo");
	});



});


</script> 

