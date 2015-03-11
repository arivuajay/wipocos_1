<?php
/* @var $this AuthresourcesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Auth Resources',
);

$this->menu=array(
	array('label'=>'Create AuthResources', 'url'=>array('create')),
	array('label'=>'Manage AuthResources', 'url'=>array('admin')),
);
?>

<h1>Auth Resources</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
