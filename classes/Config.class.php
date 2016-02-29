<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

class Config extends MySql {
    public $Table = "{__PREF__}settings";
    public function __construct() {
        $query = "SELECT * FROM {$this->Table}";
        $result = $this->query($query);
        if(mysql_num_rows($result) > 0) {
            while($r = mysql_fetch_assoc($result)) {
                $this->$r['name'] = $r['value'];
            }
        }
    }
}
?>