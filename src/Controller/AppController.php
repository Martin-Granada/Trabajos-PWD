<?php
// src/Controller/AppController.php

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        
        // Cargar helpers Html, Form y Text
        $this->viewBuilder()->setHelpers(['Html', 'Form', 'Text']);
    }
}

