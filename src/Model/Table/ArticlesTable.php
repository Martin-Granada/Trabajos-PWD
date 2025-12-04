<?php
// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;
use Cake\Event\EventInterface;
use Cake\Datasource\EntityInterface;
use ArrayObject;

class ArticlesTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        
        // Configurar relación many-to-many con Tags
        $this->belongsToMany('Tags', [
            'joinTable' => 'articles_tags',
        ]);
        
        // Configurar relación many-to-one con Users
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('title', 'El título es requerido')
            ->minLength('title', 3, 'El título debe tener al menos 3 caracteres')
            ->maxLength('title', 255, 'El título no puede exceder 255 caracteres')
            ->notEmptyString('body', 'El contenido es requerido')
            ->minLength('body', 10, 'El contenido debe tener al menos 10 caracteres');

        return $validator;
    }

    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
        return $entity;
    }
}

