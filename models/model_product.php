<?php

class Model_Product extends Model

{

    function getGoodById($idGood){
        return DB::on()->query("SELECT * FROM goods WHERE id={$idGood}")->fetch();
    }

    function whichCollection($collect){
        switch ($collect){
            case 1: return "Women collection";
            case 2: return "Men collection";
            case 3: return "Kids collection";
            case 4: return "Accessories";
        }
    }

    function getSomeReviews($id){

        return DB::on()->query("SELECT r.id_review,u.login,g.title,r.text,r.data FROM review r
            LEFT JOIN user u ON r.user_id = u.idUser
            LEFT JOIN goods g ON r.good_id = g.id WHERE r.good_id={$id}")->fetchAll() ;
    }
}
