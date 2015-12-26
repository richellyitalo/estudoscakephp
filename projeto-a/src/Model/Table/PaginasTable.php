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
}