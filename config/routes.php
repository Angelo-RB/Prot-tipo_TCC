<?php

/**
*
* Definição das rotas e seus respectivos controllers e actions
*
*
**/

// rotas normais
$commonRoutes = array(
	'/'                => 'SiteController/index',
	'home'             => 'SiteController/index',
	'location'         => 'SiteController/location',
	'services'         => 'SiteController/services',
	'login'        	   => 'LoginController/index',
	'logout' 		   => 'LoginController/logout',
	'register'         => 'RegisterController/index',

	'scheduling'	   => 'SchedulingController/index',
	'scheduling/user'  => 'SchedulingController/viewPage'
);

// rotas POST
$commonPost = array(
	'registerUser'     => 'RegisterController/registerUser',
	'loginUser'        => 'LoginController/loginUser',
	
	'getEvents'		   => 'SchedulingController/getEvents',

	'addEvent'		   => 'SchedulingController/addEvent',
	'updateEvent'	   => 'SchedulingController/updateEvent',
	'removeEvent'	   => 'SchedulingController/removeEvent'
);

$commonRoutes = array_merge($commonRoutes, $commonPost);

return $commonRoutes;