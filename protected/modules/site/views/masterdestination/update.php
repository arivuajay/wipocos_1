<?php
/* @var $this MasterdestinationController */
/* @var $model MasterDestination */

$this->title='Update Master Destinations: '. $model->Master_Dist_Id;
$this->breadcrumbs=array(
	'Master Destinations'=>array('index'),
	'Update Master Destinations',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>