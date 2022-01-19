<?php

class Model
{

	public function get_data()
	{

	}

    function showSomeMiniCard($count) {
	    if(is_string($count)){
            $startPos = explode('.',$count)[1];
            $count = explode('.',$count)[0];

        }else{
	       $startPos = 0;
        }

	    if($startPos==0) {
            $db = DB::on()->query("SELECT * FROM goods limit $count");
        }else{
	        $db = DB::on()->query("SELECT * FROM goods WHERE id >= $startPos and id < $startPos+$count");

        }

        foreach ($db as $item){
            $result[] = Ctwig::twig()->render('blocks/product__card.twig',['item'=>$item,'userLogin'=>$_SESSION['login']]);
        }

        return $result;
    }

    static function historyAdd($login,$url){

	    if($login != 'guest'){
	        if($url == '/404') return;

            $user = DB::on()->query("SELECT * FROM user WHERE login='{$login}'")->fetch();

            $row=DB::on()->query("SELECT * FROM lastpages WHERE idUser='{$user['idUser']}'");
            if($row->rowCount() <= 4){

                $db=DB::on()->exec("INSERT INTO `lastpages` (`idUser`,`lastPages`, `date`) VALUES ('{$user['idUser']}','{$url}', CURRENT_TIMESTAMP);"); // Вставляю строку

            }else{
                DB::on()->exec("DELETE FROM lastPages WHERE idUser='{$user['idUser']}' ORDER by date ASC limit 4");
            }

	    }
	}

    public function cartCount($userid)
    {
        $query=DB::on()->query("SELECT `count` as co FROM cart WHERE userid='{$_SESSION['userid']}'")->fetchAll();
        $count=0;
        foreach ($query as $item){
            $count+=$item['co'];
        }
        return $count;
    }
}