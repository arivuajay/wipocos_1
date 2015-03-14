<?php
/* @var $this MastermanagedrightsController */
/* @var $model MasterManagedRights */

$this->title='View #'.$model->Master_Mgd_Rights_Id;
$this->breadcrumbs=array(
	'Master Managed Rights'=>array('index'),
	'View '.'MasterManagedRights',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Mgd_Rights_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Mgd_Rights_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Mgd_Rights_Id',
		'Mgd_Rights_Name',
		array(
                    'label' => MasterManagedRights::model()->getAttributeLabel('Active'),
                    'type' => 'raw',
                    'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
                ),
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



