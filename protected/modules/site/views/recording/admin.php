<?php
/* @var $this RecordingController */
/* @var $model Recording */

$this->breadcrumbs=array(
	'Recordings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Recording', 'url'=>array('index')),
	array('label'=>'Create Recording', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#recording-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Recordings</h1>

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
	'id'=>'recording-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Rcd_Id',
		'Rcd_Title',
		'Rcd_Language_Id',
		'Rcd_Internal_Code',
		'Rcd_Type_Id',
		'Rcd_Date',
		/*
		'Rcd_Duration',
		'Rcd_Record_Country_id',
		'Rcd_Product_Country_Id',
		'Rcd_Doc_Status_Id',
		'Rcd_Record_Type_Id',
		'Rcd_Label_Id',
		'Rcd_Reference',
		'Rcd_File',
		'Rcd_Isrc_Code',
		'Rcd_Iswc_Number',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
