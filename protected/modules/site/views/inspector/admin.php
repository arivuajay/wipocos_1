<?php
/* @var $this InspectorController */
/* @var $model Inspector */

$this->breadcrumbs=array(
	'Inspectors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Inspector', 'url'=>array('index')),
	array('label'=>'Create Inspector', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#inspector-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Inspectors</h1>

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
	'id'=>'inspector-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Insp_Id',
		'Insp_Internal_Code',
		'Insp_GUID',
		'Insp_Name',
		'Insp_Occupation',
		'Insp_DOB',
		/*
		'Insp_Nationality_Id',
		'Insp_Birth_Place',
		'Insp_Identity_Number',
		'Insp_Date',
		'Insp_Region_Id',
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
