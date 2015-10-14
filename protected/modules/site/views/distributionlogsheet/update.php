<?php
/* @var $this DistributionlogsheetController */
/* @var $model DistributionLogsheet */

$this->title='Update Distribution Logsheets: '. $model->Log_Id;
$this->breadcrumbs=array(
	'Distribution Logsheets'=>array('index'),
	'Update Distribution Logsheets',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>