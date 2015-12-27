<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

class PaginasController extends AppController
{
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['index']);
	}

	public function index()
	{
		/*
		$this->paginate = [
			'limit' => 2
		];*/
		$results = $this->paginate($this->Paginas->find('all')->contain(['Categorias']));

		//$results = $this->Paginas->find()->all();

		$this->set( compact('results') );
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
				return $this->redirect(['action' => 'index']);
			}
		}
		$categorias = $this->Paginas->Categorias->find('list', ['limit' => 200]);
		$this->set( compact('pagina', 'categorias') );
	}

	public function edit($id)
	{
		$pagina = $this->Paginas->get($id);

		if ($this->request->is(['post', 'put']) )
		{
			$pagina = $this->Paginas->patchEntity($pagina, $this->request->data);
			if ($this->Paginas->save($pagina))
			{
				return $this->redirect(['action' => 'index']);
			}

		}
		$categorias = $this->Paginas->Categorias->find('list', ['limit' => 200]);
		$this->set( compact('pagina', 'categorias') );
	}

	public function delete($id)
	{
		$this->request->allowMethod(['get', 'post', 'delete']);

		$pagina = $this->Paginas->get($id);
		$this->Paginas->delete($pagina);

		return $this->redirect('/admin/paginas');
	}
}