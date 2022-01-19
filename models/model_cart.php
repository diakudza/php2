<?php

class Model_Cart extends Model

{
    public $user;
    public function __construct(){

        $this->user = DB::on()->query("SELECT idUser FROM user WHERE login='{$_SESSION['login']}'")->fetch(PDO::FETCH_ASSOC);
    }
    function getCart(){
           foreach (DB::on()->query("SELECT id_good,id,count FROM cart WHERE userid={$this->user['idUser']}")->fetchAll() as $item) {
               $cart[] = DB::on()->query("SELECT *,c.id as idCart,c.count as countInCart FROM cart c LEFT JOIN goods g ON c.id_good = g.id WHERE g.id={$item['id_good']} AND userid='{$this->user['idUser']}'")->fetch();
           }

    return isset($cart)?$cart:'';
    }


    function cartSum(){
        $totalsum=0;
        $query = DB::on()->query("SELECT c.count as count,price,c.id
                        FROM cart c
                            LEFT JOIN goods g
                            ON c.id_good = g.id WHERE userid='{$this->user['idUser']}' ")->fetchAll();

        foreach ($query as $item){

            $totalsum += $item['price']*$item['count'];
        };

        return $totalsum;
    }

    function addToCart($id){
        $itemCount=DB::on()->query("SELECT * FROM cart WHERE userid='{$this->user['idUser']}' AND id_good='{$id}'")->rowCount();

        if ($itemCount == 0){
            echo "INSERT";
            DB::Insert('cart', ['id_good' => $id,'userid' => $this->user['idUser'] ]);
            return 1;
    }else {
            echo "UPDATE";
            DB::on()->query("UPDATE cart SET count=count+1 WHERE id_good='{$id}' AND userid='{$this->user['idUser']}'");
            return $itemCount;
        }
    }

    function removeFromCart($id){
        echo "REMOVE FROM CART";
        $itemCount=DB::on()->query("SELECT * FROM cart WHERE  id='{$id}'")->fetch();
        echo $itemCount['count'];
        if ($itemCount['count'] <= 1){
            DB::on()->exec("DELETE FROM cart WHERE id={$id}");
        } else {
            DB::on()->exec("UPDATE cart SET count=count-1 WHERE id={$id}");
        }

    }

    function clearCart($userId){
        echo 'Очистка корзины';
        DB::on()->exec("DELETE FROM cart WHERE userid={$userId}");
    }


}
