<?php
// src/Controller/UsersController.php

namespace App\Controller;

class UsersController extends AppController
{
    public function index()
    {
        $users = $this->Users->find()->all();
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Articles'],
        ]);

        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario ha sido guardado correctamente.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar el usuario. Por favor, intenta de nuevo.');
        }
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario ha sido guardado correctamente.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar el usuario. Por favor, intenta de nuevo.');
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('El usuario ha sido eliminado correctamente.');
        } else {
            $this->Flash->error('No se pudo eliminar el usuario. Por favor, intenta de nuevo.');
        }

        return $this->redirect(['action' => 'index']);
    }
}

