<!-- File: templates/Articles/index.php -->

<h1>Artículos</h1>
<?= $this->Html->link("➕ Agregar Artículo", ['action' => 'add'], ['class' => 'btn']) ?>

<?php if (empty($articles)): ?>
    <p class="empty-message">No hay artículos publicados. <?= $this->Html->link('Agregar el primero', ['action' => 'add']) ?></p>
<?php else: ?>
    <table>
        <tr>
            <th>Título</th>
            <th>Creado</th>
            <th>Etiquetas</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td>
                <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
            </td>
            <td>
                <?= $article->created->i18nFormat('dd/MM/yyyy HH:mm') ?>
            </td>
            <td>
                <?php if (!empty($article->tags)): ?>
                    <?php
                    $tagLinks = [];
                    foreach ($article->tags as $tag) {
                        $tagLinks[] = $this->Html->link($tag->title, ['controller' => 'Tags', 'action' => 'view', $tag->id], ['class' => 'tag']);
                    }
                    echo implode(' ', $tagLinks);
                    ?>
                <?php else: ?>
                    <em style="color: #6c757d;">Sin etiquetas</em>
                <?php endif; ?>
            </td>
            <td>
                <div class="actions">
                    <?= $this->Html->link('✏️ Editar', ['action' => 'edit', $article->slug], ['class' => 'edit']) ?>
                    <?= $this->Form->postLink(
                        '🗑️ Eliminar',
                        ['action' => 'delete', $article->slug],
                        ['confirm' => '¿Estás seguro de que deseas eliminar este artículo?', 'class' => 'delete']
                    ) ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <!-- Controles de paginación -->
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
<?php endif; ?>

