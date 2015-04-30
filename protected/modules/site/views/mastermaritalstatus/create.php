<?php
/* @var $this MastermaritalstatusController */
/* @var $model MasterMaritalStatus */

$this->title = 'Create Master Marital Statuses';
$this->breadcrumbs = array(
    'Master Marital Statuses' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
