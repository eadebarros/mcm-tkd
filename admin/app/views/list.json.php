<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$Obj = ${Inflector::camelize(Inflector::pluralize($ServusController))};

if($Obj) {
    echo "[\n";
    $comma = "";
    foreach($Obj as $Row) {
        echo $comma;
        echo " {";
        $comma2 = "";
        foreach($Row as $Key => $Value) {
            echo $comma2;
            echo "\"$Key\": ";
            echo (is_numeric($Value)) ? $Value : "\"$Value\"" ;
            $comma2 = ", ";
        }
        echo "}";
        $comma = ",\n";
    }
    echo "\n]";
} ?>