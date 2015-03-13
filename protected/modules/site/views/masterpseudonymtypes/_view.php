<?php
/* @var $this MasterpseudonymtypesController */
/* @var $data MasterPseudonymTypes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pseudo_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Pseudo_Id), array('view', 'id'=>$data->Pseudo_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pseudo_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Pseudo_Code); ?>
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