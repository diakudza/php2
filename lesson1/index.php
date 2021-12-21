<?php

include 'classes/Techika.class.php';

$array=[
    new WashingMachine('Siemens',"Washing Machine",15,1500,7,2000,true),
    new Phone('Samsung',"mobile phone Galaxy s21",0.11,250.0,5.7,'android',false),
    new phone('Samsung',"mobile phone Galaxy s20",0.12,230.0,6,'TizenOS',false),
    new TV('Samsung','Full HD QLED TV',5 ,1000,65,true,'TizenOS'),
    new phone('Samsung',"mobile phone Galaxy s22",0.12,300.0,6,'android',true),
    new TV('Samsung','Full HD QLED TV11',7 ,1200,75,true,'TizenOS'),
];

foreach ($array as $good){ //создание сортированного массива
   switch ($good->getType()) {
       case 'Phone' :
           $sortArray['Phone'][] = $good;
           break;
       case 'TV' :
           $sortArray['TV'][]= $good;
           break;
       case 'WashingMachine' :
           $sortArray['WashingMachine'][] = $good;
           break;
   }
}

foreach ($sortArray as $type){ //вывод раздела и входящего в него товара
    echo get_class($type[0])."<hr>";
    foreach ($type as $good ){
        $good->view();
        echo'<hr>';
    }
}

