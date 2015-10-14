<?php
/* @var $this DistributionlogsheetController */
/* @var $data DistributionLogsheet */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Log_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Log_Id), array('view', 'id'=>$data->Log_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Period_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Period_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Log_User_Cust_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Log_User_Cust_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Log_Place_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Log_Place_Id); ?>
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