<?php
/* @var $this PerformeraccountController */
/* @var $model PerformerAccount */

$this->title='View #'.$model->Perf_Acc_Id;
$this->breadcrumbs=array(
	'Performers'=>array('index'),
	'View '.'PerformerAccount',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Perf_Acc_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Perf_Acc_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Perf_Acc_Id',
		'Perf_Sur_Name',
		'Perf_First_Name',
		'Perf_Internal_Code',
		'Perf_Ipi_Number',
		'Perf_Ipi_Base_Number',
		'Perf_Ipn_Number',
		'Perf_Date_Of_Birth',
		'Perf_Place_Of_Birth_Id',
		'Perf_Birth_Country_Id',
		'Perf_Nationality_Id',
		'Perf_Language_Id',
		'Perf_Identity_Number',
		'Perf_Marital_Status_Id',
		'Perf_Spouse_Name',
		'Perf_Gender',
		array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
	),
)); ?>
</div>



