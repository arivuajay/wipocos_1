<?php
/* @var $this MasterterritoriesController */
/* @var $data MasterTerritories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Territory_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Territory_Id), array('view', 'id'=>$data->Master_Territory_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Territory_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Territory_Name); ?>
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