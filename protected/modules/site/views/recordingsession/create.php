<?php
/* @var $this RecordingsessionController */
/* @var $model RecordingSession */

$this->title='Create Recording Sessions';
$this->breadcrumbs=array(
	'Recording Sessions'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
