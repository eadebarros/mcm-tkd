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
    $(".faq-button").click(function(){
        var novaurl = $(".active img").attr("src");
		novaurl = novaurl.replace('-on','');
		$(".active img").attr("src",novaurl);
		$('.faq-button').removeClass("active");

        $(this).addClass("active");
		
        var novaurl = $(".active img").attr("src");
		novaurl = novaurl.replace('.png','-on.png');
		$(".active img").attr("src",novaurl);

		
		
        id = $(this).attr("id");
        $(".faq-div").fadeOut(300).promise().done(function(){
            $("."+id).fadeIn(300);
        });
    });
	
	
    $(".tab-info").click(function(){
        $(".tab-info").removeClass("active");
        $(this).addClass("active");
    });
    $(".tab-info").click(function(){
        id = $(this).attr("id");
        $(".p-tab").hide();
        $("." + id).show();
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