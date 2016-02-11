<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class AdvertisementsHistoricController extends AppController
{
	public function index()
	{
		$advertisementsPending = $this->AdvertisementsHistoric->find('pending', [
			'contain' => ['Plans', 'Advertisements.Properties']
		]);
		$advertisementsAccomplished = $this->AdvertisementsHistoric->find('accomplished', [
			'contain' => ['Plans', 'Advertisements.Properties']
		]);

		$this->set(compact(
			'advertisementsPending', 'advertisementsAccomplished'
			)
		);
	}

	public function iniciado($id = null)
	{
		$advertisementsHistoric  = $this->AdvertisementsHistoric->get($id);
		$advertisementsHistoric->status = 0;
		if ($this->AdvertisementsHistoric->save($advertisementsHistoric) ) {
			$this->Flash->success('Status da pendendência alterado para iniciado.');
			return $this->redirect(['action' => 'index']);
		} else {
			$this->Flash->success('Não foi possível realizar ação.');
		}
	}
    
	public function pago($id = null)
	{
		$advertisementsHistoric  = $this->AdvertisementsHistoric->get($id);
		$advertisementsHistoric->status = $advertisementsHistoric::PAGO;

		if ($this->AdvertisementsHistoric->save($advertisementsHistoric) ) {
			$this->Flash->success('Status da pendendência pago.');
			return $this->redirect(['action' => 'index']);
		} else {
			$this->Flash->success('Não foi possível realizar ação.');
		}
	}
    
	public function pendente($id = null)
	{
		$advertisementsHistoric  = $this->AdvertisementsHistoric->get($id);
		$advertisementsHistoric->status = $advertisementsHistoric::PENDENTE;

		if ($this->AdvertisementsHistoric->save($advertisementsHistoric) ) {
			$this->Flash->success('Status da agora em pendendência.');
			return $this->redirect(['action' => 'index']);
		} else {
			$this->Flash->success('Não foi possível realizar ação.');
		}
	}
}