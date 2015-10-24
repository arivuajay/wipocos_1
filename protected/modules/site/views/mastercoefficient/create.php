<?php
/* @var $this MastercoefficientController */
/* @var $model MasterCoefficient */

$this->title='Create Master Coefficients';
$this->breadcrumbs=array(
	'Master Coefficients'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
