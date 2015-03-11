<?php
/* @var $this MastermoduleController */
/* @var $data MasterModule */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Module_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Module_ID), array('view', 'id'=>$data->Master_Module_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Module_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Module_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
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