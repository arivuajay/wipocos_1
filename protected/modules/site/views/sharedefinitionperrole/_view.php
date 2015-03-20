<?php
/* @var $this SharedefinitionperroleController */
/* @var $data ShareDefinitionPerRole */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Shr_Def_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Shr_Def_Id), array('view', 'id'=>$data->Shr_Def_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Shr_Def_Role')); ?>:</b>
	<?php echo CHtml::encode($data->Shr_Def_Role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Shr_Def_Equ_remn')); ?>:</b>
	<?php echo CHtml::encode($data->Shr_Def_Equ_remn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Shr_Def_Blank_Tape_remn')); ?>:</b>
	<?php echo CHtml::encode($data->Shr_Def_Blank_Tape_remn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Shr_Def_Neigh_Rgts')); ?>:</b>
	<?php echo CHtml::encode($data->Shr_Def_Neigh_Rgts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Shr_Def_Excl_Rgts')); ?>:</b>
	<?php echo CHtml::encode($data->Shr_Def_Excl_Rgts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Created_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Created_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rowversion')); ?>:</b>
	<?php echo CHtml::encode($data->Rowversion); ?>
	<br />

	*/ ?>

</div>