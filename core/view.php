<?php

class View
{

	function generate($page, $data = null)
	{

//		if(is_array($data)) {
//						extract($data);
//		}

        echo Ctwig::twig()->render('base.twig',

            [   'page' => $page,
                'template' => $page.'.twig',
                'cartCount' => $_SESSION['cartCount'],
                'userLogin' => $data['userLogin']??$data['userLogin']??'guest',
                'role' => $_SESSION['role'],
                'pageParam' => $data['pageParam']??'',
                'server' => $_SERVER['SERVER_NAME'],
                'data' => $data,
            ]);

	}
}
