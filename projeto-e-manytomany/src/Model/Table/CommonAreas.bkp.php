<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class CommonAreasTable extends Table
{
	public function initialize(array $config)
	{
		$this->table('areas_properties');
		$this->belongsTo('Areas');
		$this->belongsTo('Properties');
	}
}