<?php
/* @var $this MasterdocumentController */
/* @var $data MasterDocument */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Master_Doc_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Master_Doc_Id), array('view', 'id' => $data->Master_Doc_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Doc_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Doc_Name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Doc_Comment')); ?>:</b>
    <?php echo CHtml::encode($data->Doc_Comment); ?>
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