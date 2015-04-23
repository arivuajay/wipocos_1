<?php
/* @var $this PublishergroupController */
/* @var $data PublisherGroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Pub_Group_Id), array('view', 'id'=>$data->Pub_Group_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Group_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_Is_Publisher')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Group_Is_Publisher); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_Is_Producer')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Group_Is_Producer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Internal_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Internal_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_IPI_Name_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_IPI_Name_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_IPN_Base_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_IPN_Base_Number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_IPD_Number')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Group_IPD_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Group_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_Place')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Group_Place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_Country_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Group_Country_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_Legal_Form_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Group_Legal_Form_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pub_Group_Language_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Pub_Group_Language_Id); ?>
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

	*/ ?>

</div>