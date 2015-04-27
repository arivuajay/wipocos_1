<?php
/* @var $this ProduceraccountController */
/* @var $data ProducerAccount */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Acc_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Pro_Acc_Id), array('view', 'id'=>$data->Pro_Acc_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Corporate_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Corporate_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Internal_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Internal_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Ipi')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Ipi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Ipi_Base_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Ipi_Base_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Place')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Place); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Country_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Country_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Legal_Form_id')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Legal_Form_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Reg_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Reg_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Reg_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Reg_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Excerpt_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Excerpt_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Language_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Language_Id); ?>
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

	*/ ?>

</div>