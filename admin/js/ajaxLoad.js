/* ajax upload */
/*setTimeout(function(){
    if($("#upload-and-crop")) {
        new AjaxUpload('#upload-and-crop', {
            action: '?action=upload_img',
            onSubmit: function(file, ext) {
                if (ext != "jpg" && ext != "png" && ext != "jpeg") {
                    return Growl.error({
                        title: 'Extens&atilde;o inv&aacute;lida',
                        text: 'O arquivo enviado deve ser uma imagem nos formatos jpg, png ou gif'
                    });
                } else {
                    return true;
                }
            },
            onComplete: function(file, response) {

            }
        });
    }
}, 500);*/