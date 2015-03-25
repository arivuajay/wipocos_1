<?php
/* @var $this SocietyController */
/* @var $data Society */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Society_Id), array('view', 'id'=>$data->Society_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Abbr_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Abbr_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Logo_File')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Logo_File); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Mailing_Address')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Mailing_Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Country_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Country_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Territory_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Territory_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Region_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Region_Id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Profession_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Profession_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Role_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Role_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Hirearchy_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Hirearchy_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Payment_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Payment_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Type_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Type_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Factor_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Factor_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Doc_Type_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Doc_Type_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Doc_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Doc_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Duration')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_CopyRight')); ?>:</b>
	<?php echo CHtml::encode($data->Society_CopyRight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_RelatedRights')); ?>:</b>
	<?php echo CHtml::encode($data->Society_RelatedRights); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Currency')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Rate')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Main_Performer_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Main_Performer_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Society_Producer_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Society_Producer_Id); ?>
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