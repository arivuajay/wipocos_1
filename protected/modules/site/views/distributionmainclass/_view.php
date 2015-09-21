<?php
/* @var $this DistributionmainclassController */
/* @var $data DistributionMainClass */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Main_Class_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Main_Class_Id), array('view', 'id'=>$data->Main_Class_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Main_Class_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Main_Class_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Main_Class_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Main_Class_Code); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created_By')); ?>:</b>
	<?php echo CHtml::encode($data->Created_By); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Updated_By')); ?>:</b>
	<?php echo CHtml::encode($data->Updated_By); ?>
	<br />

	*/ ?>

</div>