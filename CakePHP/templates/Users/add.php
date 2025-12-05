<!-- File: templates/Users/add.php -->

<h1>Agregar Usuario</h1>
<?php
echo $this->Form->create($user);
echo $this->Form->control('email', ['label' => 'Correo Electrónico', 'class' => 'form-control']);
echo $this->Form->control('password', ['label' => 'Contraseña', 'class' => 'form-control']);
echo $this->Form->button('💾 Guardar Usuario', ['class' => 'btn']);
echo $this->Html->link('↩️ Volver', ['action' => 'index'], ['class' => 'btn btn-secondary']);
echo $this->Form->end();
?>

