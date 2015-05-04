<?php
/**
 * Classe Botstrap responsavel por inicializar aplicação
 */
 
require_once (ROOT . DS . 'config' . DS . 'config.php');
require_once (ROOT . DS . 'config' . DS . 'routing.php');
require_once (ROOT . DS . 'library' . DS . 'reporting.php');
require_once (ROOT . DS . 'library' . DS . 'clean.php');
require_once (ROOT . DS . 'library' . DS . 'routes.php');

new Reporting();
new Clean();
new Routes();

function __autoload($className)
{
    if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.php')) {
        require_once (ROOT . DS . 'library' . DS . strtolower($className) . '.php');
    } else 
        if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
            require_once (ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
        } else 
            if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
                require_once (ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
            }
}