<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Usuario Controller
 *
 * @property \App\Model\Table\UsuarioTable $Usuario
 */
class UsuarioController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Auth->allow(['entrar']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function pesquisar() {
        $this->paginate = [
            'limit' => 10,
            'conditions' => ['and' => [
                    'Usuario.nome like' => '%' . $this->request->query('search') . '%',
                ]],
            'order' => ['Usuario.nome' => 'ASC']
        ];
        $this->set('entidade', $this->paginate($this->Usuario));
        $this->set('_serialize', ['entidade']);
    }

    public function abrir($id) {
        $entidade = $this->Usuario->buscar($id);
        $this->set(compact('entidade'));
    }

    public function incluir() {
        $entidade = $this->Usuario->novo();
        $this->set(compact('entidade'));
        $this->render('abrir');
    }

    public function salvar() {

        $id = $this->request->data['id'];
        $dados = $this->request->data;

        try {
            $entidade = $this->Usuario->salvar($dados, $id);
            $this->Flash->sucesso(__('O conteudo foi salvo com sucesso'));
            return $this->redirect(['action' => 'abrir', $entidade->id]);
        } catch (Exception $ex) {
            $this->Flash->erro(__('O conteudo não pôde ser salvo. Por favor, tente novamente.'));
            return $this->redirect(['action' => 'abrir']);
        }
        $this->set(compact('entidade'));
    }

    public function entrar() {
        if ($this->request->is('post')) {
            $usuario = $this->Auth->identify();
            if ($usuario) {
                $this->Auth->setUser($usuario);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Seu usuario ou sua senha está incorreta.');
        }
    }

    public function sair() {
        $this->Flash->success('Você saiu do sistema.');
        return $this->redirect($this->Auth->logout());
    }

}
