<?php

/**
 * @author kauesantos
 * Classe responsavel por exibir erros da applicacao
 *
 */
class Reporting
{

    /**
     * Metodo construtor
     */
    function __construct()
    {
        if (DEVELOPMENT_ENVIRONMENT == true) {
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 'Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
        }
    }
}
