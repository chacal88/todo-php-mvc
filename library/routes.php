<?php

/**
 * @author kauesantos
 * Classe responsavel por criar rotas da applicacao
 */
class Routes
{

    /**
     * Metodo construtor
     */
    function __construct()
    {
        global $url;
        global $route;
        
        $queryString = array();
        
        if (isset($url)) {
            $urlArray = array();
            $urlArray = explode("/", $url);
            $route['controller'] = $urlArray[0];
            array_shift($urlArray);
            $route['action'] = $urlArray[0];
            array_shift($urlArray);
            
            $params = array();
            if (isset($urlArray[0]) && isset($urlArray[1]))
                for ($i = 0; $i < count($urlArray); $i = $i + 2) {
                    $params[$urlArray[$i]] = $urlArray[$i + 1];
                }
            $queryString = $urlArray;
            $route['params'] = $params;
        }
        
        $controllerName = ucfirst($route['controller']) . 'Controller';
        
        $dispatch = new $controllerName($route);
        $action = $route['action'] . 'Action';
        
        if ((int) method_exists($controllerName, $action)) {
            call_user_func_array(array(
                $dispatch,
                "beforeAction"
            ), $queryString);
            call_user_func_array(array(
                $dispatch,
                $action
            ), $queryString);
            call_user_func_array(array(
                $dispatch,
                "afterAction"
            ), $queryString);
        }
    }
}
