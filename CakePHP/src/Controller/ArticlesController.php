<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $articles = $this->Paginator->paginate(
            $this->Articles->find()->contain(['Tags'])
        );
        $this->set(compact('articles'));
    }

    public function view($slug)
    {
        $article = $this->Articles->findBySlug($slug)->contain(['Tags', 'Users'])->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            $article->user_id = 1;
            if ($this->Articles->save($article)) {
                $this->Flash->success('El artículo ha sido guardado correctamente.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo agregar el artículo. Por favor, intenta de nuevo.');
        }
        $tags = $this->Articles->Tags->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'tags', 'users'));
    }

    public function edit($slug)
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->contain(['Tags'])
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success('El artículo ha sido actualizado correctamente.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo actualizar el artículo. Por favor, intenta de nuevo.');
        }
        $tags = $this->Articles->Tags->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'tags', 'users'));
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        
        if ($this->Articles->delete($article)) {
            $this->Flash->success('El artículo "' . $article->title . '" ha sido eliminado correctamente.');
            return $this->redirect(['action' => 'index']);
        }
    }
}

