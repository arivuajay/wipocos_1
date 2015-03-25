<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->title='View #'.$model->Org_Id;
$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	'View '.'Organization',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Org_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Org_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Org_Id',
		'Org_Code',
		'Org_Abbrevation',
		'Org_Nation_Id',
		'Org_Country_Id',
		'Org_Currency',
		'Org_Society_Type_Id',
		'Org_Address',
		'Org_Telephone',
		'Org_Email',
		'Org_Fax',
		'Org_Website',
		'Org_Bank_Account',
		'Org_Related_Rights',
		array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
	),
)); ?>
</div>



