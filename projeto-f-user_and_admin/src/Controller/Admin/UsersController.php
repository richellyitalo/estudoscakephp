<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['login']);
	}

	public function login()
	{
		if ($this->request->is('post')) {
	        $user = $this->Auth->identify();
	        if ($user) {
	            $this->Auth->setUser($user);
	            return $this->redirect($this->Auth->redirectUrl());
	        } else {
	            $this->Flash->error('Nome ou senha inválida.', [
	                'key' => 'auth'
	            ]);
	        }
    	}
	}

	public function add()
	{
		$user = $this->Users->newEntity();

		if ($this->request->is(['post'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			$user->setRole('admin');

			if ($this->Users->save($user)) {
				$this->Auth->setUser($user->toArray());
				return $this->redirect($this->Auth->redirectUrl());
			}
		}
		$this->set(compact('user'));
	}
}