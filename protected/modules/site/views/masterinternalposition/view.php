<?php
/* @var $this MasterinternalpositionController */
/* @var $model MasterInternalPosition */

$this->title='View #'.$model->Master_Int_Post_Id;
$this->breadcrumbs=array(
	'Master Internal Positions'=>array('index'),
	'View '.'MasterInternalPosition',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Int_Post_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Int_Post_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Int_Post_Id',
		'Int_Post_Name',
		array(
                    'label' => MasterInternalPosition::model()->getAttributeLabel('Active'),
                    'type' => 'raw',
                    'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
                ),
		
		
	),
)); ?>
</div>



