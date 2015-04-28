<?php
/* @var $this ProduceraccountController */
/* @var $model ProducerAccount */

$this->title='View #'.$model->Pro_Acc_Id;
$this->breadcrumbs=array(
	'Producer Accounts'=>array('index'),
	'View '.'ProducerAccount',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Pro_Acc_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Pro_Acc_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Pro_Acc_Id',
		'Pro_Corporate_Name',
		'Pro_Internal_Code',
		'Pro_Ipi',
		'Pro_Ipi_Base_Number',
		'Pro_Date',
		'Pro_Place',
		'Pro_Country_Id',
		'Pro_Legal_Form_id',
		'Pro_Reg_Date',
		'Pro_Reg_Number',
		'Pro_Excerpt_Date',
		'Pro_Language_Id',
		array(
                'name' => 'Status',
                'type' => 'raw',
                'value' => $model->status
            ),
	),
)); ?>
</div>



