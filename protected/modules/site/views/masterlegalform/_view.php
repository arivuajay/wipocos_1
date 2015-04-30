<?php
/* @var $this MasterlegalformController */
/* @var $data MasterLegalForm */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Master_Legal_Form_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Master_Legal_Form_Id), array('view', 'id' => $data->Master_Legal_Form_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Legal_Form_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Legal_Form_Name); ?>
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