<?php
namespace App\Controller;

class ArticlesController extends AppController
{
	public function index()
	{
		$articles = $this->Articles->find('all');
		$this->set(compact('articles'));
	}

	public function view($id = null)
	{
		$article = $this->Articles->get($id);
		$this->set(compact('article'));
	}

	/**
	 * Exibe o formulário de cadastro como também insere no banco
	 * quando enviado request.
	 */
	public function add()
	{
		$article = $this->Articles->newEntity();

		/**
		 * Ação de salvar
		 */
		if ($this->request->is('post')) {
			$article = $this->Articles->patchEntity($article, $this->request->data);
			if ($this->Articles->save($article)) {
				$this->Flash->success('Artigo cadastrado com sucesso.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Não foi possível salvar o Artigo.');
		}
		$this->set(compact('article'));
	}

	/**
	 * Exibe formulário de edição e trata o request de update.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id = null )
	{
		$article = $this->Articles->get($id);
		if ($this->request->is(['post', 'put'])) {
			$article = $this->Articles->patchEntity($article, $this->request->data);
			if ($this->Articles->save($article)) {
				$this->Flash->success('Seu artigo foi atualizado.');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Não foi possível atualizar artigo.');
		}
		$this->set(compact('article'));
	}

	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);

		$article = $this->Articles->get($id);
		if ($this->Articles->delete($article)) {
			$this->Flash->success(__('O artigo com id: {0} foi deletado com sucesso.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}