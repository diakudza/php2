<?php

class View
{
protected $user = User::class;
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/

	function generate($page, $data = null)
	{

//		if(is_array($data)) {
//						extract($data);
//		}


        echo Ctwig::twig()->render('base.twig',

            [   'page'=>$page,
                'template'=>$page.'.twig',
                //'cartCount'=>$cartCount,
                'userLogin' => $data['userLogin']??$data['userLogin']??FALSE,
                //'role' => $_SESSION['role']??$_SESSION['role']??'',
                'pageParam' => $data['pageParam']??'',
                'server'=>$_SERVER['SERVER_NAME'],
            ]);

	}
}
