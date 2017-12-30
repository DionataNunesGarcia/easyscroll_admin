<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Home Controller
 *
 * @property \App\Model\Table\HomeTable $Home
 */
class IndexController extends AppController {

   
    /**
     * Index method
     *
     * @return void
     */
    public function index() {
         $this->set('title_for_layout', 'Admin Dashboard');
    }


}
