<?php
/* @var $this SharedefinitionperroleController */
/* @var $model ShareDefinitionPerRole */

$this->title='Create Share Definition Per Roles';
$this->breadcrumbs=array(
	'Share Definition Per Roles'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
