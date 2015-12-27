<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PaginasTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehavior('Timestamp');
		$this->belongsTo('Categorias');
	}

	public function getPaginaBySlug($slug)
	{
		$query = $this->find()
			->contain(['Categorias'])
			->where([
				'Paginas.url' => $slug
		]);
		$pagina = $query->first();
		return $pagina;
	}

	public function getMenu()
	{
        return $this->find()
        	->select(['titulo', 'url'])
        	->all();
	}
}