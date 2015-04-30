<?php
/* @var $this MasterdocumentController */
/* @var $model MasterDocument */
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
        <?php echo $form->label($model, 'Master_Doc_Id'); ?>
        <?php echo $form->textField($model, 'Master_Doc_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Doc_Name'); ?>
        <?php echo $form->textField($model, 'Doc_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 90)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Doc_Comment'); ?>
        <?php echo $form->textField($model, 'Doc_Comment', array('class' => 'form-control', 'size' => 60, 'maxlength' => 90)); ?>
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