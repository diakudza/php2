<?php

class Controller {
	
	public $model;
	public $view;
    public $cartCount;

	function __construct()
	{
		$this->view = new View();
        $this->model = new Model();
        $this->cartCount = $this->model->cartCount($_SESSION['userid']);
        $_SESSION['cartCount'] = $this->cartCount;
	}



	function action_index()
	{

	}
}
