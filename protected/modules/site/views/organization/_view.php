<?php
/* @var $this OrganizationController */
/* @var $data Organization */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Org_Id), array('view', 'id'=>$data->Org_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Abbrevation')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Abbrevation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Nation_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Nation_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Country_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Country_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Currency')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Society_Type_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Society_Type_Id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Address')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Telephone')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Email')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Fax')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Website')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Bank_Account')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Bank_Account); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Related_Rights')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Related_Rights); ?>
	<br />

	*/ ?>

</div>