<?php
/* @var $this DistributionmainclassController */
/* @var $model DistributionMainClass */

$this->title='Update Distribution Main Classes: '. $model->Main_Class_Id;
$this->breadcrumbs=array(
	'Distribution Main Classes'=>array('index'),
	'Update Distribution Main Classes',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>