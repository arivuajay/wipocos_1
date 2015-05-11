<?php
/* @var $this MasterLabelController */
/* @var $data MasterLabel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Label_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Label_Id), array('view', 'id'=>$data->Master_Label_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Label_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Label_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Label_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Label_Name); ?>
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