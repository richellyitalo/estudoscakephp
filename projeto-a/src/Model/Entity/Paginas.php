<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Pagina extends Entity
{
	protected $_acessible = [
		'titulo' => true,
		'conteudo' => true,
		'url' => true,
		'categoria_id' => true
	];	
}