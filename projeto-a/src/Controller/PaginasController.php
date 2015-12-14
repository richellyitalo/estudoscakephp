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

	public function add()
	{
		$pagina = $this->Paginas->newEntity();

		if ($this->request->is('post'))
		{
			$pagina = $this->Paginas->patchEntity($pagina, $this->request->data);
			if ($this->Paginas->save($pagina))
			{
				return $this->redirect('/paginas');
			}
		}

		$this->set( compact('pagina') );
	}
}