<?php
/* @var $this AuthresourcesController */
/* @var $model AuthResources */

$this->breadcrumbs=array(
	'Auth Resources'=>array('index'),
	$model->Master_Resource_ID,
);

$this->menu=array(
	array('label'=>'List AuthResources', 'url'=>array('index')),
	array('label'=>'Create AuthResources', 'url'=>array('create')),
	array('label'=>'Update AuthResources', 'url'=>array('update', 'id'=>$model->Master_Resource_ID)),
	array('label'=>'Delete AuthResources', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Master_Resource_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuthResources', 'url'=>array('admin')),
);
?>

<h1>View AuthResources #<?php echo $model->Master_Resource_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Master_Resource_ID',
		'Master_User_ID',
		'Master_Role_ID',
		'Master_Module_ID',
		'Master_Screen_ID',
		'Master_Task_ADD',
		'Master_Task_SEE',
		'Master_Task_UPT',
		'Master_Task_DEL',
		'Active',
		'Created_Date',
		'Rowversion',
	),
)); ?>
