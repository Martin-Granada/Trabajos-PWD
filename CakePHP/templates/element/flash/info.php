<?php
/**
 * Flash info message element
 *
 * @var string $message The flash message
 * @var array $params Additional parameters
 */
$class = 'flash-message';
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
<div class="<?= h($params['class']) ?>" style="background-color: #d1ecf1; color: #0c5460; border-color: #17a2b8; padding: 15px 20px; margin-bottom: 20px; border-radius: 5px; border-left: 4px solid; cursor: pointer;" onclick="this.style.display='none';">
    <?= $escape ? h($message) : $message ?>
</div>

