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

		// Salvar User:Customer
		if ($this->request->is('post')) {
			$user->setUserCliente();
			$user = $this->Users->patchEntity($user, $this->request->data, ['validate' => 'registerCustomer']);
			if ($this->Users->save($user)) {
				$this->Flash->success('Seu registro foi efetuado. <strong>Verifique seu email para ativar sua conta.</strong>');
				return $this->redirect(['action' => 'login']);
			} else {
				$this->Flash->error('Não foi possível realizar o cadastro. <strong>Verifique os dados informados.</strong>');
			}
		}

		$states = $this->Users->States->find('list');
		$stateFirstId = $this->Users->States->find()->first()->id;
		$cities = $this->Users->Cities->find('list')
			->where(['state_id' => $stateFirstId]);
		$this->set(compact('user', 'states', 'cities'));
	}

	public function activate()
	{
		$token = $this->request->query('token');
		$user = $this->Users->findByToken($token)->first();
		if ($user) {
			$user->activateUserCliente();
			$this->Users->save($user);
		}
	}

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['registerCustomer', 'activate']);
	}
}