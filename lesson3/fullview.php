<?php
require_once 'vendor/autoload.php';
require_once 'config/config.php';

$query=($dbh->query("SELECT * FROM pic WHERE id = {$_GET['id']}"))->fetch(PDO::FETCH_ASSOC);

try {

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, ['auto_reload' => true,
        'cache' => '/cache',
    ]);

    echo $twig->render('fullview.tmpl', ['name' => $query['name'],'size'=>$query['size'],'counts'=>$query['counts']]);

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
