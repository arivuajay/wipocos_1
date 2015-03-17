<?php
/* @var $this MasterdocumentstatusController */
/* @var $data MasterDocumentStatus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Document_Sts_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Document_Sts_Id), array('view', 'id'=>$data->Master_Document_Sts_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Document_Sts_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Document_Sts_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Document_Sts_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Document_Sts_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Document_Sts_Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Document_Sts_Comment); ?>
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