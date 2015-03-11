<?php
/* @var $this MasterroleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Roles',
);

$this->menu=array(
	array('label'=>'Create MasterRole', 'url'=>array('create')),
	array('label'=>'Manage MasterRole', 'url'=>array('admin')),
);
?>

<h1>Master Roles</h1>

<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
