<?php
/* @var $this GroupController */
/* @var $model Group */

$this->title='Update Groups: '. $model->Group_Id;
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Update Groups',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'payment_model', 'managed_model', 'biograph_model', 'tab', 'address_model', 'psedonym_model')); ?></div>