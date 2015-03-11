<?php
/* @var $this MastermoduleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Modules',
);

$this->menu=array(
	array('label'=>'Create MasterModule', 'url'=>array('create')),
	array('label'=>'Manage MasterModule', 'url'=>array('admin')),
);
?>

<h1>Master Modules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
