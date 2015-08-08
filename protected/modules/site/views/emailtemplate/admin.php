<?php
/* @var $this EmailtemplateController */
/* @var $model EmailTemplate */

$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EmailTemplate', 'url'=>array('index')),
	array('label'=>'Create EmailTemplate', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#email-template-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Email Templates</h1>

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
	'id'=>'email-template-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Email_Temp_Id',
		'Email_Temp_Name',
		'Email_Temp_From',
		'Email_Temp_ReplyTo',
		'Email_Temp_Subject',
		'Email_Temp_Content',
		/*
		'Email_Temp_Params',
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
