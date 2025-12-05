<?php
// src/Controller/TagsController.php

namespace App\Controller;

class TagsController extends AppController
{
    public function index()
    {
        $tags = $this->Tags->find()->all();
        $this->set(compact('tags'));
    }

    public function view($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Articles'],
        ]);

        $this->set(compact('tag'));
    }

    public function add()
    {
        $tag = $this->Tags->newEmptyEntity();
        if ($this->request->is('post')) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $this->Flash->success('La etiqueta ha sido guardada correctamente.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar la etiqueta. Por favor, intenta de nuevo.');
        }
        $articles = $this->Tags->Articles->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'articles'));
    }

    public function edit($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Articles'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $this->Flash->success('La etiqueta ha sido guardada correctamente.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar la etiqueta. Por favor, intenta de nuevo.');
        }
        $articles = $this->Tags->Articles->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'articles'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tags->get($id);
        if ($this->Tags->delete($tag)) {
            $this->Flash->success('La etiqueta ha sido eliminada correctamente.');
        } else {
            $this->Flash->error('No se pudo eliminar la etiqueta. Por favor, intenta de nuevo.');
        }

        return $this->redirect(['action' => 'index']);
    }
}

