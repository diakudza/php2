<?php
/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'root');
define('DB', 'galery');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT . '/public');
$db = mysqli_connect(HOST,USER,PASS,DB) or die('Проблемы с подключением к базе!');

try {
    $dbh = new PDO('mysql:dbname='.DB.';host='.HOST, USER, PASS);
} catch (PDOException $e) {
    echo "Error: Could not connect. " . $e->getMessage();
}
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
