<!-- File: templates/Users/view.php -->

<h1>👤 <?= h($user->email) ?></h1>

<p><strong>Creado:</strong> <?= $user->created->i18nFormat('dd/MM/yyyy HH:mm') ?></p>

<h3>📝 Artículos de este usuario:</h3>
<?php if (!empty($user->articles)): ?>
<ul style="list-style: none; padding: 0;">
    <?php foreach ($user->articles as $article): ?>
    <li style="padding: 10px; margin: 5px 0; background: #f8f9fa; border-radius: 5px;">
        <?= $this->Html->link('📄 ' . $article->title, ['controller' => 'Articles', 'action' => 'view', $article->slug]) ?>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p style="color: #6c757d; font-style: italic;">Este usuario no tiene artículos publicados.</p>
<?php endif; ?>

<div style="margin-top: 30px;">
    <?= $this->Html->link('✏️ Editar', ['action' => 'edit', $user->id], ['class' => 'btn']) ?>
    <?= $this->Html->link('↩️ Volver a Usuarios', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
</div>

