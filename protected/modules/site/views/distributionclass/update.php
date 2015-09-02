<?php
/* @var $this DistributionclassController */
/* @var $model DistributionClass */

$this->title='Update Class: '. $model->Class_Name;
$this->breadcrumbs=array(
	'Class'=>array('index'),
	'Update Class',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>