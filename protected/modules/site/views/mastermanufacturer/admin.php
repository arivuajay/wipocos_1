<?php
/* @var $this MastermanufacturerController */
/* @var $model MasterManufacturer */

$this->breadcrumbs=array(
	'Master Manufacturers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterManufacturer', 'url'=>array('index')),
	array('label'=>'Create MasterManufacturer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#master-manufacturer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Master Manufacturers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'master-manufacturer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Master_Manf_Id',
		'Manf_Code',
		'Manf_Name',
		'Manf_Description',
		'Active',
		'Created_Date',
		/*
		'Rowversion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
