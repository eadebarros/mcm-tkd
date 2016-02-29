<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

function menu($menu, $t = null) {
    global $menus;
    if(is_array($menus[$menu])) {
        $slash = "";
        foreach($menus[$menu] as $key => $item) {
            echo $slash;
            $p = explode("/", $key);
            $c = end($p);
            echo '<a href="'.$key.'"'.($c == $t ? ' class="active"':'').'>'.$item.'</a>';
            $slash = " | \n";
        }
    } else {
        echo "<!-- menu $menu not found -->";
    }
}

function doublecolor($string) {
	
	$string = explode(" ",$string);
	$count = count($string);
	foreach($string as $item){
		if($count<=1){
			$stringMont = 	$stringMont.' <span class="red edtlarg">'.$item.'</span>';
		}else{
			$stringMont = 	$stringMont." ".$item;
		}
		$count--;
	}
	return $stringMont;
}

function addForm($texto, $fm, $sep){
	
	return str_replace($sep,$fm,$texto);
	
}