<?php
/* @var $this ContractinvoiceController */
/* @var $data ContractInvoice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Inv_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Inv_Id), array('view', 'id'=>$data->Inv_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Inv_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Inv_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tarf_Cont_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Tarf_Cont_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Inv_Repeat_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Inv_Repeat_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Inv_Repeat_Count')); ?>:</b>
	<?php echo CHtml::encode($data->Inv_Repeat_Count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Inv_Next_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Inv_Next_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Created_Date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Rowversion')); ?>:</b>
	<?php echo CHtml::encode($data->Rowversion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created_By')); ?>:</b>
	<?php echo CHtml::encode($data->Created_By); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Updated_By')); ?>:</b>
	<?php echo CHtml::encode($data->Updated_By); ?>
	<br />

	*/ ?>

</div>