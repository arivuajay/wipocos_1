<?php
/* @var $this RecordingController */
/* @var $model Recording */

$this->title='Update Recording: '. $model->Rcd_Title;
$this->breadcrumbs=array(
	'Recordings'=>array('index'),
	'Update Recordings',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'sub_title_model', 'tab', 'publication_model', 'right_holder_model',
            'link_model', 'right_holder_exists','author_model','publisher_model','performer_model','producer_model')); ?>
</div>