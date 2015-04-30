<?php
/* @var $this MasterinternalpositionController */
/* @var $data MasterInternalPosition */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Master_Int_Post_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Master_Int_Post_Id), array('view', 'id' => $data->Master_Int_Post_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Int_Post_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Int_Post_Name); ?>
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