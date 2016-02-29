<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * MySql class developed by Brian Sandes
 *
 */

class MySql {
    public $DbConnection;
    public $InsertId;

    /**
     * Conecta ao banco MySql com as variaveis informadas no arquivo config
     */
    protected function connect(){
        $this->DbConnection = @mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD) or die("<h1>Error connecting to the database!</h1>");
        @mysql_select_db(MYSQL_DB) or die("<h1>Error connecting to the database!</h1>");
        return ($this->DbConnection) ? true : false ;
    }

    public function query($query, $print = null) {
        if(!$this->DbConnection) $this->connect();
        $query = str_replace("{__PREF__}", MYSQL_PREFIX, $query);
        if($print === true) echo $query;
        if(MYSQL_DEBUGMODE === true) {
            $debug = debug_backtrace();
            for($i=0;$i<count($debug);$i++) {
                if($debug[$i]['class'] != "appModel" && $debug[$i]['class'] != "mysql") {
                    $arr = explode("\\", $debug[$i]['file']);
                    $file = end($arr);
                    $line = $debug[$i]['line'];
                    $class = $debug[$i]['class'];
                    break;
                }
            }
            $this->log("$class $file ($line) - $query");
        }
        $result = mysql_query($query, $this->DbConnection);
        $this->InsertId = (mysql_insert_id($this->DbConnection) > 0) ? mysql_insert_id($this->DbConnection) : null;
        if($result != true) $this->error(mysql_error() . " - $query");
        return $result;
    }
    
    public function escape($str) {
        return mysql_real_escape_string($str);
    }

    public function error($error){
        $file = LOG_PATH.date("l")."/".MYSQL_ERROR_LOG;
        $mode = (date("d-m", @filemtime($file)) != date("d-m") || !file_exists($file)) ? "w" : "a";
        $handle = fopen($file, $mode);
        fwrite($handle, "[".date("Y-m-d H:i:s")."] - ".$error.chr(13).chr(10));
        fclose($handle);
    }

    public function log($query){
        $file = LOG_PATH.date("l")."/".MYSQL_LOG;
        $mode = (date("d-m", @filemtime($file)) != date("d-m") || !file_exists($file)) ? "w" : "a";
        $handle = fopen($file, $mode);
        fwrite($handle, "[".date("Y-m-d H:i:s")."] - ".$query.chr(13).chr(10));
        fclose($handle);
    }
}
?>
