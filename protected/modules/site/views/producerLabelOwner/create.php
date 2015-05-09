<?php
/* @var $this ProducerLabelOwnerController */
/* @var $model ProducerLabelOwner */

$this->title='Create Producer Label Owners';
$this->breadcrumbs=array(
	'Producer Label Owners'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
