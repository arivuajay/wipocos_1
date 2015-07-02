<?php
/* @var $this InternalcodegenerateController */
/* @var $data InternalcodeGenerate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gen_Inter_Code_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Gen_Inter_Code_Id), array('view', 'id'=>$data->Gen_Inter_Code_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gen_User_Type')); ?>:</b>
	<?php echo CHtml::encode($data->Gen_User_Type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gen_Prefix')); ?>:</b>
	<?php echo CHtml::encode($data->Gen_Prefix); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gen_Inter_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Gen_Inter_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gen_Suffix')); ?>:</b>
	<?php echo CHtml::encode($data->Gen_Suffix); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gen_Code_Pad')); ?>:</b>
	<?php echo CHtml::encode($data->Gen_Code_Pad); ?>
	<br />


</div>