<?php
/* @var $this NumberassignmentController */
/* @var $model NumberAssignment */

$this->breadcrumbs=array(
	'Number Assignments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List NumberAssignment', 'url'=>array('index')),
	array('label'=>'Create NumberAssignment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#number-assignment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Number Assignments</h1>

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
	'id'=>'number-assignment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Num_Assgn_Id',
		'Num_Assgn_System_Id',
		'Num_Assgn_Series_From',
		'Num_Assgn_Series_To',
		'Num_Assgn_List',
		'Active',
		/*
		'Created_Date',
		'Rowversion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
