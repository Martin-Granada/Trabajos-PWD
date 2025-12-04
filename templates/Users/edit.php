<!-- File: templates/Users/edit.php -->

<h1>Editar Usuario</h1>
<?php
echo $this->Form->create($user);
echo $this->Form->control('email', ['label' => 'Correo Electrónico', 'class' => 'form-control']);
echo $this->Form->control('password', ['type' => 'password', 'value' => '', 'label' => 'Contraseña (dejar vacío para no cambiar)', 'class' => 'form-control']);
echo $this->Form->button('💾 Guardar Cambios', ['class' => 'btn']);
echo $this->Html->link('↩️ Volver', ['action' => 'index'], ['class' => 'btn btn-secondary']);
echo $this->Form->end();
?>

