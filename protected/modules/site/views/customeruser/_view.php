<?php
/* @var $this CustomeruserController */
/* @var $data CustomerUser */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->User_Cust_Id), array('view', 'id'=>$data->User_Cust_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_GUID')); ?>:</b>
	<?php echo CHtml::encode($data->User_Cust_GUID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_Place_Id')); ?>:</b>
	<?php echo CHtml::encode($data->User_Cust_Place_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_Code')); ?>:</b>
	<?php echo CHtml::encode($data->User_Cust_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_Name')); ?>:</b>
	<?php echo CHtml::encode($data->User_Cust_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_Address')); ?>:</b>
	<?php echo CHtml::encode($data->User_Cust_Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_Email')); ?>:</b>
	<?php echo CHtml::encode($data->User_Cust_Email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_Telephone')); ?>:</b>
	<?php echo CHtml::encode($data->User_Cust_Telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_Website')); ?>:</b>
	<?php echo CHtml::encode($data->User_Cust_Website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Cust_Fax')); ?>:</b>
	<?php echo CHtml::encode($data->User_Cust_Fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Created_Date); ?>
	<br />

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