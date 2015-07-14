<?php
/* @var $this RecordingsessionController */
/* @var $data RecordingSession */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Rcd_Ses_Id), array('view', 'id'=>$data->Rcd_Ses_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_GUID')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_GUID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Title')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Internal_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Internal_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Language_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Language_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Orchestra')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Orchestra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Ref_Medium')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Ref_Medium); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Hours')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Record_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Record_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Studio_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Studio_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Producer')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Producer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Main_Artist')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Main_Artist); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Medium_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Medium_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Type_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Type_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Destination_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Destination_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Country_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Country_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Factor_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Factor_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Ses_Release_Year')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Ses_Release_Year); ?>
	<br />

	*/ ?>

</div>