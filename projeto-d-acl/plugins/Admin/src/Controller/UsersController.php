<?php
namespace Admin\Controller;

use Cake\Event\Event;

class UsersController extends AppController
{
	/**
	 * Autenticação de usuário para painel /admin
	 */
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Flash->error('Email ou senha incorretos!', ['key' => 'auth']);
			}
		}
	}

	/**
	 * Registro de usuário do tipo cliente = role:2
	 */
	public function registerCustomer()
	{
		$user = $this->Users->newEntity();

		$states = $this->Users->States->find('list');
		$cities = $this->Users->Cities->find('list')
			->where(['state_id' => 1]);
		$this->set(compact('user', 'states', 'cities'));
	}

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow('registerCustomer');
	}
}