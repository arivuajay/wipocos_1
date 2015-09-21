<?php
/* @var $this DistributionmainclassController */
/* @var $model DistributionMainClass */

$this->breadcrumbs=array(
	'Distribution Main Classes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DistributionMainClass', 'url'=>array('index')),
	array('label'=>'Create DistributionMainClass', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#distribution-main-class-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Distribution Main Classes</h1>

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
	'id'=>'distribution-main-class-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Main_Class_Id',
		'Main_Class_Name',
		'Main_Class_Code',
		'Active',
		'Created_Date',
		'Rowversion',
		/*
		'Created_By',
		'Updated_By',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
