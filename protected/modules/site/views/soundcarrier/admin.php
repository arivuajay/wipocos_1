<?php
/* @var $this SoundcarrierController */
/* @var $model SoundCarrier */

$this->breadcrumbs=array(
	'Sound Carriers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SoundCarrier', 'url'=>array('index')),
	array('label'=>'Create SoundCarrier', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sound-carrier-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sound Carriers</h1>

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
	'id'=>'sound-carrier-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Sound_Car_Id',
		'Sound_Car_GUID',
		'Sound_Car_Title',
		'Sound_Car_Language_Id',
		'Sound_Car_Internal_Code',
		'Sound_Car_Standardized_Code',
		/*
		'Sound_Car_Catelog',
		'Sound_Car_Barcode',
		'Sound_Car_Distributor',
		'Sound_Car_Label_Id',
		'Sound_Car_Medium',
		'Sound_Car_Type_Id',
		'Sound_Car_Main_Artist',
		'Sound_Car_Producer',
		'Sound_Car_Product_Country_Id',
		'Sound_Car_Year',
		'Sound_Car_Release_Year',
		'Sound_Car_Manf_Id',
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
