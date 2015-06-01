<?php
/* @var $this RecordingController */
/* @var $model Recording */

$this->title='Update Recordings: '. $model->Rcd_Id;
$this->breadcrumbs=array(
	'Recordings'=>array('index'),
	'Update Recordings',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'sub_title_model', 'tab', 'publication_model', 'right_holder_model',
            'link_model', 'right_holder_exists')); ?>
</div>