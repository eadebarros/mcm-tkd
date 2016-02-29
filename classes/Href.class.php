<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Post class
 * Servus! Open-Source Development Framework
 */

class Href extends AppModel {
    public $Table = "{__PREF__}href";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "content_id" => Array(),
        "type" => Array(),
        "ref" => Array("type" => "text", "required" => true, "extra" => "ref"),
        "date" => Array()
    );
    
    public function decode($url) {
        $parts = explode("/", trim($url, "/"));
        $fetch = Array();
        foreach($parts as $part) {
            if($this->get($part)) {
                $fetch[] = Array("id" => $this->content_id, "controller" => $this->type, "ref" => $part);
            } else {
                $fetch[] = $part;
            }
        }
        return $fetch;
    }
    
    public function encode($attrs) {
        foreach($attrs as $part) {
            if($url) $url .= "/";
            if(is_array($part)) {
                $url .= $part['controller'];
            } else {
                $url .= $part;
            }
        }
        return $url;
    }
}
?>