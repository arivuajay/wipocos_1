<?php
/* @var $this MasterhierarchyController */
/* @var $model MasterHierarchy */

$this->title='Update Master Hierarchies: '. $model->Master_Hierarchy_Id;
$this->breadcrumbs=array(
	'Master Hierarchies'=>array('index'),
	'Update Master Hierarchies',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>