<?php
/* @var $this GroupController */
/* @var $model Group */

$this->title='Create Groups';
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model','tab','type')); ?>
</div>
