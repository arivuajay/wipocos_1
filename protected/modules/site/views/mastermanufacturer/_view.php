<?php
/* @var $this MastermanufacturerController */
/* @var $data MasterManufacturer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Manf_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Manf_Id), array('view', 'id'=>$data->Master_Manf_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Manf_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Manf_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Manf_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Manf_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Manf_Description')); ?>:</b>
	<?php echo CHtml::encode($data->Manf_Description); ?>
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