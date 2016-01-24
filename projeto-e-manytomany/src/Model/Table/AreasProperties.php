<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class AreasPropertiesTable extends Table
{
	public function initialize(array $config)
	{
		$this->belongsTo('Properties');
		$this->belongsTo('Areas');
	}

	public function beforeSave($event, $entity, $config)
	{
		debug($entity);
		die();
	}
}