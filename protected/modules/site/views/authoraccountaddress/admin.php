<?php
/* @var $this AuthoraccountaddressController */
/* @var $model AuthorAccountAddress */

$this->breadcrumbs=array(
	'Author Account Addresses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AuthorAccountAddress', 'url'=>array('index')),
	array('label'=>'Create AuthorAccountAddress', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#author-account-address-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Author Account Addresses</h1>

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
	'id'=>'author-account-address-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Auth_Addr_Id',
		'Auth_Acc_Id',
		'Auth_Home_Address_1',
		'Auth_Home_Address_2',
		'Auth_Home_Address_3',
		'Auth_Home_Fax',
		/*
		'Auth_Home_Telephone',
		'Auth_Home_Email',
		'Auth_Home_Website',
		'Auth_Mailing_Address_1',
		'Auth_Mailing_Address_2',
		'Auth_Mailing_Address_3',
		'Auth_Mailing_Telephone',
		'Auth_Mailing_Fax',
		'Auth_Mailing_Email',
		'Auth_Mailing_Website',
		'Auth_Author_Account_1',
		'Auth_Author_Account_2',
		'Auth_Author_Account_3',
		'Auth_Performer_Account_1',
		'Auth_Performer_Account_2',
		'Auth_Performer_Account_3',
		'Auth_Unknown_Address',
		'Active',
		'Created_Date',
		'Rowversion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
