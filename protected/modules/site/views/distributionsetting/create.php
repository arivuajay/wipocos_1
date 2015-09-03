<?php
/* @var $this DistributionsettingController */
/* @var $model DistributionSetting */

$this->title='Create Setting Dates';
$this->breadcrumbs=array(
	'Setting Dates'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
