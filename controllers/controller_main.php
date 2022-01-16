<?php

class Controller_Main extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Main();
    }


	function action_index()
	{
        $data = $this->model->showSomeMiniCard(3);
		$this->view->generate('index', ['pageParam'=>$data,'userLogin'=>$_SESSION['login']]);
	}
}