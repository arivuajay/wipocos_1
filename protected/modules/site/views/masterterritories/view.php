<?php
/* @var $this MasterterritoriesController */
/* @var $model MasterTerritories */

$this->title='View #'.$model->Master_Territory_Id;
$this->breadcrumbs=array(
	'Master Territories'=>array('index'),
	'View '.'MasterTerritories',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Territory_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Territory_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Territory_Id',
		'Territory_Name',
		array(
                    'label' => MasterTerritories::model()->getAttributeLabel('Active'),
                    'type' => 'raw',
                    'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
                ),
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



