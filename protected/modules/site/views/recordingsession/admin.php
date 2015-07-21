<?php
/* @var $this RecordingsessionController */
/* @var $model RecordingSession */

$this->breadcrumbs=array(
	'Recording Session Sheets'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RecordingSession', 'url'=>array('index')),
	array('label'=>'Create RecordingSession', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#recording-session-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Recording Session Sheets</h1>

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
	'id'=>'recording-session-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Rcd_Ses_Id',
		'Rcd_Ses_GUID',
		'Rcd_Ses_Title',
		'Rcd_Ses_Internal_Code',
		'Rcd_Ses_Language_Id',
		'Rcd_Ses_Orchestra',
		/*
		'Rcd_Ses_Ref_Medium',
		'Rcd_Ses_Hours',
		'Rcd_Ses_Record_Date',
		'Rcd_Ses_Studio_Id',
		'Rcd_Ses_Producer',
		'Rcd_Ses_Main_Artist',
		'Rcd_Ses_Medium_Id',
		'Rcd_Ses_Type_Id',
		'Rcd_Ses_Destination_Id',
		'Rcd_Ses_Country_Id',
		'Rcd_Ses_Factor_Id',
		'Rcd_Ses_Release_Year',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
