<?php
require_once 'vendor/autoload.php';
require_once 'classes/File.php';
require_once 'classes/DB.php';
require_once 'classes/Gallery.php';
require_once 'config/config.php';
require 'config/img_resize.php';
$imgFullPath=ROOT."/img";

if(!empty($_FILES)){
	$img=new File($_FILES);
	echo $img->getTmpname();
if(move_uploaded_file("{$img->getTmpname()}", "{$imgFullPath}/full/{$img->getName()}")){
       $dbh->query("INSERT INTO pic (`name`, `size`,`serverpath`) VALUES ('".$img->getName()."', '".$img->getSize()."','".$img->getTmpname()."')");
       img_resize("{$imgFullPath}/full/{$img->getName}", "{$imgFullPath}/small/{$img->getName}", 200, 170);
   }
}

try {

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, ['auto_reload' => true,'cache' => '/cache',]);

    echo $twig->render('gallery.tmpl', ['items' => Gallery::generate($dbh,$imgFullPath)]);

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

