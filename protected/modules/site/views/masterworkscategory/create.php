<?php
/* @var $this MasterworkscategoryController */
/* @var $model MasterWorksCategory */

$this->title = 'Create Master Works Categories';
$this->breadcrumbs = array(
    'Master Works Categories' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
