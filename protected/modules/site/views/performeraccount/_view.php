<?php
/* @var $this PerformeraccountController */
/* @var $data PerformerAccount */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Acc_Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Perf_Acc_Id), array('view', 'id' => $data->Perf_Acc_Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Sur_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Perf_Sur_Name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_First_Name')); ?>:</b>
    <?php echo CHtml::encode($data->Perf_First_Name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Internal_Code')); ?>:</b>
    <?php echo CHtml::encode($data->Perf_Internal_Code); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Ipi')); ?>:</b>
    <?php echo CHtml::encode($data->Perf_Ipi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Ipi_Base_Number')); ?>:</b>
    <?php echo CHtml::encode($data->Perf_Ipi_Base_Number); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Ipn_Number')); ?>:</b>
    <?php echo CHtml::encode($data->Perf_Ipn_Number); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_DOB')); ?>:</b>
      <?php echo CHtml::encode($data->Perf_DOB); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Place_Of_Birth_Id')); ?>:</b>
      <?php echo CHtml::encode($data->Perf_Place_Of_Birth_Id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Birth_Country_Id')); ?>:</b>
      <?php echo CHtml::encode($data->Perf_Birth_Country_Id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Nationality_Id')); ?>:</b>
      <?php echo CHtml::encode($data->Perf_Nationality_Id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Language_Id')); ?>:</b>
      <?php echo CHtml::encode($data->Perf_Language_Id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Identity_Number')); ?>:</b>
      <?php echo CHtml::encode($data->Perf_Identity_Number); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Marital_Status_Id')); ?>:</b>
      <?php echo CHtml::encode($data->Perf_Marital_Status_Id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Spouse_Name')); ?>:</b>
      <?php echo CHtml::encode($data->Perf_Spouse_Name); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Perf_Gender')); ?>:</b>
      <?php echo CHtml::encode($data->Perf_Gender); ?>
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