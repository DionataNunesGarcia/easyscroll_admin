<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Representantes Controller
 *
 * @property \App\Model\Table\RepresentantesTable $Representantes
 */
class RepresentantesController extends AppController {

    public function pesquisar() {
        if ($this->request->query) {
            $termo = $this->request->query['search'];
        } else {
            $termo = null;
        }
        $entidade = $this->Representantes->listar($termo);
        $this->set('entidade', $this->paginate($entidade));
        $this->set(compact('entidade'));
    }

    public function abrir($id) {
        $this->loadModel('Estados');
        $this->loadModel('Cidades');
        $cidades = $this->Cidades->listar();
        $estados = $this->Estados->listar();

        $entidade = $this->Representantes->buscar($id);
        $this->set(compact('entidade', 'estados', 'cidades'));
    }

    public function incluir() {
        $this->loadModel('Estados');
        $this->loadModel('Cidades');
        $entidade = $this->Representantes->novo();
        $cidades = $this->Cidades->listar();
        $estados = $this->Estados->listar();
        $this->set(compact('entidade', 'estados', 'cidades'));
        $this->render('abrir');
    }

    public function salvar() {

        $id = $this->request->data['id'];
        $dados = $this->request->data;

        try {
            $entidade = $this->Representantes->salvar($dados, $id);
            $this->Flash->sucesso(__('O conteudo foi salvo com sucesso'));
            return $this->redirect(['action' => 'abrir', $entidade->id]);
        } catch (Exception $ex) {
            $this->Flash->erro(__('O conteudo não pôde ser salvo. Por favor, tente novamente.'));
            if ($entidade->id) {
                return $this->redirect(['action' => 'abrir', $entidade->id]);
            } else {
                return $this->redirect(['action' => 'incluir']);
            }
        }
        $this->set(compact('entidade'));
    }

    public function listarCidades() {
        $this->loadModel('Cidades');


        $cidades = $this->Cidades->listarCidadesPorEstados($this->request->query['estadoId']);


        $this->autoRender = false;
        $this->set(compact('cidades'));
        $this->render('listar_cidades_json');
    }

    /**
     * Delete method
     *
     * @param string|null $id Representante id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $representante = $this->Representantes->get($id);
        if ($this->Representantes->delete($representante)) {
            $this->Flash->success(__('The representante has been deleted.'));
        } else {
            $this->Flash->error(__('The representante could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
