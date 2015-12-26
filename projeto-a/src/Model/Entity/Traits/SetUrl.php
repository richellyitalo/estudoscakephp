<?php

namespace App\Model\Entity\Traits;

use Cake\Utility\Inflector;

trait SetUrl
{
	protected function _setTitulo($titulo)
	{
		/**
		 * Atribuição do título a URL
		 * _setUrl()
		 */
		$this->set('url', $titulo);
		return $titulo;
	}

	protected function _setUrl($url)
	{
		$newUrl = strtolower(Inflector::slug($url));
		return $newUrl;
	}
}