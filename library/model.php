<?php
/**
 * @author kauesantos
 * Classe model principal
 */
class Model extends MysqlFactory {
	
    /**
     * Model
     * @var unknown
     */
    protected $_model;

	/**
	 * Metodo contrutor
	 */
	function __construct() {

		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model);
	}
	
	/**
	 * Busca todos registros no banco
	 * @return Ambigous <multitype:, array>
	 */
	function selectAll() {
	    $query = 'select * from `'.$this->_table.'`';
	    return $this->query($query);
	}
	
	/**
	 * Busca registro por id
	 * @param unknown $id
	 * @return Ambigous <multitype:, array>
	 */
	function select($id) {
	    $query = 'select * from `'.$this->_table.'` where `id` = \''.mysql_real_escape_string($id).'\'';
	    return $this->query($query, 1);
	}
	
	
	
	
	/**
	 * Executa e organiza a consulta QUERY em um array para retorno
	 * @param unknown $query
	 * @param number $singleResult
	 * @return Ambigous <multitype:, array>|multitype:
	 */
	function query($query, $singleResult = 0) {
	
	    $this->_result = mysql_query($query, $this->_dbHandle);
	
	    if (preg_match("/select/i",$query)) {
	        $result = array();
	        $table = array();
	        $field = array();
	        $tempResults = array();
	        $numOfFields = mysql_num_fields($this->_result);
	        for ($i = 0; $i < $numOfFields; ++$i) {
	            array_push($table,mysql_field_table($this->_result, $i));
	            array_push($field,mysql_field_name($this->_result, $i));
	        }
	        while ($row = mysql_fetch_row($this->_result)) {
	            for ($i = 0;$i < $numOfFields; ++$i) {
	                $table[$i] = trim(ucfirst($table[$i]),"s");
	                $tempResults[$table[$i]][$field[$i]] = $row[$i];
	            }
	            if ($singleResult == 1) {
	                mysql_free_result($this->_result);
	                return $tempResults;
	            }
	            array_push($result,$tempResults);
	        }
	        mysql_free_result($this->_result);
	        return($result);
	    }
	}
	
	/**
	 * Retorna quantidade de registros
	 * @return int
	 */
	function getNumRows() {
	    return mysql_num_rows($this->_result);
	}
	
	function __destruct() {
	}
}
