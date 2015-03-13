<?php
/* @var $this MasterregionController */
/* @var $data MasterRegion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Region_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Region_Id), array('view', 'id'=>$data->Master_Region_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Region_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Region_Name); ?>
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


</div>