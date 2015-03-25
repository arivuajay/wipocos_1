<?php
/* @var $this AuthoraccountController */
/* @var $model AuthorAccount */

$this->title='View #'.$model->Auth_Acc_Id;
$this->breadcrumbs=array(
	'Author Accounts'=>array('index'),
	'View '.'AuthorAccount',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Auth_Acc_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Auth_Acc_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Auth_Acc_Id',
		'Auth_Sur_Name',
		'Auth_First_Name',
		'Auth_Internal_Code',
		'Auth_Ipi_Number',
		'Auth_Ipi_Base_Number',
		'Auth_Ipn_Number',
		'Auth_Date_Of_Birth',
		'Auth_Place_Of_Birth_Id',
		'Auth_Birth_Country_Id',
		'Auth_Nationality_Id',
		'Auth_Language_Id',
		'Auth_Identity_Number',
		'Auth_Marital_Status_Id',
		'Auth_Spouse_Name',
		'Auth_Gender',
		array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
	),
)); ?>
</div>



