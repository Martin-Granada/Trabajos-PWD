<!-- File: templates/Users/index.php -->
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
if (!isset($this)) {
    throw new \RuntimeException('This file cannot be accessed directly.');
}
?>
<h1>Usuarios</h1>
<?= $this->Html->link("➕ Agregar Usuario", ['action' => 'add'], ['class' => 'btn']) ?>

<?php if (empty($users)): ?>
    <p class="empty-message">No hay usuarios registrados. <?= $this->Html->link('Agregar el primero', ['action' => 'add']) ?></p>
<?php else: ?>
    <table>
        <tr>
            <th>Email</th>
            <th>Creado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <?= $this->Html->link($user->email, ['action' => 'view', $user->id]) ?>
            </td>
            <td>
                <?= $user->created->i18nFormat('dd/MM/yyyy HH:mm') ?>
            </td>
            <td>
                <div class="actions">
                    <?= $this->Html->link('✏️ Editar', ['action' => 'edit', $user->id], ['class' => 'edit']) ?>
                    <?= $this->Form->postLink(
                        '🗑️ Eliminar',
                        ['action' => 'delete', $user->id],
                        ['confirm' => '¿Estás seguro de que deseas eliminar este usuario?', 'class' => 'delete']
                    ) ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

