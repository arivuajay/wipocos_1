<?php
/* @var $this MasterpseudonymtypesController */
/* @var $model MasterPseudonymTypes */

$this->breadcrumbs=array(
	'Master Pseudonym Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterPseudonymTypes', 'url'=>array('index')),
	array('label'=>'Create MasterPseudonymTypes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#master-pseudonym-types-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Master Pseudonym Types</h1>

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
	'id'=>'master-pseudonym-types-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Pseudo_Id',
		'Pseudo_Code',
		'Active',
		'Created_Date',
		'Rowversion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
