<?php
/* @var $this RecordingController */
/* @var $model Recording */

$this->title='Create Recordings';
$this->breadcrumbs=array(
	'Recordings'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
