<?php
/* @var $this SoundcarrierController */
/* @var $model SoundCarrier */

$this->title='Create Sound Carriers';
$this->breadcrumbs=array(
	'Sound Carriers'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
