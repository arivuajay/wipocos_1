<?php
/* @var $this DistributionutlizationperiodController */
/* @var $model DistributionUtlizationPeriod */

$this->title='Create Utlization Periods';
$this->breadcrumbs=array(
	'Utlization Periods'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
