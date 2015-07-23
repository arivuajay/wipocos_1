<?php
/* @var $this MastertariffController */
/* @var $data MasterTariff */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Tarif_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Tarif_Id), array('view', 'id'=>$data->Master_Tarif_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tarif_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Tarif_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tarif_Description')); ?>:</b>
	<?php echo CHtml::encode($data->Tarif_Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tarif_Min_Tarif_Amount')); ?>:</b>
	<?php echo CHtml::encode($data->Tarif_Min_Tarif_Amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tarif_Max_Tarif_Amount')); ?>:</b>
	<?php echo CHtml::encode($data->Tarif_Max_Tarif_Amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tarif_Amount')); ?>:</b>
	<?php echo CHtml::encode($data->Tarif_Amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tarif_Percentage')); ?>:</b>
	<?php echo CHtml::encode($data->Tarif_Percentage); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Tarif_Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Tarif_Comment); ?>
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

	*/ ?>

</div>