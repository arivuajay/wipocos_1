<?php
/* @var $this MastermaritalstatusController */
/* @var $data MasterMaritalStatus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Marital_State_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Marital_State_Id), array('view', 'id'=>$data->Master_Marital_State_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Marital_State')); ?>:</b>
	<?php echo CHtml::encode($data->Marital_State); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Created_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rowversion')); ?>:</b>
	<?php echo CHtml::encode($data->Rowversion); ?>
	<br />


</div>