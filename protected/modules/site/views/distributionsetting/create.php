<?php
/* @var $this DistributionsettingController */
/* @var $model DistributionSetting */

$this->title='Create Distribution Timetable';
$this->breadcrumbs=array(
	'Distribution Timetable'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
