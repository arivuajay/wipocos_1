<?php
/* @var $this MastermoduleController */
/* @var $model MasterModule */

$this->breadcrumbs=array(
	'Master Modules'=>array('index'),
	$model->Master_Module_ID=>array('view','id'=>$model->Master_Module_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterModule', 'url'=>array('index')),
	array('label'=>'Create MasterModule', 'url'=>array('create')),
	array('label'=>'View MasterModule', 'url'=>array('view', 'id'=>$model->Master_Module_ID)),
	array('label'=>'Manage MasterModule', 'url'=>array('admin')),
);
?>

<h1>Update MasterModule <?php echo $model->Master_Module_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>