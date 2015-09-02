<?php
/* @var $this DistributionsubclassController */
/* @var $model DistributionSubclass */

$this->breadcrumbs=array(
	'Sub-Classes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DistributionSubclass', 'url'=>array('index')),
	array('label'=>'Create DistributionSubclass', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#distribution-subclass-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sub-Classes</h1>

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
	'id'=>'distribution-subclass-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Subclass_Id',
		'Class_Id',
		'Subclass_Code',
		'Subclass_Name',
		'Subclass_Measure_Unit',
		'Subclass_Calc_Unit',
		/*
		'Subclass_Dist_Params',
		'Subclass_Admin_Cost',
		'Subclass_Social_Deduct',
		'Subclass_Cultural_Deduct',
		'Created_Date',
		'Rowversion',
		'Created_By',
		'Updated_By',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
