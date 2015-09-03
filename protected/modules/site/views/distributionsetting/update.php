<?php
/* @var $this DistributionsettingController */
/* @var $model DistributionSetting */

$this->title='Update Setting Dates: '. $model->Setting_Identifier;
$this->breadcrumbs=array(
	'Setting Dates'=>array('index'),
	'Update Setting Dates',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>