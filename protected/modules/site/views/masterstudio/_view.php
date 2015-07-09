<?php
/* @var $this MasterstudioController */
/* @var $data MasterStudio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Studio_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Studio_Id), array('view', 'id'=>$data->Studio_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Studio_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Studio_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Studio_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Studio_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Studio_Description')); ?>:</b>
	<?php echo CHtml::encode($data->Studio_Description); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Created_By')); ?>:</b>
	<?php echo CHtml::encode($data->Created_By); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Updated_By')); ?>:</b>
	<?php echo CHtml::encode($data->Updated_By); ?>
	<br />

	*/ ?>

</div>