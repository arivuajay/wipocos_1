<?php
/* @var $this MasterpaymentmethodController */
/* @var $data MasterPaymentMethod */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Master_Paymode_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Master_Paymode_Id), array('view', 'id' => $data->Master_Paymode_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Paymode_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Paymode_Name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Paymode_Comment')); ?>:</b>
    <?php echo CHtml::encode($data->Paymode_Comment); ?>
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