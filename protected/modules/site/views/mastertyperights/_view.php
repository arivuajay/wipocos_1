<?php
/* @var $this MastertyperightsController */
/* @var $data MasterTypeRights */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Master_Type_Rights_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Master_Type_Rights_Id), array('view', 'id' => $data->Master_Type_Rights_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Type_Rights_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Type_Rights_Name); ?>
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