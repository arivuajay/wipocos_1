<?php
/* @var $this MastereventtypeController */
/* @var $model MasterEventType */

$this->title='Create Master Event Types';
$this->breadcrumbs=array(
	'Master Event Types'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
