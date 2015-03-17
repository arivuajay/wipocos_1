<?php
/* @var $this MasterdocumentstatusController */
/* @var $model MasterDocumentStatus */

$this->breadcrumbs=array(
	'Master Document Status'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterDocumentStatus', 'url'=>array('index')),
	array('label'=>'Create MasterDocumentStatus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#master-document-status-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Master Document Status</h1>

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
	'id'=>'master-document-status-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Master_Document_Sts_Id',
		'Document_Sts_Code',
		'Document_Sts_Name',
		'Document_Sts_Comment',
		'Active',
		'Created_Date',
		/*
		'Rowversion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
