<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include $ThemePath.'header.php'; ?>

<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
  <header class="header">
    <div class="top_row">
      <div class="container">
        <section class="row-fluid">
          <div class="span12">

            <div class="span2 top-search">
                    <div class="search">
                      <input type="text">
                      <input type="submit" value="">
                      <div class="clr"></div>
                    </div>
            </div>
            <ul class="top_social">
              <li><a href="#." class="fb"><i class="icon-facebook"></i></a></li>
              <li><a href="#." class="yt"><i class="icon-youtube"></i></a></li>
               <li><a href="#." class="eternit-link-topo"><img src="<?php echo $ThemeUrl; ?>img/logo-eternit.png" class="logo-eternit-top" /></a></li>
            </ul>
            <p class="top_number">
            <a href="imprensa">Imprensa</a>
            &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">|</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="faq">FAQ</a>
            &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">|</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="certificacoes">Certificações</a>
            </p>
            <div class="clr"></div>
          </div>
          <!--end span12-->
          
          <div class="clr"></div>
        </section>
        <!--end row-fluid-->
        
        <div class="clr"></div>
      </div>
      <!--end container-->
      
      <div class="clr"></div>
    </div>
    <!--end top_row-->
    
    <nav>
      <div class="navigation_bg">
        <div class="container">
          <div class="row-fluid">
            <div class="span3"><a href="index.php" class="logo"><img src="<?php echo $ThemeUrl; ?>img/logo.png" alt="image" /></a></div>
            <div class="span9"> 
              
              <!-- Navbar
================================================== -->
              <div class="navbar">
                <div class="navbar-inner">
                  <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class= 			 					"icon-bar"></span> </button>
                    <div class="nav-collapse collapse">
                      <ul class="nav">
                        <li class="dropdown <?php if($$attrs[0]['ref'] == "home" || $attrs[0]['ref']=="")echo ' active '; ?>"> <a href="index.php" class="" data-toggle="">Home</a>
                        </li>                                               
                        <li class="dropdown <?php if($attrs[0]['ref'] == "sobre-a-precon-goias" )echo ' active '; ?>"> <a href="sobre-a-precon-goias/a-empresa" class="dropdown-toggle" data-toggle="dropdown">Sobre a Precon Goiás</a>
                          <ul class="dropdown-menu">
                            <li><a href="sobre-a-precon-goias/a-empresa">A empresa</a></li>
                            <li><a href="sobre-a-precon-goias/grupo-eternit">Grupo Eternit</a></li>
                            <li><a href="sobre-a-precon-goias/missao-visao-e-valores">Missão, visão e valores</a></li>
                            <li><a href="sobre-a-precon-goias/unidades">Unidade</a></li>
                          	<li><a href="sobre-a-precon-goias/portas-abertas">Portas abertas</a></li>
                            <li><a href="sobre-a-precon-goias/peg">PEG</a></li>
                          </ul>
                        </li>
                        <li class="dropdown <?php if($attrs[0]['ref'] == "produtos" )echo ' active '; ?>"> <a href="produtos" class="dropdown-toggle" data-toggle="dropdown">Produtos</a>
                          <ul class="dropdown-menu">
                            <li><a href="produtos/coberturas">Coberturas</a></li>
                            <li><a href="produtos/placascimenticia">Placas cimentícia</a></li>
                            <li><a href="produtos/loucas-sanitarias">Louças sanitárias</a></li>
                            <li><a href="produtos/acessorios">Acessórios</a></li>
                          </ul>
                        </li>
                        <li class="dropdown <?php if($attrs[0]['ref'] == "onde-comprar" )echo ' active '; ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Onde comprar</a>
                          <ul class="dropdown-menu">
                            <li><a href="onde-comprar/onde-comprar">Onde comprar</a></li>
                            <li><a href="onde-comprar/representantes">Representantes</a></li>
                            <li><a href="onde-comprar/assistencia-tecnica">Assistência técnica</a></li>
                          </ul>
                        </li>
                        <li class="dropdown <?php if($attrs[0]['ref'] == "treinamentos" )echo ' active '; ?>"> 
                        <a href="treinamentos" >Treinamentos</a>
                        </li>
                        <li class="dropdown <?php if($attrs[0]['ref'] == "downloads" )echo ' active '; ?>"> <a href="downloads/" >Downloads</a>
                        </li>
                        <li class="dropdown <?php if($attrs[0]['ref'] == "contato" )echo ' active '; ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contato</a>
                          <ul class="dropdown-menu">
                            <li><a href="contato/atendimento-ao-cliente">Atendimento ao cliente</a></li>
                            <li><a href="contato/seja-nosso-cliente">Seja nosso cliente</a></li>
                            <li><a href="contato/seja-nosso-fornecedor">Seja nosso fornecedor</a></li>
                            <li><a href="contato/trabalhe-conosco">Trabalhe conosco</a></li>
                          </ul>
                        </li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clr"></div>
          </div>
          <!--end row-fluid-->
          
          <div class="clr"></div>
        </div>
        <!--end container-->
        
        <div class="clr"></div>
      </div>
    </nav>
    <!--end navigation_bg-->
    
    <div class="clr"></div>
  </header>
  <!--end header-->

  

  
  <!--end banner_bottom-->
<?php include $ThemePath.$View; ?>





  
  <footer class="footer" >

            <div class="container" style="margin-top:-14px; ">
                <div style="display: none;" class="menu-footer-acesso-rapido row-fluid text-center">
                <img src="<?php echo $ThemeUrl; ?>img/fechar.png"  class="acesso-rapido-fechar"  />
                 <div class="clr"></div>
                    <div class="row-fluid">
                        <div class="span12 text-center">
                            <p class="qa-title" style="margin-top: 10px; text-align:center">Acesso r&aacute;pido Eternit</p>
                            <input type="text" class="search" />
                        </div>
                    </div>
                    <div class="row-fluid">
                   		<div class="span12" style="margin:0px; margin-top:10px;">
                            <div class="span4">
                                <p class="qa-title">Sobre a Precon Goiás</p>
                                <div class="submenu-footer">
                                    <a href="">A empresa</a><br />
                                    <a href="">Grupo Eternit</a><br />
                                    <a href="">Missão, visão e valores</a><br />
                                    <a href="">Unidade</a><br />
                                    <a href="">Portas abertas</a><br />
                                    <a href="">PEG</a>
                                </div>
                            </div>
                            
                            <div class="span2">
                                <p class="qa-title">Produtos</p>
                                <div class="submenu-footer">
                                    <a href="">Coberturas</a><br />
                                    <a href="">Louças sanitárias</a><br />
                                    <a href="">Placas cimentícia</a><br />
                                    <a href="">Acessórios</a>
                                </div>
                            </div>
                            
                            <div class="span3">
                                <p class="qa-title">Onde comprar</p>
                                <div class="submenu-footer">
                                    <a href="">Onde comprar</a><br />
                                    <a href="">Assistências técnicas</a>
                                </div>
                            </div>
                            
                            <div class="span3">
                                <p class="qa-title">Treinamentos </p>
                                <div class="submenu-footer">
                                    <a href="">Treinamentos</a>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>
						<div class="span12" style="margin:0px; margin-top:10px;">
                            <div class="span4">
                                <p class="qa-title">Downloads </p>
                                <div class="submenu-footer">
                                    <a href="">Downloads</a>
                                </div>
                            </div>
                            
                            <div class="span2">
                                <p class="qa-title">Contato </p>
                                <div class="submenu-footer">
                                    <a href="">Atendimento ao cliente</a><br />
                                    <a href="">Seja nosso cliente </a><br />
                                    <a href="">Seja nosso fornecedor</a><br />
                                    <a href="">Trabalhe conosco</a>
                                </div>
                            </div>
                            
                            <div class="span3">
                                <p class="qa-title">Outros </p>
                                <div class="submenu-footer">
                                    <a href="">Imprensa</a><br />
                                    <a href="">FAQ</a><br />
                                    <a href="">Certificações</a>
                                </div>
                            </div>
                            
                            <div class="span3">
                                <p class="qa-title">Redes sociais </p>
                                <div class="submenu-footer">
                                    <a href="">f</a><br />
                                    <a href="">t</a>
                                </div>
                            </div>
                        </div>
                        
                                               
                    </div>
                </div>
                
                
                
                <div class="row-fluid menu-footer-inicial">
                    <div class="span10 offset1 text-center">
                    <img src="<?php echo $ThemeUrl; ?>img/acesso-rapido.png" class="acesso-rapido"  />
                            <div class="footer-menu">
                                <a href="">Home</a> | 
                                <a href="sobre-a-precon-goias/a-empresa">Sobre a Precon Goi&aacute;s</a> | 
                                <a href="produtos">Produtos</a> | 
                                <a href="onde-comprar">Onde Comprar</a> | 
                                <a href="treinamentos">Treinamento</a> | 
                                <a href="downloads">Downloads</a> | 
                                <a href="contato/atendimento-ao-cliente">Contato</a>
                            </div>
                        <img src="<?php echo $ThemeUrl; ?>img/logo.png" style="max-width:140px; margin-bottom:30px;"  />
                        <div class="clr"></div>
                    </div>
                </div>
				<div class="clr"></div>


            </div>
        
        
  </footer>
</div>
<!--End Slide 3--> 


<!--Revolution slider end here--> 
<script src="<?php echo $ThemeUrl; ?>js/jquery.easing.1.3.min.js"></script> 


<script src="<?php echo $ThemeUrl; ?>js/js.js" type="text/javascript"></script> 
<script src="<?php echo $ThemeUrl; ?>js/jquery.anythingslider.js"></script> 
<script src="<?php echo $ThemeUrl; ?>js/bootstrap-tab.js"></script> 
 
<script src="<?php echo $ThemeUrl; ?>js/bootstrap-transition.js"></script> 
<script src="<?php echo $ThemeUrl; ?>js/bootstrap-collapse.js"></script> 
<script src="<?php echo $ThemeUrl; ?>js/bootstrap-dropdown.js"></script>

<script src="<?php echo $ThemeUrl; ?>js/application.js"></script>
<script type="text/javascript">
var step = 1;
$( ".produto-exibidos-textos" ).hide();
$( '.produto-exibidos-textos[data-step='+(step)+']' ).show();


$( ".links-slider ul li" ).click(
  function() {
	  if(step>=1){
		  $( '.selo-slider img' ).stop().animate({width: '150%','margin-left': '-100px', opacity:0}, 200, function() {});
		  
		  $( '.produto-exibidos[data-step='+(step)+']' ).stop().animate({top: '-380px'}, 400, function() {
		 	 $( '.produto-exibidos[data-step='+(step)+']' ).css('top','450px');
		  });
	  }
	  step = $(this).index()+1;
	  topVar = ((step-1)*61)-309;
	  topVar = topVar+"px";
	  $( '.links-slider ul li' ).removeClass( "onstep" );
	  $( this ).addClass( "onstep" );


	  $( ".produto-exibidos-textos" ).hide();
	  $( '.produto-exibidos-textos[data-step='+(step)+']' ).show();
	  
	  $( '.hover-links-slider' ).stop().animate({top: topVar}, 400, function() {
		  $( '.produto-exibidos[data-step='+(step)+']' ).stop().animate({top: '80px'}, 400, function() {
			  $( '.selo-slider img' ).stop().animate({width: '109px','margin-left': '0px', opacity:1}, 180, function() {});
		  });
	  });
  }
);

$( ".acesso-rapido" ).click(function() {
	$( ".menu-footer-inicial" ).slideToggle(400,"swing", function(){
		
	});
	$( ".menu-footer-acesso-rapido" ).slideToggle(800,"swing");
});
$( ".acesso-rapido-fechar" ).click(function() {
	$( ".menu-footer-acesso-rapido" ).slideToggle(400,"swing", function(){
		$( ".menu-footer-inicial" ).slideToggle(800,"swing");
	});
	
	
});

	$('.show-form-hide').bind('click', function() {
		
		$( ".form-hide" ).toggle( "slow");
	});

</script> 

</body>
</html>
