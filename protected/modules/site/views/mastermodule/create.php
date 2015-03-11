<?php
/* @var $this MastermoduleController */
/* @var $model MasterModule */

$this->breadcrumbs=array(
	'Master Modules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterModule', 'url'=>array('index')),
	array('label'=>'Manage MasterModule', 'url'=>array('admin')),
);
?>

<h1>Create MasterModule</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>