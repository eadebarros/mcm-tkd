tinyMCE.init({
    mode : "specific_textareas",
    editor_selector : "tinymce",
    language: "pt",
    relative_urls:false,
    convert_urls :false,
    theme : "advanced",
    extended_valid_elements : 'p[*],span[*],a[*]',
    plugins : "tinybrowser,autolink,autoresize,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,imagemanager",
    width: '100%',
    autoresize_min_height: 400,
    autoresize_max_height: 600,
    pagebreak_separator : "<!-- readmore -->",
    theme_advanced_buttons1 : "tinybrowser,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,code,|,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,charmap,iespell,advhr",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,
    template_external_list_url : "js/tinymce/lists/template_list.js",
    external_link_list_url : "js/tinymce/lists/link_list.js",
    external_image_list_url : "js/tinymce/lists/image_list.js",
    media_external_list_url : "js/tinymce/lists/media_list.js",
    file_browser_callback : "tinyBrowser",
    template_replace_values : {
        username : "Some User",
        staffid : "991234"
    },
    onchange_callback : function(){
        tinyMCE.triggerSave();
    }
});

tinyMCE.init({
    mode : "specific_textareas",
    editor_selector : "simple-tinymce",
    language: "pt",
    relative_urls:false,
    convert_urls :false,
    theme : "advanced",
    extended_valid_elements : 'p[*],span[*],a[*]',
    plugins : "autolink,autoresize,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist",
    width: '100%',
    autoresize_min_height: 400,
    autoresize_max_height: 500,
    pagebreak_separator : "<!-- readmore -->",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "bullist,numlist,|,tablecontrols,|,hr,|,charmap,forecolor,backcolor,code",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,
    template_external_list_url : "js/tinymce/lists/template_list.js",
    external_link_list_url : "js/tinymce/lists/link_list.js",
    external_image_list_url : "js/tinymce/lists/image_list.js",
    media_external_list_url : "js/tinymce/lists/media_list.js",
    file_browser_callback : "tinyBrowser",
    template_replace_values : {
        username : "Some User",
        staffid : "991234"
    },
    onchange_callback : function(){
        tinyMCE.triggerSave();
    }
});