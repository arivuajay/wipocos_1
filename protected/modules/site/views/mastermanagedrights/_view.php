<?php
/* @var $this MastermanagedrightsController */
/* @var $data MasterManagedRights */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Mgd_Rights_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Mgd_Rights_Id), array('view', 'id'=>$data->Master_Mgd_Rights_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mgd_Rights_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Mgd_Rights_Name); ?>
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