<?php

    function execQuery($db,$query){
        return mysqli_query($db,$query);
    }

    function showSomeMiniCard($twig,$db,$count,$isAuth = false) {
        $query=execQuery($db,"SELECT * FROM goods limit $count");

        foreach ($query as $item){
            $result[]=productCard($twig,$db,$item['id'],$isAuth);
        }

        return $result;
    }

     function page(){
        if ($_SERVER['REQUEST_URI']==='/') {
            return 'index';
        }
        return explode('/',$_SERVER['REQUEST_URI'])[1];
     }

    function returnAction(){

       $uri=explode('/',$_SERVER['REQUEST_URI']);
       if(isset($uri[2])&&$uri[2]=='action'){
            if (isset($uri[3])) {
              return $uri[3];
           }
           return NULL;
       }


    }

    function productCard ($twig,$db,$id,$isAuth = false) {

        foreach (execQuery($db,"SELECT * FROM goods WHERE id=$id") as $item) {
           $result[]=$twig->render('blocks/product__card.twig',['item'=>$item,'isAuth'=>$isAuth]);
        }

     return $result;
    }

    function userCart($twig,$db,$userid){
        foreach (execQuery($db, "SELECT id_good,id,count FROM cart WHERE userid={$userid}") as $item) {
            $item=mysqli_fetch_assoc(execQuery($db,"SELECT *,c.id as idCart,c.count as countInCart FROM cart c LEFT JOIN goods g ON c.id_good = g.id WHERE g.id={$item['id_good']} AND userid=$userid"));
            $result[] = $twig->render('blocks/cardInCart.twig', ['item'=>$item]);
        }

        return $result;
    }

    function cartSum($db,$userid){
        $totalsum=0;
        foreach (execQuery($db,"SELECT c.count as count,price,c.id
                        FROM cart c
                            LEFT JOIN goods g
                            ON c.id_good = g.id WHERE userid=$userid") as $item){
            $totalsum += $item['price']*$item['count'];
           //
        };
        return $totalsum;
    }


    function whichCollection($collect){
        switch ($collect){
            case 1: return "Women collection";
            case 2: return "Men collection";
            case 3: return "Kids collection";
            case 4: return "Accessories";
        }
    }

    function insertReview($db,$userId,$good_id,$text){

        execQuery($db,"INSERT INTO review (user_id, good_id, text) VALUES ('$userId','$good_id','$text')");
    }

    function getSomeReviews($db,$id,$number=1){

        foreach (execQuery($db,"SELECT r.id_review,u.login,g.title,r.text,r.data FROM review r
            LEFT JOIN user u ON r.user_id = u.idUser
            LEFT JOIN goods g ON r.good_id = g.id WHERE r.good_id=$id") as $item): ?>
            <div class="review">
                <div><?= $item['data'] ?></div><div><?= $item['login'] ?></div><div><?= $item['text'] ?></div>
            </div><br>
        <?php endforeach;
    }

    function getMyOrders($db,$userid){
         foreach (execQuery($db,"SELECT * FROM orderlist WHERE userid=$userid")as $row) {
            $result[]="<tr>
                <td>{$row["idOrder"]}</td>
                <td>{$row["status"]}</td>
                <td>{$row["date"]}</td>
                <td>{$row["comment"]}</td>
            </tr>";
        }
         return $result;
    }
