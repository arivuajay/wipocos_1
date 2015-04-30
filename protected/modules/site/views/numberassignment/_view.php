<?php
/* @var $this NumberassignmentController */
/* @var $data NumberAssignment */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Num_Assgn_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Num_Assgn_Id), array('view', 'id' => $data->Num_Assgn_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Num_Assgn_System_Id')); ?>:</b>
    <?php echo CHtml::encode($data->Num_Assgn_System_Id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Num_Assgn_Series_From')); ?>:</b>
    <?php echo CHtml::encode($data->Num_Assgn_Series_From); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Num_Assgn_Series_To')); ?>:</b>
    <?php echo CHtml::encode($data->Num_Assgn_Series_To); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Num_Assgn_List')); ?>:</b>
    <?php echo CHtml::encode($data->Num_Assgn_List); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
    <?php echo CHtml::encode($data->Active); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Created_Date')); ?>:</b>
    <?php echo CHtml::encode($data->Created_Date); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('Rowversion')); ?>:</b>
      <?php echo CHtml::encode($data->Rowversion); ?>
      <br />

     */ ?>

</div>