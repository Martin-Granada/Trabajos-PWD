<!-- File: templates/Tags/index.php -->

<h1>Etiquetas</h1>
<?= $this->Html->link("➕ Agregar Etiqueta", ['action' => 'add'], ['class' => 'btn']) ?>

<?php if (empty($tags)): ?>
    <p class="empty-message">No hay etiquetas creadas. <?= $this->Html->link('Agregar la primera', ['action' => 'add']) ?></p>
<?php else: ?>
    <table>
        <tr>
            <th>Título</th>
            <th>Creado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($tags as $tag): ?>
        <tr>
            <td>
                <?= $this->Html->link($tag->title, ['action' => 'view', $tag->id]) ?>
            </td>
            <td>
                <?= $tag->created->i18nFormat('dd/MM/yyyy HH:mm') ?>
            </td>
            <td>
                <div class="actions">
                    <?= $this->Html->link('✏️ Editar', ['action' => 'edit', $tag->id], ['class' => 'edit']) ?>
                    <?= $this->Form->postLink(
                        '🗑️ Eliminar',
                        ['action' => 'delete', $tag->id],
                        ['confirm' => '¿Estás seguro de que deseas eliminar esta etiqueta?', 'class' => 'delete']
                    ) ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

