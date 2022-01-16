<?php
session_start();
require 'engine/twig.php';
require 'config/config.php';
require 'engine/function.php';
require 'engine/actions.php';

$cartCount=!empty($_SESSION)?mysqli_num_rows(execQuery($db,"SELECT id FROM cart WHERE userid={$_SESSION['userId']}")):0;

foreach (array_slice(scandir('template'),2) as $pageName){
    $tmp=explode(".",$pageName);
    if ($tmp[0]=='blocks')
        continue;
    $pagesArray[]=$tmp[0];
}

if(isset($_GET) ){

    if(in_array(page(),$pagesArray)){

        switch (page()){
            case 'catalog': {
                $pageParam=showSomeMiniCard($twig,$db,3, isset($_SESSION['userId']));
                break;
            }
            case 'index': {
                $pageParam=showSomeMiniCard($twig,$db,3, isset($_SESSION['userId']));
                break;
            }
            case 'cart': {
                $pageParam=['sum'=> cartSum($db, $_SESSION['userId'])??0,'cart'=>userCart($twig,$db,$_SESSION['userId'])];
                break;

            }
            case 'cabinet': {
                $user = mysqli_fetch_assoc(execQuery($db, "SELECT * FROM user WHERE idUser={$_SESSION['userId']}"));
                $pageParam=['sum'=> cartSum($db, $_SESSION['userId'])??0,'user'=>$user,'orders'=>getMyOrders($db,$_SESSION['userId'])];
                break;
            }
        }

        echo $twig->render('base.twig',
            [   'page'=> page(),
                'template'=>page().'.twig',
                'cartCount'=>$cartCount,
                'userLogin' => $_SESSION['userLogin']??$_SESSION['userLogin']??'',
                'role' => $_SESSION['role']??$_SESSION['role']??'',
                'pageParam' => $pageParam??'',
                'server'=>SERVER_NAME,
            ]);
    }
    else
    {
        echo "404";
        echo $twig->render('base.twig',['page'=> '404',
            'template'=>'404.twig']);
    }

} else {

    $pageParam=showSomeMiniCard($twig,$db,3, isset($_SESSION['userId']));
    echo $twig->render('base.twig',[
        'page'=> 'index',
        'template'=>'index.twig',
        'cartCount'=>$cartCount,
        'userLogin' => $_SESSION['userLogin']??$_SESSION['userLogin']??'',
        'role' => $_SESSION['role']??$_SESSION['role']??'',
        'pageParam' => $pageParam,
    ]);
}


