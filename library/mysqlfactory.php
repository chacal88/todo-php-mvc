<?php

/**
 * @author kauesantos
 * Classe responsavel pela comunicacao com o banco de dados
 */
class MysqlFactory {
    
    protected $_dbHandle;
    protected $_result;

    /**
     * Conecta do banco de dados
     * @param unknown $address
     * @param unknown $account
     * @param unknown $pwd
     * @param unknown $name
     * @return number
     */
    function connect($address, $account, $pwd, $name) {
        $this->_dbHandle = @mysql_connect($address, $account, $pwd);
        if ($this->_dbHandle != 0) {
            if (mysql_select_db($name, $this->_dbHandle)) {
                return 1;
            }
            else {
                return 0;
            }
        }
        else {
            return 0;
        }
    }

    /**
     * Desconecta do banco de dados
     * @return number
     */
    function disconnect() {
        if (@mysql_close($this->_dbHandle) != 0) {
            return 1;
        }  else {
            return 0;
        }
    }
}
