<?php
/* @var $this AuthoraccountController */
/* @var $model AuthorAccount */

$this->breadcrumbs=array(
	'Authors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AuthorAccount', 'url'=>array('index')),
	array('label'=>'Create AuthorAccount', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#author-account-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Authors</h1>

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
	'id'=>'author-account-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Auth_Acc_Id',
		'Auth_Sur_Name',
		'Auth_First_Name',
		'Auth_Internal_Code',
		'Auth_Ipi',
		'Auth_Ipi_Base_Number',
		/*
		'Auth_Ipn_Number',
		'Auth_DOB',
		'Auth_Place_Of_Birth_Id',
		'Auth_Birth_Country_Id',
		'Auth_Nationality_Id',
		'Auth_Language_Id',
		'Auth_Identity_Number',
		'Auth_Marital_Status_Id',
		'Auth_Spouse_Name',
		'Auth_Gender',
		'Active',
		'Created_Date',
		'Rowversion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
