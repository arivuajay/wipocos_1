<?php
/* @var $this PublisheraccountController */
/* @var $data PublisherAccount */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Acc_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Pub_Acc_Id), array('view', 'id'=>$data->Pub_Acc_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Corporate_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Corporate_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Internal_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Internal_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Ipi')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Ipi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Ipi_Base_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Ipi_Base_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Place')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Place); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Country_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Country_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Legal_Form_id')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Legal_Form_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Reg_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Reg_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Reg_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Reg_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Excerpt_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Excerpt_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Language_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Language_Id); ?>
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