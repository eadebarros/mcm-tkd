<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$actionsArray = Array("url_slug", "upload_img", "image_crop");


function url_slug() {
    $str = utf8_encode($_POST['str']);
    die(trim(toAscii($str), "-"));
}

function upload_img() {
    $ext = getExtension($_FILES['userfile']['name']);
    if($ext != "jpg" && $ext != "png" && $ext != "jpeg") die("invalid extension");
    $name = str_replace(".".$ext, "", $_FILES['userfile']['name']);
    $name = toAscii($name).".".$ext;
    $fileDestiny = THE_ROOT.'/images/products/original/'.$name;
    WideImage::load($_FILES['userfile']['tmp_name'])->saveToFile($fileDestiny, 100);
    die('images/products/original/'.$name);
}

function image_crop() {
    if($_POST['image']) {
        $names = explode("/", $_POST['image']);
        $name = end($names);
        $image = WideImage::load(THE_ROOT . 'images/products/resizable/' . $name);
        
        
        if($_POST['ratio'] == "0") {
            // imagem de capa
            $image->resize($_POST['tw'], $_POST['th'])
                ->crop($_POST['x'], $_POST['y'], $_POST['w'], $_POST['h'])
                ->saveToFile(THE_ROOT . 'images/products/product/' . $name, 100);
            /// resize zoom
            $zoom = WideImage::load(THE_ROOT . 'images/products/original/' . $name);
            $zw = $zoom->getWidth();
            $zh = $zoom->getHeight();
            $rat = $zw / $_POST['tw'];
            //zoom
            $zoom->crop($_POST['x'] * $rat, $_POST['y'] * $rat, $_POST['w'] * $rat, $_POST['h'] * $rat)
                ->resize(1000, 1000)
                ->saveToFile(THE_ROOT . 'images/products/zoom/' . $name, 100);
        } else
        if($_POST['ratio'] == "1/1") {
            //thumb
            $image->resize($_POST['tw'], $_POST['th'])
                ->crop($_POST['x'], $_POST['y'], $_POST['w'], $_POST['h'])
                ->resize(80, 80)
                ->saveToFile(THE_ROOT . 'images/products/thumb/' . $name, 100);
        } else
        if($_POST['ratio'] == "277/170") {
            // listagem
            $image->resize($_POST['tw'], $_POST['th'])
                ->crop($_POST['x'], $_POST['y'], $_POST['w'], $_POST['h'])
                ->saveToFile(THE_ROOT . 'images/products/listing/' . $name, 100);
        } else {
            die("wrong ratio: ".$_POST['ratio']);
        }
        die("done");
    } else {
       die("no image");
    }
}