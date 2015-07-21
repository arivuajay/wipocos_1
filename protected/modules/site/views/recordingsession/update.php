<?php
/* @var $this RecordingsessionController */
/* @var $model RecordingSession */

$this->title='Update Recording Session Sheets: '. $model->Rcd_Ses_Title;
$this->breadcrumbs=array(
	'Recording Session Sheets'=>array('index'),
	'Update Recording Session Sheets',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'sub_title_model', 'tab', 'document_model', 'biograph_model', 'biograph_upload_model', 'right_holder_exists', 'right_holder_model', 'folio_model')); ?>
</div>