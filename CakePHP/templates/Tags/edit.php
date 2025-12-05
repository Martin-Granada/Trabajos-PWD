<!-- File: templates/Tags/edit.php -->

<h1>Editar Etiqueta</h1>
<?php
echo $this->Form->create($tag);
echo $this->Form->control('title', ['label' => 'Título de la Etiqueta', 'class' => 'form-control']);
echo $this->Form->button('💾 Guardar Cambios', ['class' => 'btn']);
echo $this->Html->link('↩️ Volver', ['action' => 'index'], ['class' => 'btn btn-secondary']);
echo $this->Form->end();
?>

