<?php
namespace App\Controller\Painel;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Collection\Collection;

class DashboardController extends AppController
{
	private $_userModel;
	private $_userId;

	public function initialize()
	{
		parent::initialize();
		$this->_userModel = TableRegistry::get('users');
		$_userId = $this->Auth->user('id');
	}

	// private function _user()
	// {
	// 	$_user = TableRegistry::get('users')->get( $this->Auth->user('id'), ['contain' => ['Properties']] );
	// 	return $_user;
	// }

	public function index()
	{
		$properties = $this->_userModel->Properties->find('all');
		$this->set(compact('properties'));
	}
}