<?php
/* @var $this WorkController */
/* @var $model Work */

$this->title='Update Works: '. $model->Work_Id;
$this->breadcrumbs=array(
	'Works'=>array('index'),
	'Update Works',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'sub_title_model', 'tab', 'biograph_model', 'document_model')); ?></div>