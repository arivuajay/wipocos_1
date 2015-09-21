<?php
/* @var $this DistributionmainclassController */
/* @var $model DistributionMainClass */

$this->title='Create Distribution Main Classes';
$this->breadcrumbs=array(
	'Distribution Main Classes'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
