<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

/* servus functions */

/* return an array with all controllers */
function get_controllers() {
    if($handle = opendir('app/controllers/')) {
        while (false !== ($controller = readdir($handle))) {
            if($controller != "." && $controller != "..") {
                $controllers[] = $controller;
            }
        }
        return $controllers;
    } else {
        return false;
    }
}

/* checks if a controller exists */
function is_controller($control) {
    $control = trim($control, ".");
    return file_exists("app/controllers/".$control."/".$control.".ctrl.php");
}

/* checks if controller is a servus native controller */
function is_nativeController($control) {
    $control = trim($control, ".");
    return file_exists("app/models/".$control.".php");
}

/* checks if controller is a servus native controller */
function has_view($control, $mode) {
    return file_exists("app/controllers/".$control."/".$control."_".$mode.".html.php");
}

/* checks if a controller is pluralized */
function is_pluralized($control) {
    $singular = Inflector::singularize($control);
    return ($singular != $control);
}

/* file functions */

/* returns a file extension */
function getExtension($str) {
    $arr = explode(".", $str);
    return end($arr);
}

/* servus output functions */

function src($src) {
    if(file_exists($src)) {
        $filename = basename($src);
        $ext = getExtension($filename);
        $mtime = filemtime($src);
        $name = getFileCacheName($filename);
        $cacheFilename = $name."-".md5($mtime).".min.".$ext;
        if(!file_exists("cache/".$cacheFilename)) {
            $content = Minifier::minify($src);
            $handle = fopen("cache/".$cacheFilename, "a");
            fwrite($handle, $content);
            fclose($handle);
        }
        
        if($ext === "js") {
            echo "<script src=\"cache/".$cacheFilename."\" type=\"text/javascript\"></script>\n";
        } else
        if($ext === "css") {
            echo "<link href=\"cache/".$cacheFilename."\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />\n";
        }
    } else {
        echo "<!-- error (".$src.")-->";
    }
}

function getFileCacheName($filename) {
    $filename = str_friendly($filename);
    $parts = explode("-", $filename);
    array_pop($parts);
    return implode("-", $parts);
}

function eFileSize($filename) {
    if(file_exists($filename)) {
        $size = filesize($filename);
        if($size < 1024 ){
            $size .= " Bs";
        } else
        if($size < (1024 * 1024) ) {
            $size = round($size / 1024, 2)." KBs";
        } else
        if($size < (1024 * 1024 * 1024) ) {
            $size = round($size / 1024 / 1024, 2)." MBs";
        }
        
        echo $size;
    } else {
        echo "<!--file $filename not found-->";
    }
}

/* string treatment functions */

/* friendlize a string */
function str_friendly($str) {
    $str = htmlentities($str);
    $str = preg_replace('/&([a-z]{1,2})(?:acute|lig|grave|ring|tilde|uml|cedil|caron|circ);/i', '\1', $str);
    $str = html_entity_decode($str, ENT_COMPAT, "UTF-8");
    $str = preg_replace('/[^a-z0-9-]+/i', '-', $str);
    $str = preg_replace('/-+/', '-', $str);
    $str = trim($str, '-');
    $str = strtolower($str);
    return $str;
}

/* get an excerpt based on the word lenght parsed */
function excerpt($content, $lenght) {
    $words = explode(" ", $content, $lenght);
    unset($words[count($words) - 1]);
    return strip_tags(implode(" ", $words));
}

/* get an excerpt based on the char lenght parsed */
function char_excerpt($content, $lenght) { 
        if(strlen($content) > $lenght) {
            $words = explode(" ", substr($content, 0, $lenght));
            unset($words[count($words) - 1]);
            return implode(" ", $words);
        } else {
            return $content;
        }
    }


/* browser/server/client functions */

/* is ie */
function is_ie() {
    return (bool) preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT']);
}

/* redir */
function redir($url) {
    die('<meta http-equiv="refresh" content="0; url=' . $url . '" />');
}

/* fetch user info */
function userInfo($useragent = null) {
    $info['ip'] = $_SERVER['REMOTE_ADDR'];
    $info['computer'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    if ($useragent == null)
        $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
        $info['version'] = $matched[1];
        $info['browser'] = 'IE';
    } elseif (preg_match('|Opera/([0-9].[0-9]{1,2})|', $useragent, $matched)) {
        $info['version'] = $matched[1];
        $info['browser'] = 'Opera';
    } elseif (preg_match('|Firefox/([0-9\.]+)|', $useragent, $matched)) {
        $info['version'] = $matched[1];
        $info['browser'] = 'Firefox';
    } elseif (preg_match('|Chrome/([0-9\.]+)|', $useragent, $matched)) {
        $info['version'] = $matched[1];
        $info['browser'] = 'Chrome';
    } elseif (preg_match('|Safari/([0-9\.]+)|', $useragent, $matched)) {
        $info['version'] = $matched[1];
        $info['browser'] = 'Safari';
    } else {
        $info['version'] = '';
        $info['browser'] = 'Desconhecido';
    }

    $OSList = array(
        'Windows 3.11' => 'Win16',
        'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
        'Windows 98' => '(Windows 98)|(Win98)',
        'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
        'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
        'Windows Server 2003' => '(Windows NT 5.2)',
        'Windows Vista' => '(Windows NT 6.0)',
        'Windows 7' => '(Windows NT 7.0)|(Windows NT 6.1)',
        'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
        'Windows ME' => 'Windows ME',
        'Open BSD' => 'OpenBSD',
        'Sun OS' => 'SunOS',
        'Linux' => '(Linux)|(X11)',
        'Mac OS' => '(Mac_PowerPC)|(Macintosh)',
        'QNX' => 'QNX',
        'BeOS' => 'BeOS',
        'OS/2' => 'OS/2',
        'Search Bot' => '(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)'
    );
    foreach ($OSList as $info['os'] => $Match) {
        
        //if (eregi($Match, $_SERVER['HTTP_USER_AGENT'])) {
        if (preg_match('/'.$Match.'/', $_SERVER['HTTP_USER_AGENT'])) {
            break;
        }
    }
    return $info;
}

/* code treatment functions */

/* returns a random string */
function randStr($length = 32, $chars = 'abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ!@#$%&*()_-+=') {
    $validCharNumber = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $validCharNumber - 1)];
    }
    return $str;
}

/* returns a format converted date */
function toDate($date, $format = null) {
    return ($format) ? date($format, strtotime($date)) : $date ;
}

/* returns a format converted date based on Brazil's date format */
function fromBrDate($date, $format = null) {
        $data = explode("/", $date);
        $uni_date = $data[2]."-".$data[1]."-".$data[0]." 00:00:00";
        return date($format, strtotime($uni_date));
}

/* Servus RunTime functions */

/* get standard title */
function the_title() {
    global $Config;
    echo $Config->NAME;
}

/* gets standard title */
function this_title($control, $mode = "list") {
    if($mode === "list") {
        $title = __(Inflector::pluralize($control), true);
    } else
    if($mode === "add" || $mode === "edit") {
        $title = __($mode, true)." ".__($control);
    } else {
        $title = __($control, true);
    }
    echo $title;
}

/* sets an alert */
function setAlert($message, $type) {
    $_SESSION['message'] = $message;
    $_SESSION['type'] = $type;
}

/* shows an alert */
function alert($message = null, $type = null) {
    if($message === null && $type === null) {
        $message = $_SESSION['message'];
        $type = $_SESSION['type'];
        unset($_SESSION['message']);
        unset($_SESSION['type']);
    }
    if($message && $type) {
        echo '<div class="container-fluid padded"><div class="row-fluid"><div class="alert alert-'.$type.'"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$message.'</div></div></div>
';
    }
}


/* displays a field label if set */
function label($field, $ucfirst = true) {
    global $W;
    $word = $W[$field] ? $W[$field] : $W[str_replace("_", " ", $field)] ;
    if(!$word) $word = str_replace("_", " ", $field);
    return $ucfirst ? ucfirst2($word) : $word ;
}

/* displays a field label if set */
function elabel($field, $ucfirst = true) {
    global $W;
    $word = $W[$field] ? $W[$field] : $W[str_replace("_", " ", $field)] ;
    if(!$word) $word = str_replace("_", " ", $field);
    echo $ucfirst ? ucfirst2($word) : $word ;
}

/* lang functions */

function _e($str, $ucfirst = true) {
    global $W;
    $str = str_replace("_", " ", $str);
    $word = $W[$str] ? $W[$str] : $str ;
    echo $ucfirst ? ucfirst2($word) : $word ;
}

function __($str, $ucfirst = true) {
    global $W;
    $str = str_replace("_", " ", $str);
    $word = $W[$str] ? $W[$str] : $str ;
    return $ucfirst ? ucfirst2($word) : $word ;
}

/* lang message functions */

function _m($control, $mode, $status, $genre = "m") {
    if($status === true) {
        $msg = __($control)." ".__("done-".$mode."-".$genre, false)." ".__("successfully", false).".";
    } else {
        $msg = __("error while trying to")." ".__($mode, false)." ".__($control, false)."!";
    }
    return $msg;
}

/* url slug generator */
setlocale(LC_ALL, 'en_US.UTF8');
function toAscii($str, $delimiter='-') {
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^.a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;
}



/* ===========================================================
 *                      WORKAROUNDS
 * ===========================================================
 */

function ucfirst2($str) {
    if($str[0] === "&") {
        $str[1] = ucfirst($str[1]);
        return $str;
    } else {
        return ucfirst($str);
    }
}

function shuffle_assoc(&$array) {
    $keys = array_keys($array);

    shuffle($keys);

    foreach ($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}

?>