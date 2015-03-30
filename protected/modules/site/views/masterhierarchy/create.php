<?php
/* @var $this MasterhierarchyController */
/* @var $model MasterHierarchy */

$this->title='Create Master Hierarchies';
$this->breadcrumbs=array(
	'Master Hierarchies'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
