<?php
/* @var $this MasterdestinationController */
/* @var $model MasterDestination */

$this->title='Create Master Destinations';
$this->breadcrumbs=array(
	'Master Destinations'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
