<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Cache\Cache;

class PaginasController extends AppController
{

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['view']);
	}

	public function view($slug)
	{
		$pagina = Cache::read('pagina_view_' . $slug);

		if ($pagina === false) {
			$pagina = $this->Paginas->getPaginaBySlug($slug);
			Cache::write('pagina_view_' . $slug, $pagina);
		}

		if (!$pagina) {
			throw new NotFoundException();
		}

		$this->set( compact('pagina') );
	}
}