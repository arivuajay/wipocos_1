<?php
/* @var $this MastermediumController */
/* @var $data MasterMedium */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Medium_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Medium_Id), array('view', 'id'=>$data->Master_Medium_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Medium_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Medium_Name); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Updated_By')); ?>:</b>
	<?php echo CHtml::encode($data->Updated_By); ?>
	<br />


</div>