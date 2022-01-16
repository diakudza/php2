<?php

class Controller {
	
	public $model;
	public $view;
    public $cartCount;

	function __construct()
	{
		$this->view = new View();
        $this->model = new Model();
        $this->cartCount = isset($_SESSION['userid'])?$this->model->cartCount($_SESSION['userid']):0;
        $_SESSION['cartCount'] = $this->cartCount;
	}



	function action_index()
	{

	}
}
