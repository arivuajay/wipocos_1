<?php
/* @var $this RecordingsessionController */
/* @var $model RecordingSession */

$this->title='Create Recording Session Sheets';
$this->breadcrumbs=array(
	'Recording Session Sheets'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'performer_model', 'producer_model')); ?>
</div>
