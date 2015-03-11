<?php
/* @var $this AuthresourcesController */
/* @var $model AuthResources */

$this->breadcrumbs=array(
	'Auth Resources'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuthResources', 'url'=>array('index')),
	array('label'=>'Manage AuthResources', 'url'=>array('admin')),
);
?>

<h1>Create AuthResources</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>