<?php
/**
 * Class Minify  
 * @package Minify
 */

class Minifier {
    public static function minify($src) {
        if(file_exists($src)) {
            $ext1 = explode(".", strtolower($src));
            $ext = end($ext1);
            switch ($ext) {
                case "css":
                    $type = 'Minify_CSS';
                    break;
                case "js":
                    $type = 'JSMinPlus';
                    break;
                default:
                    return false;
                    break;
            }
            require_once dirname(__FILE__).'/config.php';
            $textIn = str_replace("\r\n", "\n", Minifier::load($src));
            $args = array($textIn);
            $func = array($type, 'minify');
            $inOutBytes[0] = strlen($textIn);
            $textOut = call_user_func_array($func, $args);
            $inOutBytes[1] = strlen($textOut);
            $textOut = "/**
 * Minify date: ".date("Y-m-d H:i:s")."; hash: ".md5(date("Y-m-d H:i:s"))."
 * Bytes in: {$inOutBytes[0]}; Bytes out {$inOutBytes[1]}; Reduced ".round(100 - (100 * $inOutBytes[1] / $inOutBytes[0]))."%
 * Minified with Minify 2.1.7 By https://code.google.com/p/minify/
 * Brian Danket euch ;D
 */
".$textOut;
            return $textOut;
        } else {
            return false;
        }
    }
    
    public static function load($src) {
        $content = file_get_contents($src);
        return get_magic_quotes_gpc() ? stripslashes($content) : $content;
    }
}