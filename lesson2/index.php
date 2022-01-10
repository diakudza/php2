<?php

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});


$shugarWeight = new Weight ('Сахар Весовой','Сахар на развес',0.2);
$shugarWeight->view();

$shugarDigit = new Digit('Цифровой сахар',"Сахарок цифровая версия",'',3);
$shugarDigit->view();

$shugarPiece = new Piece('Cахар упакованный',"Упаковка сахара",'',2);
$shugarPiece->view();
