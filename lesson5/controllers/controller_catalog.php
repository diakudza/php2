<?php

class Controller_Catalog
    extends Controller
{

	function __construct()
	{
        parent::__construct();
		$this->model = new Model_Catalog();
		$this->view = new View();
	}
	
	function action_index()
	{

		$data = $this->model->showSomeMiniCard(6);
		$this->view->generate('catalog',['pageParam'=>$data,'userLogin'=>$_SESSION['login']]);
	}
}
