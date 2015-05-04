<?php

/**
 * @author kauesantos
 * Classe responsavel por criar template html da applicacao
 *
 */
class Template
{

    /**
     * Variaveis do template
     * @var unknown
     */
    protected $variables = array();

    /**
     * controle do template
     * @var unknown
     */
    protected $_controller;

    /**
     * action do template
     * @var unknown
     */
    protected $_action;

    /**
     * Metodo construtor
     * @param unknown $route
     */
    function __construct($route)
    {
        $this->_controller = $route['controller'];
        $this->_action = $route['action'];
    }

    
    /**
     * Seta variavel e valor da variavel
     * @param unknown $name
     * @param unknown $value
     */
    function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

   
    /**
     * Inicializa template
     */
    function initialize()
    {
        extract($this->variables);
        
        if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.phtml')) {
            include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.phtml');
        } else {
            include (ROOT . DS . 'application' . DS . 'views' . DS . 'header.phtml');
        }
        
        include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.phtml');
        
        if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.phtml')) {
            include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.phtml');
        } else {
            include (ROOT . DS . 'application' . DS . 'views' . DS . 'footer.phtml');
        }
    }
}
