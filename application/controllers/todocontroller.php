<?php

/**
 * @author kauesantos
 *Classe controller todo
 */
class TodoController extends ControllerAction {
	
	/**
	 * Action que lista todo
	 */
	function indexAction() {
		$this->view('title','Lista de TODO');
		$todoModel = new Todo();
		$this->view('todo',$todoModel->selectAll());
	}
	
	/**
	 * Action que exibe informacoes sobre todo
	 */
	function viewAction() {
	   $todoModel =  new Todo();
	   $params = $this->_params();
	   $todo = $todoModel->select($params['id']);
	   $this->view('title',$todo['Todo']['description'].' - Lista de TODO');
	   $this->view('todo',$todo);
	}
	
	/**
	 * Action que adiciona todo
	 */
	function addAction() {
		$todo = $_POST['todo'];
		$this->view('title','Inserindo - Lista de TODO');
		$todoModel = new Todo();
		$todoModel->setDescription($todo['description']);
		$this->view('todo',$todoModel->insert());	
		$this->_redirect("../../../todo/index");
	}
	
	/**
	 * Action que remove todo
	 */
	function deleteAction() {
		$this->view('title','deletando - Lista de TODO');
		$todoModel = new Todo();
		$todoModel->setId($_POST['id']);
		$this->view('todo',$todoModel->delete());
		$this->_redirect("../../../../todo/index");
	}

}
