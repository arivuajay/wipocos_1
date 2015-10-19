<?php
/* @var $this DistributionutlizationperiodController */
/* @var $data DistributionUtlizationPeriod */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Period_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Period_Id), array('view', 'id'=>$data->Period_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Period_Year')); ?>:</b>
	<?php echo CHtml::encode($data->Period_Year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Period_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Period_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Period_From')); ?>:</b>
	<?php echo CHtml::encode($data->Period_From); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Period_To')); ?>:</b>
	<?php echo CHtml::encode($data->Period_To); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sub_Class_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Sub_Class_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Setting_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Setting_Id); ?>
	<br />

	<?php /*
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