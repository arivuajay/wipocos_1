<?php
/* @var $this MasterroleController */
/* @var $model MasterRole */

$this->breadcrumbs=array(
	'Master Roles'=>array('index'),
	$model->Master_Role_ID=>array('view','id'=>$model->Master_Role_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterRole', 'url'=>array('index')),
	array('label'=>'Create MasterRole', 'url'=>array('create')),
	array('label'=>'View MasterRole', 'url'=>array('view', 'id'=>$model->Master_Role_ID)),
	array('label'=>'Manage MasterRole', 'url'=>array('admin')),
);
?>

<h1>Update MasterRole <?php echo $model->Master_Role_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>