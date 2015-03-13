<?php
/* @var $this MastereventtypeController */
/* @var $data MasterEventType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Evt_Type_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Evt_Type_Id), array('view', 'id'=>$data->Master_Evt_Type_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Evt_Type_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Evt_Type_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Evt_Type_Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Evt_Type_Comment); ?>
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