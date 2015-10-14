<?php
/* @var $this DistributionlogsheetController */
/* @var $model DistributionLogsheet */

$this->title='Create Distribution Logsheets';
$this->breadcrumbs=array(
	'Distribution Logsheets'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
