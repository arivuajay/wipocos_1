<?php
/* @var $this MasterdocumentController */
/* @var $model MasterDocument */

$this->title='View #'.$model->Master_Doc_Id;
$this->breadcrumbs=array(
	'Master Documents'=>array('index'),
	'View '.'MasterDocument',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Doc_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Doc_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Doc_Id',
		'Doc_Name',
		'Doc_Comment',
		array(
                    'label' => MasterDocument::model()->getAttributeLabel('Active'),
                    'type' => 'raw',
                    'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
                ),
		
		
	),
)); ?>
</div>



