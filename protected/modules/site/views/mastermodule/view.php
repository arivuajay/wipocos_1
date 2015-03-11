<?php
/* @var $this MastermoduleController */
/* @var $model MasterModule */

$this->breadcrumbs=array(
	'Master Modules'=>array('index'),
	$model->Master_Module_ID,
);

$this->menu=array(
	array('label'=>'List MasterModule', 'url'=>array('index')),
	array('label'=>'Create MasterModule', 'url'=>array('create')),
	array('label'=>'Update MasterModule', 'url'=>array('update', 'id'=>$model->Master_Module_ID)),
	array('label'=>'Delete MasterModule', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Master_Module_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterModule', 'url'=>array('admin')),
);
?>

<h1>View MasterModule #<?php echo $model->Master_Module_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Master_Module_ID',
		'Module_Code',
		'Description',
		'Active',
		'Created_Date',
		'Rowversion',
	),
)); ?>
