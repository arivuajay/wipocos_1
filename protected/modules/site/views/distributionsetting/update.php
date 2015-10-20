<?php
/* @var $this DistributionsettingController */
/* @var $model DistributionSetting */

$this->title='Update Distribution Timetable: '. $model->Setting_Identifier;
$this->breadcrumbs=array(
	'Distribution Timetable'=>array('index'),
	'Update Distribution Timetable',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>