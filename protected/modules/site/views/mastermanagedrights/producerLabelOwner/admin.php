<?php
/* @var $this ProducerLabelOwnerController */
/* @var $model ProducerLabelOwner */

$this->breadcrumbs=array(
	'Producer Label Ownerships'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProducerLabelOwner', 'url'=>array('index')),
	array('label'=>'Create ProducerLabelOwner', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#producer-label-owner-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Producer Label Ownerships</h1>

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
	'id'=>'producer-label-owner-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Label_Owner_Id',
		'Pro_Acc_Id',
		'Label_Id',
		'Label_Owner_From',
		'Label_Owner_To',
		'Label_Share',
		/*
		'Created_Date',
		'Rowversion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
