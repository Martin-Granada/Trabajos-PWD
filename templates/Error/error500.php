<?php
/**
 * Error 500 template
 *
 * @var \Cake\Error\ExceptionRenderer $this
 * @var \Cake\Core\Exception\CakeException $error
 */
use function Cake\Core\h;

$this->layout = 'dev_error';

$this->assign('title', 'Error 500');
$this->assign('templateName', 'error500.php');

$this->start('subheading');
?>
    <strong>Error:</strong>
    <?= h($error->getMessage()) ?>
    <br>
    <br>

    <strong>File:</strong>
    <?= h($error->getFile()) ?>
    <br><br>
    <strong>Line:</strong>
    <?= h($error->getLine()) ?>
<?php $this->end() ?>

<?php
$this->start('file');
if (extension_loaded('xdebug')):
    xdebug_print_function_stack();
endif;
$this->end();

