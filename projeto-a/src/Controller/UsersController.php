<?php

namespace App\Controller;

class UsersController extends AppController
{
	public function index()
	{
		$results = $this->Users->find()->all();

		$this->set( compact('results') );
	}

	public function view($id)
	{
		$user = $this->Users->get($id);

		$this->set( compact('user') );
	}

	public function add()
	{
		$user = $this->Users->newEntity();

		// Salvar o objeto
		if ($this->request->is(['post']))
		{
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user))
			{
				return $this->redirect('/users');
			}
		}

		$this->set( compact('user') );
	}

	public function edit($id)
	{
		$user = $this->Users->get($id);

		// Update de objeto
		if ($this->request->is(['post', 'put']))
		{
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user))
			{
				return $this->redirect('/users');
			}
		}

		$this->set( compact('user') );
	}

	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);

		$user = $this->Users->get($id);
		$this->Users->delete($user);

		return $this->redirect('/users');
	}

	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
		}
	}

	public function logout()
	{
		return $this->redirect( $this->Auth->logout() );
	}
}