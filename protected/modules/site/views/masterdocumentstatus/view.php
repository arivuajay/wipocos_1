<?php
/* @var $this MasterdocumentstatusController */
/* @var $model MasterDocumentStatus */

$this->title='View #'.$model->Master_Document_Sts_Id;
$this->breadcrumbs=array(
	'Master Document Status'=>array('index'),
	'View '.'MasterDocumentStatus',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Document_Sts_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Document_Sts_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Document_Sts_Id',
		'Document_Sts_Code',
		'Document_Sts_Name',
		'Document_Sts_Comment',
		array(
                    'label' => MasterDocumentStatus::model()->getAttributeLabel('Active'),
                    'type' => 'raw',
                    'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
                ),
		
		
	),
)); ?>
</div>



