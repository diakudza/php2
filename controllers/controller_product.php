<?php

class Controller_Product extends Controller
{
    public $id;

    function __construct($id)
    {
        parent::__construct();
        $this->id=$id;
        $this->model = new Model_Product();

    }

	function action_view()
	{
        $data = $this->model->showSomeMiniCard(3);
        $good = $this->model->getGoodById($this->id);
        $category = $this->model->whichCollection($good['category']);
        $reviews = $this->model->getSomeReviews($this->id);
        $this->view->generate('product', ['pageParam'=>[['cartList'=>$data],['good'=>$good],['category'=>$category],['reviews'=>$reviews]],'userLogin'=>$_SESSION['login']]);
	}
}