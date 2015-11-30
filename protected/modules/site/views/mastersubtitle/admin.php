<?php
/* @var $this MastersubtitleController */
/* @var $model MasterSubtitleType */

$this->breadcrumbs=array(
	'Master Subtitle Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterSubtitleType', 'url'=>array('index')),
	array('label'=>'Create MasterSubtitleType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#master-subtitle-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Master Subtitle Types</h1>

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
	'id'=>'master-subtitle-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Master_Subtitle_Id',
		'Subtitle_Name',
		'Active',
		'Created_Date',
		'Rowversion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
