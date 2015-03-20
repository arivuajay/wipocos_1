<?php
/* @var $this OrganizationController */
/* @var $data Organization */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Org_Id), array('view', 'id'=>$data->Org_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Abbr_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Abbr_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Logo_File')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Logo_File); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Mailing_Address')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Mailing_Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Country_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Country_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Territory_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Territory_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Region_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Region_Id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Profession_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Profession_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Role_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Role_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Hirearchy_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Hirearchy_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Payment_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Payment_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Type_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Type_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Factor_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Factor_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Doc_Type_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Doc_Type_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Doc_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Doc_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Duration')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_CopyRight')); ?>:</b>
	<?php echo CHtml::encode($data->Org_CopyRight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_RelatedRights')); ?>:</b>
	<?php echo CHtml::encode($data->Org_RelatedRights); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Currency')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Rate')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Main_Performer_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Main_Performer_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Org_Producer_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Org_Producer_Id); ?>
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