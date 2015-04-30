<?php
/* @var $this MasterdocumenttypeController */
/* @var $model MasterDocumentType */
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
        <?php echo $form->label($model, 'Master_Doc_Type_Id'); ?>
        <?php echo $form->textField($model, 'Master_Doc_Type_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Doc_Type_Name'); ?>
        <?php echo $form->textField($model, 'Doc_Type_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 90)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Doc_Type_Comment'); ?>
        <?php echo $form->textField($model, 'Doc_Type_Comment', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Doc_Type_Status_Id'); ?>
        <?php echo $form->textField($model, 'Doc_Type_Status_Id', array('class' => 'form-control')); ?>
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