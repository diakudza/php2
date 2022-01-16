<?php

class Controller_Cart extends Controller
{

	function __construct()
	{
        parent::__construct();
		$this->model = new Model_Cart();

	}
	
	function action_index()
	{
        $data=$this->model->getCart();
        $sum=$this->model->cartSum();
        $this->view->generate('cart',['pageParam'=>$data,'sum'=>$sum,'userLogin'=>$_SESSION['login'],'userid'=>$_SESSION['userid']]);
	}

    function action_add($id)
    {
        return $this->model->addToCart($id);
    }

    function action_remove($id)
    {
        return $this->model->removeFromCart($id);
    }

    function action_clearCart($userId)
    {
        if ($_SESSION['userid'] == $userId) {
            $this->model->clearCart($userId);
        } else {
            $this->view->generate('error', ['pageParam'=>'Ошибка доступа!!!']);
        }
    }
}
