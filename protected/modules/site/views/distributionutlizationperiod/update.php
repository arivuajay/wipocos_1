<?php
/* @var $this DistributionutlizationperiodController */
/* @var $model DistributionUtlizationPeriod */

$this->title='Update Utilization Periods: '. $model->Period_Year;
$this->breadcrumbs=array(
	'Utilization Periods'=>array('index'),
	'Update Utilization Periods',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>