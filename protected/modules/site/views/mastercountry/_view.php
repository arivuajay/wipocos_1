<?php
/* @var $this MastercountryController */
/* @var $data MasterCountry */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Master_Country_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Master_Country_Id), array('view', 'id' => $data->Master_Country_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Country_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Country_Name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Country_Two_Code')); ?>:</b>
    <?php echo CHtml::encode($data->Country_Two_Code); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Country_Three_Code')); ?>:</b>
    <?php echo CHtml::encode($data->Country_Three_Code); ?>
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