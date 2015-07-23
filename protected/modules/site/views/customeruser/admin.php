<?php
/* @var $this CustomeruserController */
/* @var $model CustomerUser */

$this->breadcrumbs=array(
	'Users & Customers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CustomerUser', 'url'=>array('index')),
	array('label'=>'Create CustomerUser', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users & Customers</h1>

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
	'id'=>'customer-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'User_Cust_Id',
		'User_Cust_GUID',
		'User_Cust_Place_Id',
		'User_Cust_Code',
		'User_Cust_Name',
		'User_Cust_Address',
		/*
		'User_Cust_Email',
		'User_Cust_Telephone',
		'User_Cust_Website',
		'User_Cust_Fax',
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
