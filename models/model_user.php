<?php
class model_user extends Model
{
    protected $isAuth = FALSE;
    public $userid = '';

    function isAdminUser($login){ //проверяет пользователя на роль
        $q=DB::on()->query("SELECT role FROM user WHERE login='{$login}'")->fetch();
        return ($q['role']=='admin')?true:false;
    }


    function isExistUser($login){ //существует ли пользователь в базе
        $q=DB::on()->query("SELECT login FROM user WHERE login='{$login}'")->rowCount();
        return $q;
    }

    function isUserPass($login,$pass) { //проверка логи и пароля

        $serverUserPass = DB::on()->query("SELECT * FROM user WHERE login='{$login}'")->fetch(PDO::FETCH_ASSOC);

        if (md5($pass) == $serverUserPass['pass']) {
            $this->login = $login;
            $this->isAuth = true;
            $this->userid = $serverUserPass['idUser'];
            return true;
        } else {
            return false;
        }
    }

    function userLastPages($login){
        $user=DB::on()->query("SELECT * FROM user WHERE login='{$login}'")->fetch(PDO::FETCH_ASSOC);
        return DB::on()->query("SELECT * FROM lastpages WHERE idUser='{$user['idUser']}'")->fetchAll();
    }

    function registration($login){

        if (DB::on()->query("SELECT login FROM user WHERE login='{$login}'")->rowCount() == 1) {
             return false;
        } else {

            DB::Insert('user',
                [
                    'sex' => $_POST['sex'],
                    'lastname' => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'login' => $_POST['email'],
                    'pass' => md5($_POST['password'])
                ]);

            header('Location: /user/login ');
        }
    }

    function userOrder($id){
        return DB::on()->query("SELECT * FROM orderlist WHERE userid='{$id}'")->fetchAll();
    }
}