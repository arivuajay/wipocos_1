<?php
/* @var $this MasterworkscategoryController */
/* @var $data MasterWorksCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master_Work_Category_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Master_Work_Category_Id), array('view', 'id'=>$data->Master_Work_Category_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Work_Category_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Work_Category_Name); ?>
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