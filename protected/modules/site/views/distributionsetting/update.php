<?php
/* @var $this DistributionsettingController */
/* @var $model DistributionSetting */

$this->title='Update Distribution Settings: '. $model->Setting_Id;
$this->breadcrumbs=array(
	'Distribution Settings'=>array('index'),
	'Update Distribution Settings',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>