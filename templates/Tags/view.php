<!-- File: templates/Tags/view.php -->

<h1>🏷️ <?= h($tag->title) ?></h1>

<p><strong>Creado:</strong> <?= $tag->created->i18nFormat('dd/MM/yyyy HH:mm') ?></p>

<h3>📄 Artículos con esta etiqueta:</h3>
<?php if (!empty($tag->articles)): ?>
<ul style="list-style: none; padding: 0;">
    <?php foreach ($tag->articles as $article): ?>
    <li style="padding: 10px; margin: 5px 0; background: #f8f9fa; border-radius: 5px;">
        <?= $this->Html->link('📄 ' . $article->title, ['controller' => 'Articles', 'action' => 'view', $article->slug]) ?>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p style="color: #6c757d; font-style: italic;">No hay artículos con esta etiqueta.</p>
<?php endif; ?>

<div style="margin-top: 30px;">
    <?= $this->Html->link('✏️ Editar', ['action' => 'edit', $tag->id], ['class' => 'btn']) ?>
    <?= $this->Html->link('↩️ Volver a Etiquetas', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
</div>

