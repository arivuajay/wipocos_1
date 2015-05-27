<?php
/* @var $this RecordingController */
/* @var $data Recording */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Rcd_Id), array('view', 'id'=>$data->Rcd_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Title')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Language_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Language_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Internal_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Internal_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Type_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Type_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Duration')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Duration); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Record_Country_id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Record_Country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Product_Country_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Product_Country_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Doc_Status_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Doc_Status_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Record_Type_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Record_Type_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Label_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Label_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Reference')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Reference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_File')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_File); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Isrc_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Isrc_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rcd_Iswc_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Rcd_Iswc_Number); ?>
	<br />

	*/ ?>

</div>