<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paginas Controller
 *
 * @property \App\Model\Table\PaginasTable $Paginas
 */
class PaginasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categorias']
        ];
        $this->set('paginas', $this->paginate($this->Paginas));
        $this->set('_serialize', ['paginas']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagina id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagina = $this->Paginas->get($id, [
            'contain' => ['Categorias']
        ]);
        $this->set('pagina', $pagina);
        $this->set('_serialize', ['pagina']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagina = $this->Paginas->newEntity();
        if ($this->request->is('post')) {
            $pagina = $this->Paginas->patchEntity($pagina, $this->request->data);
            if ($this->Paginas->save($pagina)) {
                $this->Flash->success(__('The pagina has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pagina could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Paginas->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('pagina', 'categorias'));
        $this->set('_serialize', ['pagina']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagina id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagina = $this->Paginas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagina = $this->Paginas->patchEntity($pagina, $this->request->data);
            if ($this->Paginas->save($pagina)) {
                $this->Flash->success(__('The pagina has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pagina could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Paginas->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('pagina', 'categorias'));
        $this->set('_serialize', ['pagina']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagina id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagina = $this->Paginas->get($id);
        if ($this->Paginas->delete($pagina)) {
            $this->Flash->success(__('The pagina has been deleted.'));
        } else {
            $this->Flash->error(__('The pagina could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
