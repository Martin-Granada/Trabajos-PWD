<?php
// src/Model/Entity/User.php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    // Ocultar la contraseña cuando se serializa la entidad
    protected $_hidden = [
        'password',
    ];
}

