<?php
/* @var $this MasterprofessionController */
/* @var $data MasterProfession */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Master_Profession_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Master_Profession_Id), array('view', 'id' => $data->Master_Profession_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Profession_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Profession_Name); ?>
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