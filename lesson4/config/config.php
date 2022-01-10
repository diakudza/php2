<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'root');
define('DB', 'phpgb');
define('SERVER_NAME',$_SERVER['SERVER_NAME']);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT . 'public');

$db = mysqli_connect(HOST, USER, PASS, DB) or die('Проблемы с подключением к базе!');
mysqli_query($db, "set character_set_results='utf8'");
mysqli_query($db, "SET CHARACTER SET 'utf8';");
mysqli_query($db, "set collation_connection='utf8_general_ci'");
