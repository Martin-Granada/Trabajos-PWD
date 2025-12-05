<!-- File: templates/Articles/edit.php -->

<h1>Editar Artículo</h1>
<?php
echo $this->Form->create($article);
echo $this->Form->control('user_id', ['type' => 'hidden']);
echo $this->Form->control('title', ['label' => 'Título', 'class' => 'form-control']);
echo $this->Form->control('body', ['rows' => '10', 'label' => 'Contenido', 'class' => 'form-control']);
echo $this->Form->control('tags._ids', ['options' => $tags, 'multiple' => 'checkbox', 'label' => 'Etiquetas']);
echo $this->Form->button('💾 Guardar Cambios', ['class' => 'btn']);
echo $this->Html->link('↩️ Volver', ['action' => 'index'], ['class' => 'btn btn-secondary']);
echo $this->Form->end();
?>

