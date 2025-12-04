<!-- File: templates/Tags/add.php -->

<h1>Agregar Etiqueta</h1>
<?php
echo $this->Form->create($tag);
echo $this->Form->control('title', ['label' => 'Título de la Etiqueta', 'class' => 'form-control']);
echo $this->Form->button('💾 Guardar Etiqueta', ['class' => 'btn']);
echo $this->Html->link('↩️ Volver', ['action' => 'index'], ['class' => 'btn btn-secondary']);
echo $this->Form->end();
?>

