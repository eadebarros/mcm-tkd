tinymce.init({
    selector: ".tinymce",
    theme: "modern",
    width: "100%",
    language: "pt_BR",
    height: 300,
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
    ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| responsivefilemanager | image | media | link unlink anchor | image media | forecolor backcolor | print preview code",
    image_advtab: true,
    external_filemanager_path: "js/tinymce/filemanager/",
    filemanager_title: "Gerenciador de Arquivos",
    external_plugins: {
        filemanager: "filemanager/plugin.min.js"
    }
});