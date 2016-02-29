<div id="fileupload">
                                                    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
                                                    <link rel="stylesheet" href="css/jquery.fileupload.css">
                                                    <link rel="stylesheet" href="css/jquery.fileupload-ui.css">
                                                    <!-- CSS adjustments for browsers with JavaScript disabled -->
                                                    <noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
                                                    <noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
                                                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                                    <noscript><input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/"></noscript>
                                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                    <div class="control-group fileupload-buttonbar">
                                                        <div class="col-lg-7">
                                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                            <span class="btn btn-success fileinput-button">
                                                                <i class="icon-plus"></i>
                                                                <span><?php _e("add files");?>...</span>
                                                            </span>
                                                            <input type="file" name="files[]" id="fileinput" multiple style="display: none;">
                                                            <button type="submit" class="btn btn-primary start">
                                                                <i class="icon-upload"></i>
                                                                <span><?php _e("start upload"); ?></span>
                                                            </button>
                                                            <button type="reset" class="btn btn-warning cancel">
                                                                <i class="icon-ban-circle"></i>
                                                                <span><?php _e("cancel upload"); ?></span>
                                                            </button>
                                                            <button type="button" class="btn btn-danger delete">
                                                                <i class="icon-trash"></i>
                                                                <span><?php _e("delete"); ?></span>
                                                            </button>
                                                            <input type="checkbox" class="toggle" style="display: inline;width: 40px;">
                                                            <!-- The loading indicator is shown during file processing -->
                                                            <span class="fileupload-loading"></span>
                                                        </div>
                                                        <!-- The global progress information -->
                                                        <div class="col-lg-5 fileupload-progress fade">
                                                            <!-- The global progress bar -->
                                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                                            </div>
                                                            <!-- The extended global progress information -->
                                                            <div class="progress-extended">&nbsp;</div>
                                                        </div>
                                                    </div>
                                                    <!-- The table listing the files available for upload/download -->
                                                    <table role="presentation" class="table table-striped">
                                                        <tbody class="files">
<?php
if($ProductImages)
    foreach($ProductImages as $Row) { ?>
                                                            <tr class="template-download">
                                                                        <td>
                                                                            <span class="preview">
                                                                                <a href="<?php echo MAIN_URL . "images/products/original/" . $Row->name; ?>" title="<?php echo $Row->name; ?>" download="<?php echo $Row->name; ?>" data-gallery><img src="<?php echo MAIN_URL . "images/products/thumb/" . $Row->name; ?>"></a>
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <p class="name">
                                                                                <a href="#crop-modal" data-toggle="modal" data-href="<?php echo MAIN_URL . "images/products/resizable/" . $Row->name; ?>" title="<?php echo $Row->name; ?>" class="crop-this"><?php echo $Row->name; ?></a>
                                                                                <br />
                                                                                <select name="type[]" style="width:250px;">
                                                                                    <option value="">Selecione</option>
                                                                                    <option value="listing"<?php if ($Row->type == "listing") echo ' selected'; ?>>Listagem</option>
                                                                                    <option value="cover"<?php if ($Row->type == "cover") echo ' selected'; ?>>Capa</option>
                                                                                    <option value="product"<?php if ($Row->type == "product") echo ' selected'; ?>>Produto aplicado</option>
                                                                                </select>
                                                                                <input type="hidden" name="filename[]" value="<?php echo $Row->name; ?>" />
                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                            <span class="size"><?php eFileSize(ROOT_PATH . "images/products/medium/" . $Row->name); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <a class="btn btn-primary crop-this" href="#crop-modal" data-toggle="modal" data-href="<?php echo MAIN_URL . "images/products/medium/" . $Row->name; ?>">
                                                                                <i class="icon-edit"></i>
                                                                                <span><?php _e("edit"); ?></span>
                                                                            </a>
                                                                            <button class="btn btn-danger delete-image">
                                                                                <i class="icon-trash"></i>
                                                                                <span><?php _e("delete"); ?></span>
                                                                            </button>
                                                                            <input type="checkbox" name="delete" value="1" class="toggle" style="width: 15px;margin-left: 4px;">
                                                                        </td>
                                                                    </tr>
    
<?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- The template to display files available for upload -->
                                                    <script id="template-upload" type="text/x-tmpl">
                                                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                                                        <tr class="template-upload fade">
                                                        <td>
                                                        <span class="preview"></span>
                                                        </td>
                                                        <td>
                                                        <p class="name">{%=file.name%}</p>
                                                        {% if (file.error) { %}
                                                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                                                        {% } %}
                                                        </td>
                                                        <td>
                                                        <p class="size">{%=o.formatFileSize(file.size)%}</p>
                                                        {% if (!o.files.error) { %}
                                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                                                        {% } %}
                                                        </td>
                                                        <td>
                                                        {% if (!o.files.error && !i && !o.options.autoUpload) { %}
                                                        <button class="btn btn-primary start">
                                                        <i class="icon-upload"></i>
                                                        <span><?php _e("send"); ?></span>
                                                        </button>
                                                        {% } %}
                                                        {% if (!i) { %}
                                                        <button class="btn btn-warning cancel">
                                                        <i class="icon-ban-circle"></i>
                                                        <span><?php _e("cancel"); ?></span>
                                                        </button>
                                                        {% } %}
                                                        </td>
                                                        </tr>
                                                        {% } %}
                                                    </script>
                                                    <!-- The template to display files available for download -->
                                                    <script id="template-download" type="text/x-tmpl">
                                                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                                                        <tr class="template-download fade">
                                                        <td>
                                                        <span class="preview">
                                                        {% if (file.thumbnailUrl) { %}
                                                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                                                        {% } %}
                                                        </span>
                                                        </td>
                                                        <td>
                                                        <p class="name">
                                                        {% if (file.url) { %}
                                                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                                                        {% } else { %}
                                                        <span>{%=file.name%}</span>
                                                        {% } %}
                                                        <br />
                                                        <select name="type[]" style="width:250px;">
                                                            <option value="">Selecione</option>
                                                            <option value="listing">Listagem</option>
                                                            <option value="cover">Capa</option>
                                                            <option value="product">Produto aplicado</option>
                                                        </select>
                                                        <input type="hidden" name="filename[]" value="{%=file.name%}" />
                                                        </p>
                                                        {% if (file.error) { %}
                                                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                                                        {% } %}
                                                        </td>
                                                        <td>
                                                        <span class="size">{%=o.formatFileSize(file.size)%}</span>
                                                        </td>
                                                        <td>
                                                        <a class="btn btn-primary" href="#" onclick="crop('<?php echo MAIN_URL."images/products/resizable/";?>{%=file.name%}');">
                                                        <i class="icon-edit"></i>
                                                        <span><?php _e("edit"); ?></span>
                                                        </a>
                                                        {% if (file.deleteUrl) { %}
                                                        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                                        <i class="icon-trash"></i>
                                                        <span><?php _e("delete"); ?></span>
                                                        </button>
                                                        <input type="checkbox" name="delete" value="1" class="toggle" style="width: 15px;margin-left: 4px;">
                                                        {% } else { %}
                                                        <button class="btn btn-warning cancel">
                                                        <i class="icon-ban-circle"></i>
                                                        <span><?php _e("cancel"); ?></span>
                                                        </button>
                                                        {% } %}
                                                        </td>
                                                        </tr>
                                                        {% } %}
                                                    </script>
                                                    <div id="crop-modal" class="modal hide fade">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h6 id="modal-tablesLabel">Recortar imagem</h6>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="cropdiv">
                                                                <img src="#" id="cropbox" />
                                                                <input type="hidden" id="x" name="x" />
                                                                <input type="hidden" id="y" name="y" />
                                                                <input type="hidden" id="w" name="w" />
                                                                <input type="hidden" id="h" name="h" />
                                                            </div>
                                                            <select id="ratio" style="margin-top: 20px;width: 250px;">
                                                                <option value="1/1" selected>Miniatura da Galeria</option>
                                                                <option value="277/170">Listagem</option>
                                                                <option value="0">Principal galeria</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                            <a href="#" id="modal-crop-go" class="btn btn-blue">Recortar</a>
                                                        </div>
                                                    </div>
                                                    <script src="js/vendor/jquery.ui.widget.js"></script>
                                                    <!-- The Templates plugin is included to render the upload/download listings -->
                                                    <script src="js/tmpl.min.js"></script>
                                                    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
                                                    <script src="js/load-image.min.js"></script>
                                                    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
                                                    <script src="js/canvas-to-blob.min.js"></script>
                                                    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
                                                    <!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>-->
                                                    <!-- blueimp Gallery script -->
                                                    <!--<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>-->
                                                    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
                                                    <script src="js/jquery.iframe-transport.js"></script>
                                                    <!-- The basic File Upload plugin -->
                                                    <script src="js/jquery.fileupload.js"></script>
                                                    <!-- The File Upload processing plugin -->
                                                    <script src="js/jquery.fileupload-process.js"></script>
                                                    <!-- The File Upload image preview & resize plugin -->
                                                    <script src="js/jquery.fileupload-image.js"></script>
                                                    <!-- The File Upload audio preview plugin -->
                                                    <script src="js/jquery.fileupload-audio.js"></script>
                                                    <!-- The File Upload video preview plugin -->
                                                    <script src="js/jquery.fileupload-video.js"></script>
                                                    <!-- The File Upload validation plugin -->
                                                    <script src="js/jquery.fileupload-validate.js"></script>
                                                    <!-- The File Upload user interface plugin -->
                                                    <script src="js/jquery.fileupload-ui.js"></script>
                                                    <!-- The main application script -->
                                                    <script src="js/main.js"></script>
                                                    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
                                                    <!--[if (gte IE 8)&(lt IE 10)]>
                                                    <script src="js/cors/jquery.xdr-transport.js"></script>
                                                    <![endif]-->
                                                    
                                                    <script src="js/jquery.Jcrop.min.js"></script>
                                                    <link rel="stylesheet" href="css/jquery.Jcrop.css" />
                                                    <script type="text/javascript">
                                                        var api;
                                                        $(document).ready(function(){
                                                            $(".crop-this").click(function() {
                                                                img = $(this).data("href");
                                                                $("#modal-crop-go").attr("data-href", img);
                                                                api.setImage(img);
                                                                if(!$(this).attr("href")) {
                                                                    $("#crop-modal").modal();
                                                                }
                                                            });

                                                            $("#ratio").change(function(){
                                                                ratio = $(this).val()
                                                                ratio = parseFloat(eval(ratio));
                                                                api.setOptions({
                                                                    aspectRatio: ratio
                                                                });
                                                            });

                                                            $(".delete-image").click(function(){
                                                               $(this).parent().parent().remove();
                                                            });
                                                            $("#modal-crop-go").click(function(){
                                                                if(checkCoords()) {
                                                                    $(".jcrop-holder > img").height();
                                                                    x =  $('#x').val();
                                                                    y =  $('#y').val();
                                                                    w =  $('#w').val();
                                                                    h =  $('#h').val();
                                                                    tw = $('.jcrop-holder > img').width();;
                                                                    th = $('.jcrop-holder > img').height();;
                                                                    href = $("#modal-crop-go").data("href");
                                                                    ratio = $("#ratio").val();
                                                                    $.ajax({
                                                                        type: 'POST',
                                                                        url: '?action=image_crop',
                                                                        data: 'x='+x+'&y='+y+'&w='+w+'&h='+h+'&image='+escape(href)+'&tw='+tw+'&th='+th+'&ratio='+ratio,
                                                                        success: function(data) {
                                                                            if(data != "no image") {
                                                                                names = href.split("/");
                                                                                name = names[names.length -1];
                                                                                rand = Math.floor((Math.random()*999)+1);
                                                                                thumb = $("a[download='"+name+"']").find($("img"));
                                                                                thumb.attr("src", thumb.attr("src")+"?rand="+rand);
                                                                                $("#crop-modal").modal("hide");
                                                                            }
                                                                            console.log(data);
                                                                        },
                                                                        error: function(xhr){
                                                                            console.log(xhr);
                                                                        }
                                                                    });
                                                                } else {
                                                                    Growl.error({
                                                                        title: 'Erro ao salvar!',
                                                                        text: 'Selecione alguma area da imagem para recortar.'
                                                                    });
                                                                }
                                                            });

                                                        });
                                                        
                                                        
                                                        initJcrop();
                                                        function initJcrop() {
                                                            api = $.Jcrop('#cropbox', {aspectRatio: 1,onChange: updateCoords});
                                                        };
                                                            
                                                        function crop(img) {
                                                            $("#modal-crop-go").attr("data-href", img);
                                                            api.setImage(img);
                                                            if(!$(this).attr("href")) {
                                                                $("#crop-modal").modal();
                                                            }
                                                        }

                                                        function updateCoords(c) {
                                                            $('#x').val(c.x);
                                                            $('#y').val(c.y);
                                                            $('#w').val(c.w);
                                                            $('#h').val(c.h);
                                                        };

                                                        function checkCoords() {
                                                            if (parseInt($('#w').val())) {
                                                                return true;
                                                            } else {
                                                                return false;
                                                            }   
                                                        };
                                                    </script>
</div>