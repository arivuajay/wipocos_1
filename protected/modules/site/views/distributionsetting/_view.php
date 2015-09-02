<?php
/* @var $this DistributionsettingController */
/* @var $data DistributionSetting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Setting_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Setting_Id), array('view', 'id'=>$data->Setting_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Setting_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Setting_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Total_Distribute')); ?>:</b>
	<?php echo CHtml::encode($data->Total_Distribute); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Closing_Distribute')); ?>:</b>
	<?php echo CHtml::encode($data->Closing_Distribute); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Updated_By')); ?>:</b>
	<?php echo CHtml::encode($data->Updated_By); ?>
	<br />

	*/ ?>

</div>