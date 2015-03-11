<?php
/* @var $this MasterroleController */
/* @var $model MasterRole */

$this->breadcrumbs=array(
	'Master Roles'=>array('index'),
	$model->Master_Role_ID,
);

$this->menu=array(
	array('label'=>'List MasterRole', 'url'=>array('index')),
	array('label'=>'Create MasterRole', 'url'=>array('create')),
	array('label'=>'Update MasterRole', 'url'=>array('update', 'id'=>$model->Master_Role_ID)),
	array('label'=>'Delete MasterRole', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Master_Role_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterRole', 'url'=>array('admin')),
);
?>

<h1>View MasterRole #<?php echo $model->Master_Role_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Master_Role_ID',
		'Role_Code',
		'Description',
		'is_Admin',
		'Active',
		'Created_Date',
		'Rowversion',
	),
)); ?>
