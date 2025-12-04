<?php
/**
 * Flash success message element
 *
 * @var string $message The flash message
 * @var array $params Additional parameters
 */
$class = 'flash-message flash-success';
if (!isset($params)) {
    $params = [];
}
if (!isset($params['class'])) {
    $params['class'] = $class;
} else {
    $params['class'] .= ' ' . $class;
}
$escape = $params['escape'] ?? true;
?>
<div class="<?= h($params['class']) ?>" onclick="this.style.display='none';" style="cursor: pointer;">
    <?= $escape ? h($message) : $message ?>
</div>

