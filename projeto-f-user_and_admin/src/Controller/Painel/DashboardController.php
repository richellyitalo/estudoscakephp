<?php
namespace App\Controller\Painel;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Collection\Collection;

class DashboardController extends AppController
{
	private $_user;

	public function initialize()
	{
		parent::initialize();
		$this->_user = TableRegistry::get('users')->get( $this->Auth->user('id'), ['contain' => ['Properties']] );
	}

	// private function _user()
	// {
	// 	$_user = TableRegistry::get('users')->get( $this->Auth->user('id'), ['contain' => ['Properties']] );
	// 	return $_user;
	// }

	public function index()
	{
		$properties = $this->_user->properties;
		$properties = new Collection($properties);

		$this->set(compact('properties'));
	}
}