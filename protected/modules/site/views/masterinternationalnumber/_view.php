<?php
/* @var $this MasterinternationalnumberController */
/* @var $data MasterInternationalNumber */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_International_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_International_Id), array('view', 'id'=>$data->Master_International_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('International_Number_Type')); ?>:</b>
	<?php echo CHtml::encode($data->International_Number_Type); ?>
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