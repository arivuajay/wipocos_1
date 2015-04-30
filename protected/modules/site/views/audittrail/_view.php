<?php
/* @var $this AudittrailController */
/* @var $data AuditTrail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('aud_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->aud_id), array('view', 'id'=>$data->aud_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aud_user')); ?>:</b>
	<?php echo CHtml::encode($data->aud_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aud_class')); ?>:</b>
	<?php echo CHtml::encode($data->aud_class); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aud_action')); ?>:</b>
	<?php echo CHtml::encode($data->aud_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aud_message')); ?>:</b>
	<?php echo CHtml::encode($data->aud_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aud_ip_address')); ?>:</b>
	<?php echo CHtml::encode($data->aud_ip_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aud_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->aud_created_date); ?>
	<br />


</div>