<?php

/* general */
error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);

ini_set("max_execution_time", 30);
ini_set("post_max_size", "32M");
ini_set("upload_max_filesize", "32M");
date_default_timezone_set('Brazil/East');

/* version */
    define('SERVUS_DEVELOPER', 'Brian Sandes');
    define('SERVUS_VERSION', '1.0.0');
    define('SERVUS_RELEASE_DATE', '2013-09-23');

    define('SECRET', 'uD$8*(656Hs$&R&%');

/* folders */
    define('THE_ROOT', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);
    define('LOG_PATH', ROOT_PATH . 'log'.DIRECTORY_SEPARATOR);
    define('TMP', ROOT_PATH . 'tmp'.DIRECTORY_SEPARATOR);

/* url */
    define('MAIN_URL', 'http://localhost/mcm-tkd/');

/* mysql */
    define('MYSQL_SERVER', 'localhost');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', '');
    define('MYSQL_DB', 'mcm-tkd');
    define('MYSQL_PREFIX', 'mcm_');
    define('MYSQL_DEBUGMODE', true);

/* logs */
    define('MYSQL_LOG', 'query.log.txt');
    define('MYSQL_ERROR_LOG', 'mysql.log.txt');
    
/* theme stuff */  


$exs = Array(
    "sobre-a-eternit/page" => "page",
    "cursos/page" => "page",
    "destaques" => "category",
    "destaques/category" => "category",
    "destaques/category/post" => "post",
    "fale-conosco/page" => "page",
    "busca" => "busca",
    "contato/page" => "page"
);    

$pageLayouts = Array(
    "page" => "P&aacute;gina",
    "acesso-restrito" => "Acesso Restrito",
    "amianto-crisotila" => "Amianto Crisotila",
    "atendimento-ao-cliente" => "Atendimento ao cliente",
    "treinamentos" => "Treinamentos",
    "destaques" => "Destaques",
    "faq" => "FAQ",
    "fale-com-o-conselho" => "Fale com o conselho",
    "fale-com-o-presidente" => "Fale com o presidente",
    "ferramentas" => "Ferramentas",
    "encontre-uma-assistencia-tecnica" => "Encontre uma assist&ecirc;ncia t&eacute;cnica",
    "imprensa" => "Imprensa",
    "onde-comprar" => "Onde Comprar",
    "produtos" => "Produtos",
    "portas-abertas" => "Portas abertas",
    "profissionais-certificados" => "Profissionais certificados",
    "reconhecimentos" => "Reconhecimentos",
    "seja-nosso-fornecedor" => "Seja nosso fornecedor",
	"seja-nosso-cliente" => "Seja nosso cliente",
    "sobre-a-eternit" => "Sobre a Eternit",
    "showroom" => "Showroom",
    "showroom-itinerante" => "Showroom itinerante",
    "unidades" => "Unidades",
	"representantes"=>"representantes"
	
);



$menus = Array(
    "sobre-a-precon-goias" => Array(
        "sobre-a-precon-goias/a-empresa" => "A empresa",
        "sobre-a-precon-goias/grupo-eternit" => "Grupo Eternit",
        "sobre-a-precon-goias/missao-visao-e-valores" => "Miss&atilde;o, vis&atilde;o e valores",
        "sobre-a-precon-goias/unidades" => "Unidades",
        "sobre-a-precon-goias/portas-abertas" => "Portas abertas",
        "sobre-a-precon-goias/peg" => "PEG"
    ),
    "onde-comprar" => Array(
        "onde-comprar" => "Onde Comprar",
        "onde-comprar/representantes" => "Representantes",
		"onde-comprar/assistencia-tecnica" => "Assist&ecirc;ncia t&eacute;cnica"
    ),
    "treinamentos" => Array(
        "treinamentos" => "Treinamentos"
    ),
	"downloads" => Array(
        "downloads" => "Downloads"
    ),
    "contato" => Array(
        "contato/atendimento-ao-cliente" => "Atendimento ao cliente",
        "contato/seja-nosso-cliente" => "Seja nosso cliente",
        "contato/seja-nosso-fornecedor" => "Seja nosso fornecedor",
        "contato/trabalhe-conosco" => "Trabalhe conosco"
    )

	
);

$subMenus = Array(
    "coberturas" => Array(
        "produtos/coberturas" => "Coberturas"
    ),
    "loucas-sanitarias" => Array(
        "produtos/loucas-sanitarias" => "Bacias sanit&aacute;rias"
    ),
    "metais-sanitarios" => Array(
        "produtos/metais-sanitarios/duchas" => "Duchas",
        "produtos/metais-sanitarios/misturadores" => "Misturadores",
        "produtos/metais-sanitarios/monocomandos" => "Monocomandos",
        "produtos/metais-sanitarios/etermatic" => "Etermatic",
        "produtos/metais-sanitarios/torneiras" => "Torneiras",
        "produtos/metais-sanitarios/complementos" => "Complementos"
    ),
    "solucoes-construtivas" => Array(
        "produtos/solucoes-construtivas/placas-cimenticias" => "Placas Ciment&iacute;cias",
        "produtos/solucoes-construtivas/painel-wall" => "Painel Wall",
        "produtos/solucoes-construtivas/engradamento-metalico" => "Engradamento Met&aacute;lico"
    ),
    "acessorios" => Array(
        "produtos/acessorios" => "Acessorios"
    )
);


$randLike = Array(
    "caixas-dagua.jpg" => "produtos/coberturas",
    "duchas.jpg" => "produtos/metais-sanitarios/duchas",
    "engradamento-metalico.jpg" => "produtos/solucoes-construtivas/engradamento-metalico",
    "lavatorios.jpg" => "produtos/metais-sanitarios/lavatorios",
    "monocomandos.jpg" => "produtos/metais-sanitarios/monocomandos",
    "telhas-de-fibrocimento.jpg" => "produtos/solucoes-construtivas/telhas-de-fibrocimento",
    "torneiras.jpg" => "produtos/metais-sanitarios/torneiras",
);


$ProductAmbients = Array(
    "1" => "Banheiro",
    "2" => "Cozinha"
);
?>