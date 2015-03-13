<?php
/* @var $this MasterdocumenttypeController */
/* @var $model MasterDocumentType */

$this->title='View #'.$model->Master_Doc_Type_Id;
$this->breadcrumbs=array(
	'Master Document Types'=>array('index'),
	'View '.'MasterDocumentType',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Doc_Type_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Doc_Type_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Doc_Type_Id',
		'Doc_Type_Name',
		'Doc_Type_Comment',
		'Doc_Type_Status',
		'Active',
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



