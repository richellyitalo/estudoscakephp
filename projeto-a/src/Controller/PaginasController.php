<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class PaginasController extends AppController
{

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['view']);
	}

	public function view($slug)
	{
		$query = $this->Paginas->find()
			->contain(['Categorias'])
			->where([
				'Paginas.url' => $slug
		]);
		$pagina = $query->first();

		$paginas = $this->Paginas->find()
			->select(['titulo', 'url'])
			->all();

		if (!$pagina) {
			throw new NotFoundException();
		}

		$this->set( compact('pagina', 'paginas') );
	}
}