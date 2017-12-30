<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuario Controller
 *
 * @property \App\Model\Table\UsuarioTable $Usuario
 */
class AdminController extends AppController {

    /**
     * Index method
     * Redireciona entrar no login
     * @return void
     */
    public function index() {
        $this->redirect(['controller' => 'Usuario', 'action' => 'entrar']);
    }

}
