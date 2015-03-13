<?php
/* @var $this MasterregionController */
/* @var $model MasterRegion */

$this->title='View #'.$model->Master_Region_Id;
$this->breadcrumbs=array(
	'Master Regions'=>array('index'),
	'View '.'MasterRegion',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Region_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Region_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Region_Id',
		'Region_Name',
		'Active',
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



