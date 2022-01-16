<?php

class Controller_Catalog extends Controller
{

	function __construct()
	{
        parent::__construct();
		$this->model = new Model_Catalog();

	}
	
	function action_index()
	{

		$data = $this->model->showSomeMiniCard(3);
		$this->view->generate('catalog',['pageParam'=>$data,'userLogin'=>$_SESSION['login']]);
	}

    function action_more($count)
    {
        $data=$this->model->showSomeMiniCard($count);
       echo implode($data);
    }
}
