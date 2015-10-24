<?php
/* @var $this MastercoefficientController */
/* @var $data MasterCoefficient */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Coeff_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Coeff_Id), array('view', 'id'=>$data->Master_Coeff_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Coefficient')); ?>:</b>
	<?php echo CHtml::encode($data->Coefficient); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Coeff_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Coeff_Name); ?>
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