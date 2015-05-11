<?php
/* @var $this ProducerLabelOwnerController */
/* @var $model ProducerLabelOwner */

$this->title='Create Producer Label Ownerships';
$this->breadcrumbs=array(
	'Producer Label Ownerships'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
