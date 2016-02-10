<?php
namespace App\Controller;

use Cake\Event\Event;

class PropertiesController extends AppController
{
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['index', 'view']);
	}

	public function index()
	{
		$properties = $this->Properties->find('anunciado');
		$this->set(compact('properties'));
	}

	public function view($id = null)
	{
		$property = $this->Properties->get($id);

		$this->set(compact('property'));
	}
}