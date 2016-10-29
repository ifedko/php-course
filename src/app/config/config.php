<?php

$config = [
	'db' => [
		'dsn' => 'mysql:host=localhost;dbname=publications',
		'username' => 'ifedko',
		'password' => 'ifedko'
	],
	'router' => [
		'/' => [
			'controller' => 'IndexController',
			'action' => 'indexAction'
		],
		'/about' => [
			'controller' => 'IndexController',
			'action' => 'aboutAction'
		],
		'/tasks/([a-zA-Z0-9]{1,})/([0-9]{1,})' => [
			'controller' => 'TaskController',
			'action' => 'indexAction',
			'parameters' => ['section', 'task']
		]
	],
	'path_to_views' => '/src/app/tasksApp/view/'
];

return $config;
