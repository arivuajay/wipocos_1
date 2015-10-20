<?php
/* @var $this DistributionutlizationperiodController */
/* @var $model DistributionUtlizationPeriod */

$this->title='Create Utilization Periods';
$this->breadcrumbs=array(
	'Utilization Periods'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
