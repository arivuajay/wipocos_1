<?php
/* @var $this MastercurrencyController */
/* @var $model MasterCurrency */

$this->title = 'Create Master Currencies';
$this->breadcrumbs = array(
    'Master Currencies' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
