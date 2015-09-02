<?php
/* @var $this DistributionclassController */
/* @var $data DistributionClass */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Class_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Class_Id), array('view', 'id'=>$data->Class_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Class_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Class_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Class_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Class_Name); ?>
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


</div>