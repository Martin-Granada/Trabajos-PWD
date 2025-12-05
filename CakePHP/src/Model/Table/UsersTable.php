<?php
// src/Model/Table/UsersTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;
use Cake\Utility\Security;
use Cake\Datasource\EntityInterface;
use ArrayObject;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        
        // Configurar displayField para find('list')
        $this->setDisplayField('email');
        
        // Configurar relación one-to-many con Articles
        $this->hasMany('Articles');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'Este correo electrónico ya existe'
            ])
            ->requirePresence('password', 'create')
            ->notEmptyString('password')
            ->minLength('password', 6);

        return $validator;
    }

    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options)
    {
        // Hashear la contraseña antes de guardar
        if ($entity->isDirty('password') && !empty($entity->password)) {
            $entity->password = Security::hash($entity->password, 'sha256', false);
        }
        return $entity;
    }
}

