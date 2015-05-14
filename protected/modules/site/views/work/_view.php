<?php
/* @var $this WorkController */
/* @var $data Work */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Work_Id), array('view', 'id'=>$data->Work_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Org_Title')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Org_Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Language_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Language_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Internal_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Internal_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Iswc')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Iswc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Wic_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Wic_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Type_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Type_Id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Factor')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Factor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Instrumentation')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Instrumentation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Duration')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Creation')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Creation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Opus_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Opus_Number); ?>
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