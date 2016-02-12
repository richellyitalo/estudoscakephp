<?php
namespace App\Controller\Painel;

use App\Controller\AppController;

/**
 * Anuncios Controller
 *
 * @property \App\Model\Table\AnunciosTable $Anuncios
 */
class AnunciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $anunciosPendentes = $this->Anuncios->find('pendente', [
            'contain' => ['Properties', 'Plans']
        ]);
        $anunciosEfetuados = $this->Anuncios->find('efetuado', [
            'contain' => ['Properties', 'Plans']
        ]);
        $this->set(compact('anunciosPendentes', 'anunciosEfetuados'));
        // $this->set(compact('anunciosPendentes', 'anunciosEfetuados'));
    }

    /**
     * View method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anuncio = $this->Anuncios->get($id, [
            'contain' => ['Plans']
        ]);

        $this->set('anuncio', $anuncio);
        $this->set('_serialize', ['anuncio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($propertyId = null)
    {
        $anuncio = $this->Anuncios->newEntity();
        if ($this->request->is('post')) {
            $anuncio->property_id = $propertyId;
            $anuncio = $this->Anuncios->patchEntity($anuncio, $this->request->data);
            if ($this->Anuncios->save($anuncio)) {
                $this->Flash->success(__('The anuncio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The anuncio could not be saved. Please, try again.'));
            }
        }

        $property = $this->Anuncios->Properties->get($propertyId);
        $plans = $this->Anuncios->Plans->find('list', ['limit' => 200]);

        $this->set(compact('anuncio', 'plans', 'property'));
        $this->set('_serialize', ['anuncio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anuncio = $this->Anuncios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anuncio = $this->Anuncios->patchEntity($anuncio, $this->request->data);
            if ($this->Anuncios->save($anuncio)) {
                $this->Flash->success(__('The anuncio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The anuncio could not be saved. Please, try again.'));
            }
        }
        $plans = $this->Anuncios->Plans->find('list', ['limit' => 200]);
        $this->set(compact('anuncio', 'plans'));
        $this->set('_serialize', ['anuncio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $anuncio = $this->Anuncios->get($id);
        if ($this->Anuncios->delete($anuncio)) {
            $this->Flash->success(__('The anuncio has been deleted.'));
        } else {
            $this->Flash->error(__('The anuncio could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
