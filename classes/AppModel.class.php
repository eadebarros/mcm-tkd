<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * AppModel class
 *
 */

class AppModel extends MySql {
    public $FormMode;//Add ou Edit

    /**
     * Build, instancia todas as variaveis declaradas na Array $Fields da classe que extendeu.
     */
    function __construct() {
        if($this->Fields) {
            foreach($this->Fields as $key => $value) {
                $this->$key = null;
                if($value['extra'] === "auto_increment") $this->Id = $key;
                if($value['extra'] === "ref") $this->Ref = $key;
            }
        }
    }
    
    /* funcoes do banco de dados */
    
    /**
     * Select no banco de dados e retorna um object com os dados encontrados
     * @param int/string $id valor unico a ser buscado na tabela; int para id e string para ref
     * @return object $class com os campos da tabela declarados $object->campo
     * @return bool false em caso de nao encontrar registros na tabela
     */
    public function set($id) {
        $where = (is_int($id)) ? $this->Id.' = '.addslashes($id) : $this->Ref.' = \''.addslashes($id).'\'';
        $query = "SELECT * FROM {$this->Table} WHERE $where";
        $result = $this->query($query);
        if($result == true && mysql_num_rows($result) > 0) {
            foreach (mysql_fetch_assoc($result) as $key => $value) {
                $class->$key = $value;                
            }
            return $class;
        } else {
            return false;
        }
    }
    
    /**
     * Select no banco de dados e seta as variaveis da classe $this de acordo com os campos da tabela
     * @param int/string $id valor unico a ser buscado na tabela; int para id e string para ref
     * @return bool true ou false caso encontre ou nao, registros na tabela
     */
    public function get($id) {
        $where = (is_int($id)) ? $this->Table.'.'.$this->Id.' = '.addslashes($id) : $this->Table.'.'.$this->Ref.' = \''.addslashes($id).'\'';
        $where = "WHERE $where";
        if(method_exists($this, "AltQuery")) {
            $query = $this->AltQuery($where);
        } else {
            $query = "SELECT * FROM {$this->Table} $where";
        }
        $result = $this->query($query);
        if($result == true && mysql_num_rows($result) > 0) {
            foreach (mysql_fetch_assoc($result) as $key => $value) {
                $this->$key = $value;                
            }
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Select no banco de dados e retorna um object com os dados encontrados de acordo com o $where informado
     * @param string $where where em SQL a ser buscado na tabela
     * @return object $class com os campos da tabela declarados $object->campo
     * @return bool false em caso de nao encontrar registros na tabela
     */
    public function find($where) {
        if($where) $where = "WHERE $where";
        if(method_exists($this, "AltQuery")) {
            $query = $this->AltQuery($where);
        } else {
            $query = "SELECT * FROM {$this->Table} $where";
        }
        $result = $this->query($query);
        if($result == true && mysql_num_rows($result) > 0) {
            $class = new stdClass();
            foreach (mysql_fetch_assoc($result) as $key => $value) {
                $class->$key = $value;                
            }
            return $class;
        } else {
            return false;
        }
    }
    
    /**
     * Select no banco de dados e retorna um array com objectsdos dados encontrados na tabela
     * @param string $where where em SQL a ser buscado na tabela
     * @param string $plus order by / limit
     * @return array $fetch com os objects preenchidos com os campos da tabela
     * @return bool false em caso de nao encontrar registros na tabela
     */
    public function getAll($where = null, $plus = null) {
        if($where) $where = "WHERE $where";
        if(method_exists($this, "AltQuery")) {
            $query = $this->AltQuery($where, $plus);
        } else {
            $query = "SELECT * FROM {$this->Table} $where $plus";
        }
        $result = $this->query($query);
        if($result == true && mysql_num_rows($result) > 0) {
            $fetch = array();
            while ($rows = mysql_fetch_assoc($result)) {
                $class = new stdClass();
                foreach ($rows as $key => $value) {
                    $class->$key = $value;
                }
                $fetch[] = $class;
            }
            return $fetch;
        } else {
            return false;
        }
    }
    
    /**
     * Insert no banco de dados, insere TODOS os campos definidos na classe salvo campos com o atributo ignore=true
     * @return bool true se a query for executada ou bool false em caso de erro
     */
    public function insert() {
        $query = "INSERT INTO {$this->Table} SET ";
        if($this->Fields) {
            foreach ($this->Fields as $key => $item) {
                if($item['ignore'] != true && $this->$key != "" && $this->$key !== null) {
                    if($first === false) $query .= ", ";
                    $query .= $key." = '".$this->escape($this->$key)."'";
                    $first = false;
                }
            }
        }
        $result = $this->query($query);
        $this->clear();
        return $result;
    }
    
    /**
     * Update no banco de dados, atualiza TODOS os campos definidos na classe salvo campos com o atributo ignore=true
     * @param string $where where em SQL a ser atualizado na tabela
     * @return bool true se a query for executada ou bool false em caso de erro ou de nada ser encontrado
     */
    public function update($where = null) {
        $query = "UPDATE {$this->Table} SET ";
        if($this->Fields) {
            foreach ($this->Fields as $key => $item) {
                if($item['ignore'] != true && $this->$key !== null) {
                    if($first === false) $query .= ", ";
                    $query .= $key." = '".$this->escape($this->$key)."'";
                    $first = false;
                }
            }
        }
        if($where) $query .= " WHERE $where";
        $result = $this->query($query);
        $this->clear();
        if($result === false || (mysql_affected_rows() == 0 && $result === false)) {
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * Delete no banco de dados, remove TODOS as linhas compativeis com o parametro $where
     * @param string $where where em SQL a ser excluido na tabela
     * @return bool true se a query for executada ou bool false em caso de erro ou de nada ser encontrado
     */
    public function delete($where = null) {
        $query = "DELETE FROM {$this->Table}";
        if($where) $query .= " WHERE $where";
        $result = $this->query($query);
        if($result === false || mysql_affected_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Retorna o numero de linhas de acordo com o $where (opcional)
     * @param string $where where em SQL a ser buscado na tabela
     * @return int $count com o numero de linhas encontradas na tabela
     * @return bool false em caso de nao encontrar registros na tabela
     */
    public function count($where = null) {        
        $query = "SELECT COUNT(*) as 'count' FROM {$this->Table}";
        if($where) $query .= " WHERE $where";
        $result = $this->query($query);
        if($result == true) {
            return mysql_result($result, 0, "count");
        } else {
            return false;
        }
    }

    
    /**
     * Select no banco de dados e retorna um array com object dos dados encontrados na tabela
     * @param string $query consulta a ser executada no banco
     * @return array $fetch com os objects preenchidos com os campos da tabela
     * @return bool false em caso de nao encontrar registros na tabela
     */
    public function fetchQuery($query) {
        $result = $this->query($query);
        if($result == true && mysql_num_rows($result) > 0) {
            $fetch = array();
            while ($rows = mysql_fetch_assoc($result)) {
                $class = new stdClass();
                foreach ($rows as $key => $value) {
                    $class->$key = $value;
                }
                $fetch[] = $class;
            }
            return $fetch;
        } else {
            return false;
        }
    }
    
    
    /**
     * Seta todos os campos declarados na classe para null
     * @return null
     */
    public function clear() {
        foreach ($this->Fields as $key => $item) {
            $this->$key = null;
        }
    }
    
    /* funcoes de IDE */
    
    /**
     * Carrega um formulario via post
     * @return null
     */
    public function loadForm() {
        foreach ($this->Fields as $key => $item) {
            if($item['function'] && $this->FormMode == "add") {
                $fn = str_replace('$1', $_POST[$key], $item['function']);
                $this->$key = eval($fn);
            } else
            if($_POST[$key] !== null) {
                $this->$key = $_POST[$key];
            }
        }
    }
    
    /**
     * Cria um input com valores setados na classe
     * @param string $ref nome do campo a ser carregado na classe $this->Fields[$ref]
     * @param array $params array com todos os atributos do campo. Atributos da classe serao sobrescritos
     * @return null; exibe o campo / retorna um erro comentado
     */
    public function input($ref, $params = null) {
        if($this->Fields[$ref]) {
            //atributo principal
            $i['name'] = $ref;
            $i['id'] = strtolower(get_called_class()."-".$ref);
            
            //atributos setados sem a necessidade de tratamento ex.: id="id"
            $commonAttrs = "autocomplete|checked|class|disabled|id|name|maxlength|placeholder|size|style|type|value";
            $validateAttrs = "required|email|integer|onlyLetterNumber";

            //verifica quais atributos ja foram setados anteriormente na classe
            foreach (explode("|", $commonAttrs) as $attr) {
                if(isset($this->Fields[$ref][$attr])) $i[$attr] = $this->Fields[$ref][$attr];
            }
            
            //processa os campos de validacao passados pela classe
            foreach (explode("|", $validateAttrs) as $attr) {
                if(isset($this->Fields[$ref][$attr])) $v[$attr] = $this->Fields[$ref][$attr];
                if($this->Fields[$ref][$attr] === true) $v[$attr] = true;
            }
            
            // se FormMode == "add" e houverem dados no $_POST do navegador, printa os dados no value do input
            // isso evita que o usuario tenha de redigitar todos os dados em caso de erro ao processar o formulario
            // semelhante como os formularios ja estao preenchidos ao disparar o evento javascript:history.back();
            // do navegador
            if($this->FormMode === "add" && !is_null($_POST[$ref])) $i['value'] = $_POST[$ref];
            
            // se FormMode == "edit" e houverem dados no objeto da class, printa os dados no value do input
            if($this->FormMode === "edit" && !is_null($this->$ref)) $i['value'] = $this->$ref;

            //processa todos os paramentos passados pela funcao
            if(is_array($params)) {
                foreach($params as $attr => $value) {
                    if(preg_match("/^($commonAttrs)/i", $attr)) {
                        //atributos globais
                        $i[$attr] = $value;
                    } else
                    if(preg_match("/^($validateAttrs)/i", $attr)) {
                        //atributos para validacao
                        if($value === true) {
                            $v[$attr] = true;
                        } else {
                            unset($v[$attr]);
                        }
                    } else {
                        //atributos de html5 data-* sao passados diretamente
                        if(preg_match("/^data-/i", $attr)) $i[$attr] = $value;
                    }
                }
            }

            //Se $v[$attr] => true transforma para class="validate[$attr]"; sera validado com js posteriormente
            if(is_array($v) && count($v) > 0) {
                $i['class'] .= " validate[";
                $first = true;
                foreach($v as $attr => $val) {
                    if($first === false) $i['class'] .= ",";
                    switch ($attr) {
                        case "email":
                            $i['class'] .= "custom[email]";
                            break;
                        case "onlyLetterNumber":
                            $i['class'] .= "custom[onlyLetterNumber]";
                            break;
                        default:
                            $i['class'] .= $attr;
                            break;
                    }
                    $first = false;
                }
                $i['class'] .= "]";
            }

            //Se os campos forem type=radio|checkbox, o formulario seja 'edit' e o valor do campo $this->$ref corresponder, seta checked="checked"
            if($this->FormMode === "edit" && ($this->$ref === $i['value'] || $_POST[$ref] == $i['value']) && ($i['type'] === "radio" || $i['type'] === "checkbox")) $i['checked'] = "checked";
            
            if($this->FormMode === "add" && ($_POST[$ref] == $i['value']) && ($i['type'] === "radio" || $i['type'] === "checkbox")) $i['checked'] = "checked";
            
            
            // remove os espacos no final e no comeco do atributo classe
            $i['class'] = trim($i['class']);
            
            if(!$i['type']) $i['type'] = "text";
            
            //monta o input com parametros mais relevantes primeiro
            if($i['type'] === "textarea") {
                $input = '<textarea name="'.$i['name'].'" ';

                //remove os parametros relevantes para evitar repeticao
                unset($i['type']);
                unset($i['name']);

                //monta o input
                foreach ($i as $attr => $value) {
                    if($attr !== "value") $input .= $attr.'="'.$value.'" ';
                }
                
                $input .= ">".$i['value']."</textarea>\n";
            } else {
                $input = '<input type="'.$i['type'].'" name="'.$i['name'].'" ';

                //remove os parametros relevantes para evitar repeticao
                unset($i['type']);
                unset($i['name']);

                //monta o input
                foreach ($i as $attr => $value) {
                    $input .= $attr.'="'.$value.'" ';
                }

                $input .= " />\n";
            }
            
            //FUS-RO-DA!
            echo $input;
        } else {
            echo "<!-- error input $ref -->";
        }
    }
}


/* fixes */
if (!function_exists('get_called_class')) {
    function get_called_class () {
        $t = debug_backtrace();
        $t = $t[1];
        if ( isset( $t['object'] ) && $t['object'] instanceof $t['class'] ) return get_class($t['object']);
        return false;
    }
}
?>
