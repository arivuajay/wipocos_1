<?php
/* @var $this DistributionsettingController */
/* @var $model DistributionSetting */

$this->title='Create Distribution Settings';
$this->breadcrumbs=array(
	'Distribution Settings'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
