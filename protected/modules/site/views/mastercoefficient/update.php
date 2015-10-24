<?php
/* @var $this MastercoefficientController */
/* @var $model MasterCoefficient */

$this->title='Update Master Coefficients: '. $model->Master_Coeff_Id;
$this->breadcrumbs=array(
	'Master Coefficients'=>array('index'),
	'Update Master Coefficients',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>