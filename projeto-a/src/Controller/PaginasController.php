<?php
namespace App\Controller;

class PaginasController extends AppController
{
	public function index()
	{
		$this->set('results', $this->Paginas->find()->all());
	}

	public function view($id)
	{
		/*
		metodo com query
		$data = $this->Paginas->find()
			->where(['id' => $id])
			->first();
		*/
		$data = $this->Paginas->get($id);

		$this->set(['result' => $data]);
	}
}