<?php
/* @var $this WorkController */
/* @var $model Work */

$this->title='Update Work: '. $model->Work_Org_Title;
$this->breadcrumbs=array(
	'Works'=>array('index'),
	'Update Works',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'sub_title_model', 'tab', 'biograph_model', 'document_model',
            'publishing_model', 'sub_publishing_model', 'right_holder_model','right_holder_exists', 'publish_validate', 'sub_publish_validate', 'sub_publisher', 'main_publisher', 'publishing_upload_model', 'sub_publishing_upload_model', 'focus', 'biograph_upload_model')); ?></div>