<?php
/* @var $this DistributionclassController */
/* @var $model DistributionClass */

$this->title='Create Class';
$this->breadcrumbs=array(
	'Class'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
