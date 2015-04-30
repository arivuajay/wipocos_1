<?php
/* @var $this MastercurrencyController */
/* @var $data MasterCurrency */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Master_Crncy_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Master_Crncy_Id), array('view', 'id' => $data->Master_Crncy_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Currency_Code')); ?>:</b>
    <?php echo CHtml::encode($data->Currency_Code); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Currency_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Currency_Name); ?>
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