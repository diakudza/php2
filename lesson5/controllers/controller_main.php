<?php

class Controller_Main extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Main();
        $this->view = new View();
    }


	function action_index()
	{
        //User::getInstance()->getLogin();
	    $data = $this->model->showSomeMiniCard(3);
		$this->view->generate('index', ['pageParam'=>$data,'userLogin'=>$_SESSION['login']]);
	}
}