<?php
/* @var $this MasterpaymentmethodController */
/* @var $model MasterPaymentMethod */

$this->title='Create Master Payment Methods';
$this->breadcrumbs=array(
	'Master Payment Methods'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
