<?php
namespace App\Controller;

use Cake\Event\Event;

class UsersController extends AppController
{
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add', 'logout']);
	}

	public function index()
	{
		$users = $this->Users->find('all');
		$this->set(compact('users'));
	}

	public function view($id)
	{
		$user = $this->Users->get($id);
		$this->set(compact('user'));
	}

	public function add()
	{
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success('Usuário foi salvo.');
				return $this->redirect(['action' => 'add']);
			}
			$this->Flash->error('Não foi possível adicionar usuário.');
		}
		$this->set(compact('user'));
	}

	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Nome de usuário ou senha incorretos.');
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
}