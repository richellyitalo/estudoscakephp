<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\Entity\Traits\SetUrl;

class Pagina extends Entity
{
	use SetUrl;

	protected $_accessible = [
		'titulo' => true,
		'conteudo' => true,
		'url' => true,
		'categoria_id' => true,
		'id' => false
	];
}