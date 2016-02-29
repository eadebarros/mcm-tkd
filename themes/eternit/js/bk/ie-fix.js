jQuery(document).ready(function(){
    jQuery.each(jQuery("[placeholder]"), function(){
        ph = jQuery(this).attr("placeholder");
        jQuery(this).val(ph);
        jQuery(this).bind("focus", function(){
            ph = jQuery(this).attr("placeholder");
            val = jQuery(this).val();
            if(val == ph) {
                jQuery(this).val("")
            }
        });
        jQuery(this).bind("blur", function(){
            ph = jQuery(this).attr("placeholder");
            val = jQuery(this).val();
            if(val == "") {
                jQuery(this).val(ph)
            }
        });
    });
});