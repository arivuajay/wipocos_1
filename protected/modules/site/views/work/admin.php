<?php
/* @var $this WorkController */
/* @var $model Work */

$this->breadcrumbs=array(
	'Works'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Work', 'url'=>array('index')),
	array('label'=>'Create Work', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#work-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Works</h1>

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
	'id'=>'work-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Work_Id',
		'Work_Org_Title',
		'Work_Language_Id',
		'Work_Internal_Code',
		'Work_Iswc',
		'Work_Wic_Code',
		/*
		'Work_Type_Id',
		'Work_Factor',
		'Work_Instrumentation',
		'Work_Duration',
		'Work_Creation',
		'Work_Opus_Number',
		'Active',
		'Created_Date',
		'Rowversion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
