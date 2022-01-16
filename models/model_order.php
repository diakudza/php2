<?php

class Model_Order extends Model

{

function makeOrder ($id) { //Создание заказа
    echo "заказ отправлен в обработку";
  $item=DB::on()->query("SELECT * FROM cart WHERE userid={$id}");

        foreach ($item as $row) {
            DB::on()->exec("INSERT INTO orderlist (`userid`,`cartIdNum`) VALUES ({$id},{$row['id']})");
            DB::on()->exec( "DELETE FROM cart WHERE userid={$id}");
        }
    }
}


