<?php
/**
 * Flash warning message element
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
<div class="<?= h($params['class']) ?>" style="background-color: #fff3cd; color: #856404; border-color: #ffc107; padding: 15px 20px; margin-bottom: 20px; border-radius: 5px; border-left: 4px solid; cursor: pointer;" onclick="this.style.display='none';">
    <?= $escape ? h($message) : $message ?>
</div>

