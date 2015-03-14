<?php
/* @var $this MastermaritalstatusController */
/* @var $model MasterMaritalStatus */

$this->title='View #'.$model->Master_Marital_State_Id;
$this->breadcrumbs=array(
	'Master Marital Statuses'=>array('index'),
	'View '.'MasterMaritalStatus',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Marital_State_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Marital_State_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Marital_State_Id',
		'Marital_State',
		array(
                    'label' => MasterMaritalStatus::model()->getAttributeLabel('Active'),
                    'type' => 'raw',
                    'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
                ),
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



