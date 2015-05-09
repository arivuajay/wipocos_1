<?php
/* @var $this ProducerLabelOwnerController */
/* @var $data ProducerLabelOwner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Label_Owner_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Label_Owner_Id), array('view', 'id'=>$data->Label_Owner_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pro_Acc_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Pro_Acc_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Label_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Label_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Label_Owner_From')); ?>:</b>
	<?php echo CHtml::encode($data->Label_Owner_From); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Label_Owner_To')); ?>:</b>
	<?php echo CHtml::encode($data->Label_Owner_To); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Label_Share')); ?>:</b>
	<?php echo CHtml::encode($data->Label_Share); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Created_Date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Rowversion')); ?>:</b>
	<?php echo CHtml::encode($data->Rowversion); ?>
	<br />

	*/ ?>

</div>