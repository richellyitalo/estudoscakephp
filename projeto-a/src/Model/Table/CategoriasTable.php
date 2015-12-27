<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CategoriasTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehavior('Timestamp');
		$this->hasMany('Paginas');
		$this->displayField('titulo');
	}

	public function getCategoriaBySlug($slug)
	{
		$categoria = $this->find()
			->contain(['Paginas'])
			->where(['Categorias.url' => $slug])
			->first();
		return $categoria;
	}

	public function getMenu()
	{
	    return $this->find()
	    	->select(['titulo', 'url'])
	    	->all();
	}
}