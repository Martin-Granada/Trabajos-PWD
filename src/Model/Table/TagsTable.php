<?php
// src/Model/Table/TagsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TagsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        
        // Configurar displayField para find('list')
        $this->setDisplayField('title');
        
        // Configurar relación many-to-many con Articles
        $this->belongsToMany('Articles', [
            'joinTable' => 'articles_tags',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('title', 'Se requiere un título')
            ->add('title', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'Esta etiqueta ya existe'
            ])
            ->minLength('title', 1)
            ->maxLength('title', 191);

        return $validator;
    }
}

