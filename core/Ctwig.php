<?php


class Ctwig
{
static function twig(){
    require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('views');
    $twig = new \Twig\Environment($loader);
    return $twig;
}
}