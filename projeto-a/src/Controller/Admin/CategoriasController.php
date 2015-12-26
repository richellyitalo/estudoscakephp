<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class CategoriasController extends AppController
{
	public function index()
	{
		$results = $this->paginate($this->Categorias);
		$this->set( compact('results') );
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
				return $this->redirect('/admin/categorias');
			}
		}

		$this->set( compact('categoria') );
	}

	public function edit($id)
	{
		$categoria = $this->Categorias->get($id, ['contain' => 'Paginas']);
		$request = $this->request;

		if ($request->is(['post', 'put']) )
		{
			$categoria = $this->Categorias->patchEntity($categoria, $request->data);

			if ($this->Categorias->save($categoria)) {
				return $this->redirect('/admin/categorias');
			}
		}

		$this->set( compact('categoria') );
	}

	public function delete($id)
	{
		$this->request->allowMethod(['get', 'post', 'delete']);

		$categoria = $this->Categorias->get($id);
		$this->Categorias->delete($categoria);

		return $this->redirect('/admin/categorias');
	}
}