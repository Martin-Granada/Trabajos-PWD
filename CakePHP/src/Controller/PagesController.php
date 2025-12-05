<?php
// src/Controller/PagesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

class PagesController extends AppController
{
    public function display(...$path)
    {
        if (empty($path[0])) {
            return $this->redirect('/');
        }
        
        $page = $subpage = null;
        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));
        
        try {
            $this->render(implode('/', $path));
        } catch (\Cake\View\Exception\MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new \Cake\Http\Exception\NotFoundException();
        }
    }
    
    public function home()
    {
        // Obtener algunos artículos recientes para mostrar en la página de inicio
        $this->loadModel('Articles');
        $recentArticles = $this->Articles->find()
            ->contain(['Tags', 'Users'])
            ->order(['Articles.created' => 'DESC'])
            ->limit(5)
            ->toArray();
        
        $totalArticles = $this->Articles->find()->count();
        
        $this->set(compact('recentArticles', 'totalArticles'));
    }
}

