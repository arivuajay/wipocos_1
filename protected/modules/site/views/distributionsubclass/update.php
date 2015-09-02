<?php
/* @var $this DistributionsubclassController */
/* @var $model DistributionSubclass */

$this->title='Update Sub-Classes: '. $model->Subclass_Name;
$this->breadcrumbs=array(
	'Sub-Classes'=>array('index'),
	'Update Sub-Classes',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>