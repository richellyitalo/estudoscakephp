<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class AdvertisementsPendingController extends AppController
{
	public function index()
	{
		$advertisementsPending = $this->AdvertisementsPending->find('all', ['contain' => ['Plans', 'Advertisements.Properties']]);
		
		$this->set(compact('advertisementsPending'));
	}
}