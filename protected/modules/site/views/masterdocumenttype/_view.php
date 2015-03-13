<?php
/* @var $this MasterdocumenttypeController */
/* @var $data MasterDocumentType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Doc_Type_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Doc_Type_Id), array('view', 'id'=>$data->Master_Doc_Type_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Doc_Type_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Doc_Type_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Doc_Type_Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Doc_Type_Comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Doc_Type_Status')); ?>:</b>
	<?php echo CHtml::encode($data->Doc_Type_Status); ?>
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