<?php

class Controller_user extends Controller
{


    function __construct()
    {
        parent::__construct();
        $this->model = new model_user();
        $this->view = new View();

    }

	function action_index()
	{
        $this->view->generate('cabinet', ['userLogin'=>$this->login]);
	}

    function action_login()
    {

        if(isset($_POST['login'])){
            $login = strip_tags($_POST['login']);
            $pass = strip_tags($_POST['password']);

                if($this->model->isExistUser($login)){
                    if($this->model->isUserPass($login,$pass)){

                        $_SESSION['login']=$login;
                        $this->isAuth = TRUE;
                        header("Location: /");
                       }
                } else {
                    $this->view->generate('loginError');
                }
        }

        $this->view->generate('login',['userLogin'=>$_SESSION['login']]);

    }

    function action_cabinet()
    {
       $data=$this->model->userLastPages($_SESSION['login']);
       $this->view->generate('cabinet', ['userLogin'=>$_SESSION['login'],'pageParam'=>$data]);
    }

    function action_registration()
    {
        $this->view->generate('registration', ['userLogin'=>$_SESSION['login']]);
    }

    function action_logout()
    {

        $this->isAuth = FALSE;
        $login = 'guest';

        $_SESSION['login']=$login;
        header("Location: /user/login");
    }
}
