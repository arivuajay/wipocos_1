<?php
/* @var $this AuthresourcesController */
/* @var $model AuthResources */

$this->breadcrumbs=array(
	'Auth Resources'=>array('index'),
	$model->Master_Resource_ID=>array('view','id'=>$model->Master_Resource_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List AuthResources', 'url'=>array('index')),
	array('label'=>'Create AuthResources', 'url'=>array('create')),
	array('label'=>'View AuthResources', 'url'=>array('view', 'id'=>$model->Master_Resource_ID)),
	array('label'=>'Manage AuthResources', 'url'=>array('admin')),
);
?>

<h1>Update AuthResources <?php echo $model->Master_Resource_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>