<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->breadcrumbs=array(
	'Tariff Contracts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TariffContracts', 'url'=>array('index')),
	array('label'=>'Create TariffContracts', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tariff-contracts-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tariff Contracts</h1>

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
	'id'=>'tariff-contracts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Tarf_Cont_Id',
		'Tarf_Cont_GUID',
		'Tarf_Cont_Internal_Code',
		'Tarf_Cont_City_Id',
		'Tarf_Cont_District',
		'Tarf_Cont_Area',
		/*
		'Tarf_Cont_Tariff_Id',
		'Tarf_Cont_Insp_Id',
		'Tarf_Cont_Balance',
		'Tarf_Cont_Amt_Pay',
		'Tarf_Cont_From',
		'Tarf_Cont_To',
		'Tarf_Cont_Sign_Date',
		'Tarf_Cont_Pay_Id',
		'Tarf_Cont_Portion',
		'Tarf_Cont_Comment',
		'Tarf_Cont_Event_Id',
		'Tarf_Cont_Event_Date',
		'Tarf_Cont_Event_Comment',
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
