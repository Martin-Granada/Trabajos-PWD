<!-- File: templates/Articles/view.php -->

<h1>📄 <?= h($article->title) ?></h1>

<div style="background: #f8f9fa; padding: 20px; border-radius: 5px; margin: 20px 0;">
    <p style="white-space: pre-wrap; line-height: 1.8;"><?= h($article->body) ?></p>
</div>

<p><strong>Creado:</strong> <?= $article->created->i18nFormat('dd/MM/yyyy HH:mm') ?></p>

<?php if (!empty($article->tags)): ?>
<p style="margin: 20px 0;">
    <strong>Etiquetas:</strong><br>
    <?php
    $tagLinks = [];
    foreach ($article->tags as $tag) {
        $tagLinks[] = $this->Html->link($tag->title, ['controller' => 'Tags', 'action' => 'view', $tag->id], ['class' => 'tag']);
    }
    echo implode(' ', $tagLinks);
    ?>
</p>
<?php endif; ?>

<div style="margin-top: 30px;">
    <?= $this->Html->link('✏️ Editar', ['action' => 'edit', $article->slug], ['class' => 'btn']) ?>
    <?= $this->Html->link('↩️ Volver a Artículos', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
</div>

