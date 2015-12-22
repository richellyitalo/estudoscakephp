<?php

namespace App\Controller;

class WelcomeController extends AppController
{
	public function index()
	{
		$user = $this->Auth->user();
		//$email = $this->Auth->user('email');
		$this->set( compact('user', 'email') );
	}
}