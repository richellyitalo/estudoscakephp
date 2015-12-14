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
}