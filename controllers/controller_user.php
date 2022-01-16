<?php

class Controller_user extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new model_user();
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
                        $_SESSION['userid']=$this->model->userid;
                        $_SESSION['role']=($this->model->isAdminUser($login))?'admin':'user';
                        $this->isAuth = TRUE;
                        header("Location: /");
                       }

                    $this->view->generate('alert', ['pageParam'=>'Нет такой пары']);
                }
        }

        $this->view->generate('login',['userLogin'=>$_SESSION['login']]);

    }

    function action_cabinet()
    {
       $data=$this->model->userLastPages($_SESSION['login']);
       $orders=$this->model->userOrder($_SESSION['userid']);
       $this->view->generate('cabinet', ['userLogin'=>$_SESSION['login'],'pageParam'=>$data,'orders'=>$orders]);
    }

    function action_registration()
    {
        if(isset($_POST['registration'])){

            $res=$this->model->registration($_POST['email']);
            if (!$res) {
                $this->view->generate('alert', ['pageParam'=>'Такой пользователь уже зарегистрирован']);
            }
        }

        $this->view->generate('registration', ['userLogin'=>$_SESSION['login']]);
    }

    function action_logout()
    {

        $this->isAuth = FALSE;
        $login = 'guest';
        $_SESSION['login']=$login;
        header("Location: /user/login");
    }

    function action_makeOrder()
    {
        $data=$this->model->makeOrder($_SESSION['login']);
    }
}
