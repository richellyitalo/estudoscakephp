<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => ['controller' => 'Dashboard', 'action' => 'index'],
            'authenticate' => [
                'form' => [
                    'fields' => ['username' => 'email']
                ]
            ]
        ]);
    }

    private function _setVariables()
    {
        $authUser = $this->Auth->user();
        $this->set(compact('authUser'));
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        $this->_setVariables();

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        // Autorização para admin
        if ($this->Auth->user() && ($this->_getPrefix() == 'admin' and $this->Auth->user('role') != 'admin')){
            throw new NotFoundException("Página não encontrada");
        }

        $this->_setAuthFinder();

        // if ($this->Auth->user('role') == 'cliente') {
        //     $this->Auth->config('loginRedirect', ['prefix' => 'painel', 'controller' => 'Dashboard', 'action' => 'index']);
        // }
    }

    /**
     * Define o finder do formulário de login para as respectivas áreas (/painel, /admin)
     */
    private function _setAuthFinder()
    {
        // Área do cliente
        if ($this->_getPrefix() == 'painel') {
            $this->Auth->config('authenticate', ['form' => ['finder' => 'authCliente']]);
        // Administradores ou moderadores
        } elseif ($this->_getPrefix() == 'admin') {
            $this->Auth->config('authenticate', ['form' => ['finder' => 'authAdmin']]);
        }
    }

    private function _getPrefix()
    {
        if (isset($this->request->params['prefix'])) {
            return $this->request->params['prefix'];
        }
        return false;
    }
}
