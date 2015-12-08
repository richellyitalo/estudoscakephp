<?php

namespace App\Controller;

class CategoriasController extends AppController
{
	public function index()
	{
		$this->set('results', $this->Categorias->find()->all());
	}
}