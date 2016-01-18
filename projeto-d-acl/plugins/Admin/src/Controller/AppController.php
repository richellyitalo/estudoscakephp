<?php

namespace Admin\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Auth', [
			'loginAction' => [
				'controller' => 'Users',
				'action' => 'login',
				'plugin' => 'Admin'
			],
            'loginRedirect' => '/admin',
			'authError' => 'Você precisar estar logado como administrador para acessar essa área.',
			'authenticate' => [
				'Form' => ['username' => 'email', 'finder' => 'active']
			]
		]);
	}
}
