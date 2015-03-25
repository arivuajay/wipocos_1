<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->breadcrumbs=array(
	'Societies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Society', 'url'=>array('index')),
	array('label'=>'Create Society', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#society-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Societies</h1>

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
	'id'=>'society-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Society_Id',
		'Society_Abbr_Id',
		'Society_Logo_File',
		'Society_Mailing_Address',
		'Society_Country_Id',
		'Society_Territory_Id',
		/*
		'Society_Region_Id',
		'Society_Profession_Id',
		'Society_Role_Id',
		'Society_Hirearchy_Id',
		'Society_Payment_Id',
		'Society_Type_Id',
		'Society_Factor_Id',
		'Society_Doc_Type_Id',
		'Society_Doc_Id',
		'Society_Duration',
		'Society_CopyRight',
		'Society_RelatedRights',
		'Society_Currency',
		'Society_Rate',
		'Society_Main_Performer_Id',
		'Society_Producer_Id',
		'Active',
		'Created_Date',
		'Rowversion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
