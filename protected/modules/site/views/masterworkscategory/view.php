<?php
/* @var $this MasterworkscategoryController */
/* @var $model MasterWorksCategory */

$this->title='View #'.$model->Master_Work_Category_Id;
$this->breadcrumbs=array(
	'Master Works Categories'=>array('index'),
	'View '.'MasterWorksCategory',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Work_Category_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Work_Category_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Work_Category_Id',
		'Work_Category_Name',
		'Active',
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



