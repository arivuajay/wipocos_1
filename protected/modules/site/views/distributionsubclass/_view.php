<?php
/* @var $this DistributionsubclassController */
/* @var $data DistributionSubclass */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subclass_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Subclass_Id), array('view', 'id'=>$data->Subclass_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Class_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Class_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subclass_Code')); ?>:</b>
	<?php echo CHtml::encode($data->Subclass_Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subclass_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Subclass_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subclass_Measure_Unit')); ?>:</b>
	<?php echo CHtml::encode($data->Subclass_Measure_Unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subclass_Calc_Unit')); ?>:</b>
	<?php echo CHtml::encode($data->Subclass_Calc_Unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subclass_Dist_Params')); ?>:</b>
	<?php echo CHtml::encode($data->Subclass_Dist_Params); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Subclass_Admin_Cost')); ?>:</b>
	<?php echo CHtml::encode($data->Subclass_Admin_Cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subclass_Social_Deduct')); ?>:</b>
	<?php echo CHtml::encode($data->Subclass_Social_Deduct); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subclass_Cultural_Deduct')); ?>:</b>
	<?php echo CHtml::encode($data->Subclass_Cultural_Deduct); ?>
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