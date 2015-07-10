<?php
/* @var $this SoundcarrierController */
/* @var $model SoundCarrier */

$this->title='Update Sound Carriers: '. $model->Sound_Car_Title;
$this->breadcrumbs=array(
	'Sound Carriers'=>array('index'),
	'Update Sound Carriers',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'document_model', 'tab', 'biograph_model', 'biograph_upload_model', 'sub_title_model', 'publication_model', 'fixation_model', 'right_holder_model_1', 'right_holder_model_2', 'right_holder_exists_1', 'right_holder_exists_2')); ?></div>