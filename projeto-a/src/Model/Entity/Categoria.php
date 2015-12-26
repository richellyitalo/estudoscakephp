<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\Entity\Traits\SetUrl;

class Categoria extends Entity
{

	use SetUrl;

	protected $_accessible = [
		'titulo' => true,
		'created' => true,
		'modified' => true,
		'id' => false
	];
}