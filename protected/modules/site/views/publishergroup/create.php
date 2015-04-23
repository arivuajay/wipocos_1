<?php
/* @var $this PublishergroupController */
/* @var $model PublisherGroup */

$this->title='Create Publisher Groups';
$this->breadcrumbs=array(
	'Publisher Groups'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model','tab','type')); ?>
</div>
