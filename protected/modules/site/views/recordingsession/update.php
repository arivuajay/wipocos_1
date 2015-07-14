<?php
/* @var $this RecordingsessionController */
/* @var $model RecordingSession */

$this->title='Update Recording Sessions: '. $model->Rcd_Ses_Title;
$this->breadcrumbs=array(
	'Recording Sessions'=>array('index'),
	'Update Recording Sessions',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'sub_title_model', 'tab', 'document_model', 'biograph_model', 'biograph_upload_model')); ?></div>