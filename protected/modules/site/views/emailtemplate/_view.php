<?php
/* @var $this EmailtemplateController */
/* @var $data EmailTemplate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email_Temp_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Email_Temp_Id), array('view', 'id'=>$data->Email_Temp_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email_Temp_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Email_Temp_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email_Temp_From')); ?>:</b>
	<?php echo CHtml::encode($data->Email_Temp_From); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email_Temp_ReplyTo')); ?>:</b>
	<?php echo CHtml::encode($data->Email_Temp_ReplyTo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email_Temp_Subject')); ?>:</b>
	<?php echo CHtml::encode($data->Email_Temp_Subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email_Temp_Content')); ?>:</b>
	<?php echo CHtml::encode($data->Email_Temp_Content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email_Temp_Params')); ?>:</b>
	<?php echo CHtml::encode($data->Email_Temp_Params); ?>
	<br />

	<?php /*
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