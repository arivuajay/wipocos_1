<?php
/* @var $this MasterroleController */
/* @var $model MasterRole */

$this->breadcrumbs=array(
	'Master Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterRole', 'url'=>array('index')),
	array('label'=>'Manage MasterRole', 'url'=>array('admin')),
);
?>

<h1>Create MasterRole</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>