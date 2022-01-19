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
        if($_SESSION['role'] == 'admin') {

            $orders = $this->model->getAllIoders();
            $this->view->generate('order', [ 'orders'=>$orders,'userLogin'=>$_SESSION['login']]);
        }else {
            $this->view->generate('alert', ['pageParam'=>'У этого пользователя не достаточно прав !!!']);
        }
	}

    function action_makeOrder()
    {
        if($_SESSION['login'] != 'guest') {
           $this->model->makeOrder($_POST['userid'], $_POST['postadress'],$_POST['totalsum']);

        }
    }

    function action_updateOrder()
    {
        if($_SESSION['role'] == 'admin') {
            $this->model->updateOrder($_POST['status'], $_POST['comment'],$_POST['idOrder']);

        } else {
            $this->view->generate('alert', ['pageParam'=>'У этого пользователя не достаточно прав !!!']);
        }
    }

    function action_deleteOrder()
    {
        if($_SESSION['role'] == 'admin') {
            echo 'action_deleteOrder';
            $this->model->deleteOrder($_POST['idOrder']);

        } else {
            $this->view->generate('alert', ['pageParam'=>'У этого пользователя не достаточно прав !!!']);
        }
    }
}
