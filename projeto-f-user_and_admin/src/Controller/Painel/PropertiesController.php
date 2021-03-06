<?php
namespace App\Controller\Painel;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class PropertiesController extends AppController
{

	public function index()
	{
		$properties = $this->Properties->find('all', ['contain' => ['Anuncio', 'Anuncios']]);
		$propertiesAnunciados = $this->Properties->find('anunciado', ['contain' => ['Anuncio', 'Anuncios']]);

		$propertiesNaoAnunciados = $this->Properties->find('naoAnunciado', ['contain' => 'Anuncios']);
		// $propertiesVencidos = $this->Properties->find('vencido', ['contain' => 'Anuncios']);

		$propertiesPendentes = $this->Properties->find('pendentes', ['contain' => ['Anuncios', 'Anuncio']]);
		debug($propertiesAnunciados->toArray()); die();
		$this->set(compact(
			'properties', 'propertiesAnunciados',
			'propertiesNaoAnunciados', 'propertiesVencidos', 'propertiesPendentes'
		));
	}

	public function add()
	{
		$user = TableRegistry::get('Users')->get($this->Auth->user('id'));

		$property = $this->Properties->newEntity();
		if ($this->request->is('post')) {
			$property = $this->Properties->patchEntity($property, $this->request->data);
			$property->user = $user;
			if ($this->Properties->save($property)) {
				$this->Flash->success('Registro salvo com sucesso, selecione o plano que deseja anunciar.');
				return $this->redirect(['controller' => 'Advertisements', 'action' => 'add', $property->id]);
			} else {
				$this->Flash->error('Verifique os dados, e tente novamente.');
			}
		}
		$this->set(compact('property'));
	}

	public function edit($id = null)
	{
		$property = $this->Properties->get($id);
		if ($this->request->is(['put'])) {
			$property = $this->Properties->patchEntity($property, $this->request->data);
			if ($this->Properties->save($property)) {
				$this->Flash->success('Registro salvo com sucesso.');
			} else {
				$this->Flash->error('Verifique os dados, e tente novamente.');
			}
		}
		$this->set(compact('property'));
	}
}