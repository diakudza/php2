<?php

class Model_Order extends Model

{

    function makeOrder ($id,$adress,$totalsum) { //Создание заказа

      $adress = strip_tags($adress);

      $item=DB::on()->query("SELECT * FROM cart WHERE userid={$id}");

            foreach ($item as $row) {

                DB::on()->exec("INSERT INTO orderlist (`userid`,`cartIdNum`,`adress`,`sum`) VALUES ({$id} , {$row['id']} , '{$adress}', '{$totalsum}')");
                DB::on()->exec( "DELETE FROM cart WHERE userid={$id}");
            }

        }
    function getAllIoders (){
        return DB::on()->query("SELECT idOrder, date, status, comment, cartIdNum, login,sum,adress FROM orderlist
    
                LEFT JOIN user u on u.idUser = orderlist.userid");

    }

    function updateOrder($status,$comment,$idOrder){
        DB::on()->query("UPDATE orderlist SET status='{$status}',comment='{$comment}' WHERE idOrder='{$idOrder}'");
    }

    function deleteOrder($idOrder){
        DB::on()->query("DELETE FROM orderlist WHERE idOrder='{$idOrder}'");
    }


}


