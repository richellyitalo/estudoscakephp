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

	public function edit($id)
	{
		$pagina = $this->Paginas->get($id);

		if ($this->request->is(['post', 'put']) )
		{
			$pagina = $this->Paginas->patchENtity($pagina, $this->request->data);
			if ($this->Paginas->save($pagina))
			{
				return $this->redirect('/paginas');
			}

		}
		$this->set( compact('pagina') );
	}
}