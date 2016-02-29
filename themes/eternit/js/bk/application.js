$(document).ready(function(){
    if(jQuery(document).find(".validate-form").length > 0) {
        jQuery('.validate-form').bind('submit', function() {
            submit = true;
            email = true;
            jQuery.each(jQuery(this).find(jQuery(".validate-required")), function() {
                v = trim(jQuery(this).val(), "_");
                p = jQuery(this).attr("placeholder");
                ml = parseFloat(jQuery(this).attr("minlength"));
                l = parseFloat(v.length);
                if (l < ml)  submit = false;
                if (v == "" || (p != "" && p == v)) submit = false;
            });

            jQuery.each(jQuery(this).find(jQuery(".validate-email")), function() {
                filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter.test(jQuery(this).val())) email = false;
            });

            jQuery.each(jQuery(this).find(jQuery(".validate-nome")), function() {
                filter = /^[a-zA-Z]+$/;
                if (filter.test(jQuery(this).val())) {
                    nometexto = true;
                } else {
                    nometexto = false;
                }
            });
            
            if (submit === false) {
                alert("Preencha todos os campos obrigatorios");
                return false;
            } else {
                if (email === false) {
                    alert("Informe um email valido");
                    return false;
                }
                if (nometexto === false) {
                    alert("Informe um nome valido");
                    return false;
                } else {
                    return true;
                }
            }
        });
    }
    
    $(".carousel-inner object").attr("width", $(window).width()).attr("height", parseFloat($(window).width()) / 4.42790);
    $(window).resize(function() {
        if($(".carousel-inner object").length > 0) {
            $(".carousel-inner object").attr("width", $(window).width()).attr("height", parseFloat($(window).width()) / 4.42790);
        }
    });

    $(".gallery-icon").click(function(){
        id = $(this).attr('data-id').split('gl-');
        margin = parseFloat((id[1] - 3) * 33.4) + 67;
        $('.gallery-icon').find('img, div').show();
        $('.gallery-icon').find(".ativo, .textos").hide();


        $(this).find('img, div').hide();
        $(this).find(".ativo, .textos").show();


        if (margin >= 0) {
            $(".slider-gl").animate({"margin-left": "-" + margin + "%"}, 200, function() {
            });
        } else {
            $(".slider-gl").animate({"margin-left": "+" + Math.abs(margin) + "%"}, 200, function() {
            });
        }
    });
    
    $(".tab").click(function(){
        $(".tab").removeClass("active");
        $(this).addClass("active");
    });
    
    $('.txt-crisotila').hide();
   $('.btn-c').click(function(){
          $('.txt-crisotila').fadeOut(300);
      var alvo = $(this).attr('href').split('#').pop();
          $('.txt-crisotila').promise().done(function(){
              $('.'+alvo).fadeIn(300);
          });
      return false;
   });
   
    var ancora = window.location.href.split("#")[1];
    if(ancora){ 
        $('.'+ancora ).show();
    } else {
        $('.b1').show();
    }
    
    $("#filter-prizes").change(function(){
        y = $(this).val();
        if(y == "") {
            $("#prizes tbody tr").show();
        } else {
            $("#prizes tbody tr").hide();
            $("#prizes tbody tr.y-"+y).show();
        }
    });
    
    $(".change-radio").click(function(){
        $(".alpha-1").css({
            "opacity" : 0.5
        });
        $(this).parent().parent().find(".alpha-1").css({
            "opacity" : 1
        });
    });
    
    $(".unity").click(function(){
        if(!$(this).hasClass("active")) {
            $(".unity").removeClass("active");
            $(this).addClass("active");
            id = $(this).attr("id");
            $(".pagina_unidades").fadeOut(300).promise().done(function(){
                $("." + id).fadeIn(300);
            });
        }
    });
    
    
    $(".filter-at").change(function(){
        $("#assistencias tbody tr").hide();
        t = ($(".type-at:checked").val()) ? "."+$(".type-at:checked").val() : "" ;
        r = ($("#select-region").val()) ? "."+ $("#select-region").val(): "" ;
        sel = t + r ;
        $(sel).show();
    });
    
    $(".filter-cp").change(function(){
        $("#profissionais tbody tr").hide();
        ce = ($("#s-certi").val()) ? "."+$("#s-certi").val() : "" ;
        st = ($("#s-state").val()) ? "."+$("#s-state").val() : "" ;
        ci = ($("#s-city").val()) ? "."+$("#s-city").val() : "" ;
        sel = ce + st + ci ;
        if(sel == "") sel =  "#profissionais tbody tr";
        $(sel).show();
        if($("#profissionais tbody tr:visible").length == 0) {
            $(".default-row").show();
        }
    });
    
    $(".faq-button").click(function(){
        $(".faq-button").removeClass("active");
        $(this).addClass("active");
        id = $(this).attr("id");
        $(".faq-div").fadeOut(300).promise().done(function(){
            $("."+id).fadeIn(300);
        });
    });
    
    $("a[rel='showroom']").fancybox({
            'transitionIn'		: 'none',
            'transitionOut'		: 'none',
            'titlePosition' 	: 'over',
            'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">' + title + '</span>';
            }
    });
    
    $(".tools-lb").fancybox({
        'type' : 'iframe',
        'width' : 1100,
        'height': 800
    });
    
    var offset = jQuery("#ShareSidebar").offset();
    var topPadding = 200;
    if(offset) {
        jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop() > offset.top) {
                jQuery("#ShareSidebar").stop().animate({
                    marginTop: jQuery(window).scrollTop() - offset.top + topPadding
                });
            } else {
                jQuery("#ShareSidebar").stop().animate({
                    marginTop: 120              
                });
            }
        });
    }
    
    $(".eter-btn").click(function(){
        $(".eter-btn").removeClass("active");
        $(this).addClass("active");
    });
    
    $(".tab").click(function(){
        id = $(this).attr("id");
        $(".p-tab").hide();
        $("." + id).show();
        fleXenv.fleXcrollMain("bndes-content");
    });
    $(".quick-access-btn").find(function() {
            $(".quick-access-btn").click();
    });
            
    $(".quick-access-btn").click(function(){
        if($(this).hasClass("closed") === true) {
            $(".quick-access").animate({
                'height' : '287px'
            });
            $(".quick-access-btn").html("Recolher").removeClass("closed").addClass("open");
        } else {
            $(".quick-access").animate({
                'height' : '0px'
            });
            $(".quick-access-btn").html("Expandir").removeClass("open").addClass("closed");
        }
    });
    
    $("a[href='fale-conosco/trabalhe-conosco']").fancybox({
        'type'  : 'iframe',
        'href'  : 'https://www.elancers.net/frames/eternit/frame_geral.asp',
        'width' : 1000,
        'height': 800
    });
    
    
    $("#busca-ambiente").change(function(){
        am = escape($("#busca-ambiente").val());
        li = escape($("#busca-linha").val());
        if(am == "0") {
            $(".product-grid").load(location.href+"?getall=1&chg=1");
        } else {
            $(".product-grid").load(location.href+"?am="+am+"&chg=1");
        }
    });
    
    $("#busca-linha").change(function(){
        am = escape($("#busca-ambiente").val());
        li = escape($("#busca-linha").val());
        if(am == "0" && li == "0") {
            $(".product-grid").load(location.href+"?getall=1");
        } else
        if(am != "0" && li == "0") {
            $(".product-grid").load(location.href+"?am="+am);
        } else
        if(am != "0" && li != "0") {
            $(".product-grid").load(location.href+"?am="+am+"&li="+li);
        } else
        if(am == "0" && li != "0") {
            $(".product-grid").load(location.href+"?li="+li);
        }
    });
    
    
    $(".f-required").hide();
    $(".f-name, .f-city, .f-state, .f-product, .f-email").addClass("validate-required");
    $(".f-name-required, .f-city-required, .f-state-required, .f-product-required, .f-email-required").show();
    $(".f-email").addClass("validate-email");
    $(".f-email, .f-telephone").addClass("validate-required");
    $(".f-email-required, .f-telephone-required").show();
        
    $(".fale-conosco-form .eter-btn").click(function(){
        form = $(this).find("input[name=tipo_assistencia]").val();
        
        if(form == "reclamacao" || form == "sugestoes" ||form == "elogios") {
            $("#radio-atendimento").removeAttr("disabled").parent().css({'opacity':1});
            $("#form-atendimento").fadeIn(300);
        } else {
            $("#radio-atendimento").attr("disabled", "disabled").parent().css({'opacity':0.5});
            $("#radio-produto").attr("checked", "checked");
            disableForm("atendimento");
            $("#form-atendimento").fadeOut(300);
        }
        
        $(".type-form").val(form);
        
        $(".atendimento-cliente-form input, .atendimento-cliente-form textarea, .atendimento-cliente-form select").removeClass("validate-required, validate-email");
        $(".f-required").hide();
        if(form == "duvida-tecnica") {
            $(".f-name, .f-city, .f-state, .f-product, .f-email").addClass("validate-required");
            $(".f-name-required, .f-city-required, .f-state-required, .f-product-required, .f-email-required").show();
            $(".f-email").addClass("validate-email");
        } else
        if(form == "informacoes-comerciais") {
            $(".f-name, .f-city, .f-state, .f-product, .f-telephon").addClass("validate-required");
            $(".f-name-required, .f-city-required, .f-state-required, .f-product-required, .f-telephon-required").show();
        } else
        if(form == "reclamacao") {
            $(".f-name, .f-cpf, .f-address, .f-city, .f-state, .f-cep, .f-product, .f-telephon").addClass("validate-required");
            $(".f-name-required, .f-cpf-required, .f-address-required, .f-city-required, .f-state-required, .f-cep-required, .f-product-required, .f-telephon-required").show();
        } else
        if(form == "sugestoes" || form == "elogios" ) {
            $(".f-name, .f-city, .f-state, .f-email").addClass("validate-required");
            $(".f-name-required, .f-city-required, .f-state-required, .f-email-required").show();
            $(".f-email").addClass("validate-email");
        }
        $(".f-email, .f-telephone").addClass("validate-required");
        $(".f-email-required, .f-telephone-required").show();
    });
    
    $(".change-form").click(function(){
        form = $(this).val();

        if(form == "atendimento") { 
            enableForm("atendimento");
            disableForm("produto");
        } else {
            enableForm("produto");
            disableForm("atendimento");
        }
    });
    disableForm("atendimento");
    
    $("input[name=cpf], .mask-cpf").mask("999.999.999-**");
    $("input[name=cep], .mask-cep").mask("99999-999");
    $("input[name=purchase_date], .mask-date").mask("99/99/9999");
    $("input[name=telephone], .mask-telephone").mask("(99)9999-9999?9");
    $("input[name=cnpj], .mask-cnpj").mask("99.999.999/9999-99");
    
    $(".attr-link").fancybox();
    
    $(".event-sign-up").click(function(){
        el = $(this).parent().find($(".evo_metarow_signup"));
        elc = $(this).parent().find($(".close-form"));
        if(el.css("height") == "740px") {
            el.animate({"height":"26px"});
            elc.fadeOut();
        } else {
            eltop = el.offset().top;
            console.log(el);
            $('html').animate({
                scrollTop: eltop - 90
            }, 800);
            el.animate({"height":"740px"});
            elc.fadeIn();
        }
    });
    
    $(".close-form").click(function(){
        elc = $(this);
        el = $(this).parent().parent().find($(".evo_metarow_signup"));
        if(el.css("height") == "740px") {
            el.animate({"height":"26px"});
            elc.fadeOut();
        } else {
            el.animate({"height":"740px"});
            elc.fadeIn();
        }
    });
    
    $(".evcal_evdata_icons evcalicon_3, .evo_metarow_signup .evcal_evdata_cell").click(function(){
        el = $(this).parent();
        if(el.css("height") == "740px") {
            el.animate({"height":"26px"});
        } else {
            el.animate({"height":"740px"});
        }
    });
    
    $(".first-video").click(function(){
        $("#ifv").show();
        $("#isv").hide();
    });
    
    $(".second-video").click(function(){
        $("#isv").show();
        $("#ifv").hide();
    });
    
    $(".cadastre-se .open-form").click(function(){
        $(".cad-forms-box").animate({
            'margin-top' : 0
        }, 800, 'easeOutQuint');
    });
    
    $('.toggle-cad-forms').click(function(){
        $('.cadastre-se-form').fadeOut();
        $('.descadastre-se-form').fadeIn();
    });
    
    $('.toggle-descad-forms').click(function(){
        $('.cadastre-se-form').fadeIn();
        $('.descadastre-se-form').fadeOut();
    });
    
    $('.sign-form').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
    });
    
    $(".cad-forms-close").click(function(){
        $(this).parent().animate({
            'margin-top' : '-320px'
        });
    });
});

function disableForm(form) {
    $("#form-" + form + " form").css({
        'opacity' : 0.5
    });
    
    $("#form-" + form + " form input").attr("disabled", "disabled");
    $("#form-" + form + " form select").attr("disabled", "disabled");
    $("#form-" + form + " form textarea").attr("disabled", "disabled");
}

function enableForm(form) {
    $("#form-" + form + " form").css({
        'opacity' : 1
    });

    $("#form-" + form + " form input").removeAttr("disabled");
    $("#form-" + form + " form select").removeAttr("disabled");
    $("#form-" + form + " form textarea").removeAttr("disabled");
}



/* validacao */

function numberOnly(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
}

function trim(str, chars) {
	return ltrim(rtrim(str, chars), chars);
}
 
function ltrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
 
function rtrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

function validaDat(obj) {
    date = obj.value;
    var ardt=new Array;
    var ExpReg=new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
    ardt=date.split("/");
    erro = false;
    if ( date.search(ExpReg)==-1){
        erro = true;
    }
    else if (((ardt[1]==4)||(ardt[1]==6)||(ardt[1]==9)||(ardt[1]==11))&&(ardt[0]>30))
        erro = true;
    else if ( ardt[1]==2) {
        if ((ardt[0]>28)&&((ardt[2]%4)!=0))
            erro = true;
        if ((ardt[0]>29)&&((ardt[2]%4)==0))
            erro = true;
    }
    
    var objDate = new Date();
    objDate.setYear(date.split("/")[2]);
    objDate.setMonth(date.split("/")[1]  - 1);
    objDate.setDate(date.split("/")[0]);
    
    
    if(objDate.getTime() < new Date().getTime()){		
        erro = true;
    }
    
    if(erro && date != "__/__/____") {
        alert("Data invalida")
        obj.value = "";
        return false;
    } else {
        return true;
    }
}

function validaTel(obj) {
    value = obj.value.replace("_", "");
    erro = false;
    var first = value.substr(0,1);
    for(var i = 1; i < value.length; ++i) {
      if(value[i] != first) {
        break;
      }
    }
    if(i == value.length) {
        obj.value = "";
    }
    if(value.length < 8) {
        erro = true;
    }
    
    if(erro == true) {
        alert("Digite um numero de telefone valido");
        obj.value = "";
    }
}

function validaDdd(obj) {
    if(obj.value == "00") {
        alert("Digite um DDD valido");
        obj.value = "";
        obj.focus();
    }
}