<?php
/* @var $this GroupController */
/* @var $data Group */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Group_Id), array('view', 'id' => $data->Group_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Group_Name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Is_Author')); ?>:</b>
    <?php echo CHtml::encode($data->Group_Is_Author); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Is_Performer')); ?>:</b>
    <?php echo CHtml::encode($data->Group_Is_Performer); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Internal_Code')); ?>:</b>
    <?php echo CHtml::encode($data->Group_Internal_Code); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Group_IPI_Name_Number')); ?>:</b>
    <?php echo CHtml::encode($data->Group_IPI_Name_Number); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Group_IPN_Base_Number')); ?>:</b>
    <?php echo CHtml::encode($data->Group_IPN_Base_Number); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('Group_IPN_Number')); ?>:</b>
      <?php echo CHtml::encode($data->Group_IPN_Number); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Date')); ?>:</b>
      <?php echo CHtml::encode($data->Group_Date); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Place')); ?>:</b>
      <?php echo CHtml::encode($data->Group_Place); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Country_Id')); ?>:</b>
      <?php echo CHtml::encode($data->Group_Country_Id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Legal_Form_Id')); ?>:</b>
      <?php echo CHtml::encode($data->Group_Legal_Form_Id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Group_Language_Id')); ?>:</b>
      <?php echo CHtml::encode($data->Group_Language_Id); ?>
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

     */ ?>

</div>