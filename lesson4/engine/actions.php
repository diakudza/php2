<?php

if(returnAction()){
    $idForAction=!empty($_GET['idForAction'])?trim(strip_tags($_GET['idForAction'])):NULL;
    $userid=!empty($_SESSION['userId'])?(int)trim(strip_tags($_SESSION['userId'])):NULL;

    switch (returnAction()){
        case 'addToCart':
            if(mysqli_num_rows(execQuery($db,"SELECT * FROM cart WHERE id_good=$idForAction AND userid={$_SESSION['userId']}"))==0){
                echo "INSERT";
                execQuery($db,"INSERT INTO cart (`id_good`,`userid`) VALUES ($idForAction,$userid)");
            }else{
                echo "UPDATE";
                execQuery($db,"UPDATE cart SET count=count+1 WHERE id_good=$idForAction AND userid=$userid");
            }
            break;

        case 'removeFromBAsket':
            execQuery($db,"DELETE FROM cart WHERE id=$idForAction") or die('Ошибка удаления товара');
            break;

        case 'makeOrder':
            execQuery($db,"DELETE FROM cart WHERE id=$idForAction") or die('Ошибка удаления товара');
            break;

        case 'moreGoods':

            $pageParam=showSomeMiniCard($twig,$db,$_POST['count'], isset($_SESSION['userId']));
            echo $twig->render('blocks/product__list.twig', ['pageParam' => $pageParam??'']);
            die();
        break;


        case 'clearCart':
            execQuery($db,"DELETE FROM cart") or die('Ошибка очистки корзины');
            break;

        case 'logout':
            $_SESSION=[];
            header("Location: /login");
            break;

        case 'delOrder':
            execQuery($db,"DELETE FROM orderlist WHERE idOrder={$_GET['idOrder']}") or die('Ошибка удаления заказа');
            break;

    }
}


if(!empty($_POST)) {
    //Вставка комментариев
    if (isset($_POST['reviewform'])) {
        insertReview($db, $userid, $_POST['good_id'], $_POST['reviewtext']);
    }
    //Авторизация
    if (isset($_POST['loginButton']) && !empty($_POST['login'])) {
        //var_dump($_POST);
        $login = trim(strip_tags($_POST['login']));
        $password = trim(strip_tags(htmlspecialchars($_POST['password'])));
        $result = mysqli_fetch_array(execQuery($db, "SELECT * FROM user WHERE login='$login'"));

        if ($login === $result['login'] && $result['pass'] === md5($password)) {
            session_start();
            $_SESSION['userLogin'] = $result['login'];
            $_SESSION['userId'] = $result['idUser'];
            $_SESSION['role'] = $result['role'];
            if ($_SESSION['role'] == 'admin') {
                header("Location: /order");
            } else {
                header("Location: /cabinet");
            }
        } else {
            echo "Нет такой пары ";
        }


    }

    //Создание заказа
    if (isset($_POST['orderMake'])) {
        foreach (execQuery($db, "SELECT * FROM cart WHERE userid={$_SESSION['userId']}") as $row) {

            execQuery($db, "INSERT INTO orderlist (`userid`,`cartIdNum`) VALUES ({$_SESSION['userId']},{$row['id']})");
            execQuery($db, "DELETE FROM cart WHERE userid={$_SESSION['userId']}");
            header("Location: index.php?page=cabinet");
        }
    }

    if (isset($_POST['orderUpdate'])) {
        var_dump($_POST);
        execQuery($db,"UPDATE orderlist SET status='{$_POST['status']}', comment='{$_POST['comment']}' WHERE idOrder={$_POST['idOrder']} ") or die ("no no");
    }

    //Регистрация
    if (isset($_POST['registration'])){
        $login = htmlspecialchars($_POST['email']);

        if (mysqli_num_rows(execQuery($db, "SELECT login FROM user WHERE login='$login'")) == 1) {
            echo "Такой пользователь уже зарегистрирован<br>";
        } else {
            $password = md5(htmlspecialchars($_POST['password']));
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $sex = htmlspecialchars($_POST['sex']);

            execQuery($db,
                "INSERT INTO user (`login`,`pass`,`firstname`,`lastname`,`sex`) 
                VALUES ('$login','$password','$firstname','$lastname','$sex')"
            ) or die(mysqli_error());
            header("Location: index.php?page=login");
        }

    }
}
unset($_POST);