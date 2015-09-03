<?php
/* @var $this DistributionutlizationperiodController */
/* @var $model DistributionUtlizationPeriod */

$this->title='Update Utlization Periods: '. $model->Period_Year;
$this->breadcrumbs=array(
	'Utlization Periods'=>array('index'),
	'Update Utlization Periods',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>