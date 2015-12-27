<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class CategoriasController extends AppController
{

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);

		$this->Auth->allow(['view']);
	}

	public function view($slug = null )
	{
		$categoria = $this->Categorias->getCategoriaBySlug($slug);

		if (!$categoria) {
			throw new NotFoundException();
		}

		$this->set(compact('categoria'));
	}
}