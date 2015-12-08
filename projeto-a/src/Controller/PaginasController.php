<?php
namespace App\Controller;

class PaginasController extends AppController
{
	public function index()
	{
		$this->set('results', $this->Paginas->find()->all());
	}
}