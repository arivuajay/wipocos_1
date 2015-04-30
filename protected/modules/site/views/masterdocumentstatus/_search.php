<?php
/* @var $this MasterdocumentstatusController */
/* @var $model MasterDocumentStatus */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'Master_Document_Sts_Id'); ?>
        <?php echo $form->textField($model, 'Master_Document_Sts_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Document_Sts_Code'); ?>
        <?php echo $form->textField($model, 'Document_Sts_Code', array('class' => 'form-control', 'size' => 1, 'maxlength' => 1)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Document_Sts_Name'); ?>
        <?php echo $form->textField($model, 'Document_Sts_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Document_Sts_Comment'); ?>
        <?php echo $form->textArea($model, 'Document_Sts_Comment', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Active'); ?>
        <?php echo $form->checkBox($model, 'Active', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Created_Date'); ?>
        <?php echo $form->textField($model, 'Created_Date', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Rowversion'); ?>
        <?php echo $form->textField($model, 'Rowversion', array('class' => 'form-control')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->