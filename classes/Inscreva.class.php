<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Page class
 * Servus! Open-Source Development Framework
 */

class Inscreva extends AppModel {
    public $Table = "{__PREF__}inscreva";
    public $Fields = Array(
        "id" => Array("extra" => "auto_increment"),
        "event_id" => Array(),
        "nome" => Array("class" => "c-input2"),
        "endereco" => Array("class" => "c-input2"),
        "telefone" => Array("class" => "c-input2 mask-telephone"),
        "email" => Array("class" => "c-input2 validate-email"),
        "profissao" => Array("class" => "c-input2"),
        "empresa" => Array("class" => "c-input2"),
        "cnpj" => Array("class" => "c-input2 mask-cnpj"),
        "como_ficou_sabendo" => Array("type" => "textarea", "class" => "t-input2"),
        "regiao" => Array("type" => "textarea", "class" => "t-input2"),
        "ultimas_obras" => Array("type" => "textarea", "class" => "t-input2"),
        "local" => Array("type" => "textarea", "class" => "c-input2"),
        "servicos" => Array("class" => "c-input2"),
        "qual_interesse" => Array("type" => "textarea", "class" => "t-input2"),
        "vaga_automovel" => Array("type" => "radio",),
        "date" => Array()
    );
    
    public $Conf = Array(
        "mode" => "LAED",
        "icon" => "icon-file-alt",
        "parent" => "post"
    );
    
    public function AltQuery($where = null, $plus = null) {
        $Event = new Event();
        
        return "SELECT {$this->Table}.*,
                {$Event->Table}.title as event
            FROM {$this->Table}
            LEFT OUTER JOIN {$Event->Table}
                ON {$this->Table}.event_id = {$Event->Table}.id
            $where $plus";
    }
}
?>