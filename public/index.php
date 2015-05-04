<?php	
/**
 * Projeto Baseado no Artigo 
 * Write your own PHP MVC Framework - BY ANANT GARG
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$url = $_GET['url'];

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
