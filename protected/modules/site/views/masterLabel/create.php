<?php
/* @var $this MasterLabelController */
/* @var $model MasterLabel */

$this->title='Create Master Labels';
$this->breadcrumbs=array(
	'Master Labels'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
