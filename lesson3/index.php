<?php
require_once 'vendor/autoload.php';
require_once 'config/config.php';
require 'config/img_resize.php';
$imgFullPath=ROOT."/img";




if(!empty($_FILES)){
    var_dump($_FILES);
    $fileName= $_FILES['img']['name'];
    $fileServerName= $_FILES['img']['tmp_name'];
    $fileSize=(int) $_FILES['img']['size'];
    if(copy($fileServerName, "{$imgFullPath}/full/{$fileName}")){
       $dbh->query("INSERT INTO pic (`name`, `size`,`serverpath`) VALUES ('".$fileName."', '".$fileSize."','".$fileServerName."')");
        //mysqli_query($db,"INSERT INTO pic (`name`, `size`,`serverpath`) VALUES ('".$fileName."', '".$fileSize."','".$fileServerName."')") or die('что-то с запросом');


        img_resize("{$imgFullPath}/full/{$_FILES['img']['name']}", "{$imgFullPath}/small/{$_FILES['img']['name']}", 200, 170);
    }
}

function generateGallery($dbh,$dir){
    $i=0;
    $gallery=[];
    $query=$dbh->query('SELECT * FROM pic ORDER BY `counts` DESC');
    foreach ($query as $img){
        ++$i;
        $gallery[]=['id'=>$img['id'],'name'=>$img['name']];
    }
//    echo "<pre>";
//    print_r($gallery);
    return $gallery;
}

try {

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, ['auto_reload' => true,
    'cache' => '/cache',
]);

echo $twig->render('gallery.tmpl', ['items' => generateGallery($db,$imgFullPath)]);

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

