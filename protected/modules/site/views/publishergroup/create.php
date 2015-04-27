<?php
/* @var $this PublishergroupController */
/* @var $model PublisherGroup */
$g_type = ucfirst($type);
$this->title="Create {$g_type} Groups";
$this->breadcrumbs=array(
	'Publisher Groups'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model','tab','type')); ?>
</div>
