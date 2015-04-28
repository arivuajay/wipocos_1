<?php
/* @var $this PublisheraccountController */
/* @var $model PublisherAccount */

$this->title='View #'.$model->Pub_Acc_Id;
$this->breadcrumbs=array(
	'Publishers'=>array('index'),
	'View '.'PublisherAccount',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Pub_Acc_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Pub_Acc_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Pub_Acc_Id',
		'Pub_Corporate_Name',
		'Pub_Internal_Code',
		'Pub_Ipi',
		'Pub_Ipi_Base_Number',
		'Pub_Date',
		'Pub_Place',
		'Pub_Country_Id',
		'Pub_Legal_Form_id',
		'Pub_Reg_Date',
		'Pub_Reg_Number',
		'Pub_Excerpt_Date',
		'Pub_Language_Id',
		array(
                'name' => 'Status',
                'type' => 'raw',
                'value' => $model->status
            ),
	),
)); ?>
</div>



