<?php

/**
 * @author kauesantos
 * Classe controller principal da applicação
 */
class ControllerAction
{

    /**
     * Variavel controller, responsavel por definir o controller
     * 
     * @var unknown
     */
    protected $_controller;

    /**
     * variavel action, responsavel por definir a action
     * 
     * @var unknown
     */
    protected $_action;

    /**
     * variavel param, reponsavel por definir os parametros passado pela rota
     * 
     * @var unknown
     */
    protected $_params;

    /**
     * variavel template, responsavel por definir classe template
     * 
     * @var unknown
     */
    protected $_template;

    /**
     * Metodo construtor da classe, recebe Rota com dados do controller, action e params
     * 
     * @param unknown $route            
     */
    function __construct($route)
    {
        $this->_controller = $route['controller'];
        $this->_action = $route['action'];
        $this->_params = $route['params'];
        $this->_template = new Template($route);
    }

    /**
     * Metodo que retorna params
     * 
     * @return unknown
     */
    function _params()
    {
        return $this->_params;
    }

    /**
     * Metodo que é executado antes da Action
     */
    function beforeAction()
    {}

    /**
     * Metodo utilizado para setar variaveis do template, recebe nome e valor da variavel
     * 
     * @param unknown $name            
     * @param unknown $value            
     */
    function view($name, $value)
    {
        $this->_template->set($name, $value);
    }

    /**
     * Metodo utilizado para fazer redirecionamento da pagina, recebe Url de destino
     * 
     * @param unknown $url            
     */
    function _redirect($url)
    {
        header("Location: $url");
    }

    /**
     * Metodo que é executado após Action ser executada.
     */
    function afterAction()
    {}

    function __destruct()
    {
        $this->_template->initialize();
    }
}
