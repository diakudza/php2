<?php
class model_user extends Model
{
    protected $isAuth = FALSE;


    function isExistUser($login){ //существует ли пользователь в базе
        $q=DB::on()->query("SELECT login FROM user WHERE login='{$login}'")->rowCount();
        return $q;
    }

    function isUserPass($login,$pass) { //проверка логи и пароля

        $serverUserPass = DB::on()->query("SELECT pass FROM user WHERE login='{$login}'")->fetch(PDO::FETCH_ASSOC);

        if (md5($pass) == $serverUserPass['pass']) {
            $this->login = $login;
            $this->isAuth= true;
            return true;
        } else {
            return false;
        }
    }

    function userLastPages($login){ //существует ли пользователь в базе
        $user=DB::on()->query("SELECT * FROM user WHERE login='{$login}'")->fetch(PDO::FETCH_ASSOC);
        return DB::on()->query("SELECT * FROM lastpages WHERE idUser='{$user['idUser']}'")->fetchAll();
    }

}