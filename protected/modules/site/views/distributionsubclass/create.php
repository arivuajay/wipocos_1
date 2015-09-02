<?php
/* @var $this DistributionsubclassController */
/* @var $model DistributionSubclass */

$this->title='Create Sub-Classes';
$this->breadcrumbs=array(
	'Sub-Classes'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
