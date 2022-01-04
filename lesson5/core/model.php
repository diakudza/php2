<?php

class Model
{

	public function get_data()
	{

	}

    function showSomeMiniCard($count,$isAuth = false) {
        $db=DB::on()->query("SELECT * FROM goods limit $count");

        foreach ($db as $item){

            $result[]=Ctwig::twig()->render('blocks/product__card.twig',['item'=>$item,'isAuth'=>$isAuth]);
        }

        return $result;
    }

    static function historyAdd($login,$url){
	    if($login!=='guest'){
            $user = DB::on()->query("SELECT * FROM user WHERE login='{$login}'")->fetch(PDO::FETCH_ASSOC);
            $row=DB::on()->query("SELECT * FROM lastpages WHERE idUser='{$user['idUser']}'");
            if($row->rowCount() < 5){
                $db=DB::on()->exec("INSERT INTO `lastpages` (`id`, `idUser`, `lastPages`, `date`) VALUES (NULL, '{$user['idUser']}', '{$url}', CURRENT_TIMESTAMP);"); // Вставляю строку
            }else{
                $db=DB::on()->exec("DELETE FROM lastpages WHERE date NOT IN ( SELECT date FROM( SELECT date FROM lastpages WHERE idUser={$user['idUser']} ORDER by date DESC LIMIT 4 ) x )"); //Удалю старые, кроме последних
            }

	    }
	}
}