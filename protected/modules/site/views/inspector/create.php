<?php
/* @var $this InspectorController */
/* @var $model Inspector */

$this->title='Create Inspectors';
$this->breadcrumbs=array(
	'Inspectors'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
