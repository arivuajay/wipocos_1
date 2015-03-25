<?php
/* @var $this AuthoraccountController */
/* @var $data AuthorAccount */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Acc_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Auth_Acc_Id), array('view', 'id'=>$data->Auth_Acc_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Sur_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Sur_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_First_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_First_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Internal_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Internal_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Ipi_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Ipi_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Ipi_Base_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Ipi_Base_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Ipn_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Ipn_Number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Date_Of_Birth')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Date_Of_Birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Place_Of_Birth_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Place_Of_Birth_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Birth_Country_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Birth_Country_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Nationality_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Nationality_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Language_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Language_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Identity_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Identity_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Marital_Status_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Marital_Status_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Spouse_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Spouse_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Auth_Gender')); ?>:</b>
	<?php echo CHtml::encode($data->Auth_Gender); ?>
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