<?php
use Cake\Routing\Router;

Router::plugin(
    'Admin',
    ['path' => '/admin'],
    function ($routes) {
    	$routes->connect('/', [
			'plugin' => 'Admin',
			'controller' => 'Admin',
			'action' => 'index'
		]);

        $routes->connect('/register', [
            'plugin' => 'Admin',
            'controller' => 'Users',
            'action' => 'registerCustomer'
        ]);
        $routes->connect('/ativar', [
            'controller' => 'Users',
            'action' => 'activate'
        ]);

        $routes->fallbacks('DashedRoute');
    }
);
