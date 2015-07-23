<?php
/* @var $this InspectorController */
/* @var $data Inspector */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Insp_Id), array('view', 'id'=>$data->Insp_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_Internal_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_Internal_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_GUID')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_GUID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_Occupation')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_Occupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_DOB')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_DOB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_Nationality_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_Nationality_Id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_Birth_Place')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_Birth_Place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_Identity_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_Identity_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Insp_Region_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Insp_Region_Id); ?>
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