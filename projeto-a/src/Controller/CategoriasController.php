<?php

namespace App\Controller;

class CategoriasController extends AppController
{
	public function index()
	{
		$this->set('results', $this->Categorias->find()->all());
	}

	public function view($id)
	{
		$result = $this->Categorias->get($id);

		$this->set(compact('result'));
	}

	public function add()
	{
		$categoria = $this->Categorias->newEntity();

		if ($this->request->is('post'))
		{
			$categoria = $this->Categorias->patchEntity($categoria, $this->request->data);

			if ($this->Categorias->save($categoria))
			{
				return $this->redirect('/categorias');
			}
		}

		$this->set( compact('categoria') );
	}
}