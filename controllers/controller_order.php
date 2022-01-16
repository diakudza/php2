<?php

class Controller_Order extends Controller
{

	function __construct()
	{
        parent::__construct();
		$this->model = new Model_Order();

	}
	
	function action_index()
	{
        echo 'order';
	}

    function action_makeOrder($id)
    {
        if($_SESSION['login'] != 'guest') {

            $this->model->makeOrder($id);
        }
    }
}
