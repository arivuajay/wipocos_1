<?php
/* @var $this MastercountryController */
/* @var $model MasterCountry */
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
        <?php echo $form->label($model, 'Master_Country_Id'); ?>
        <?php echo $form->textField($model, 'Master_Country_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Country_Name'); ?>
        <?php echo $form->textField($model, 'Country_Name', array('class' => 'form-control', 'size' => 45, 'maxlength' => 45)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Country_Two_Code'); ?>
        <?php echo $form->textField($model, 'Country_Two_Code', array('class' => 'form-control', 'size' => 2, 'maxlength' => 2)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Country_Three_Code'); ?>
        <?php echo $form->textField($model, 'Country_Three_Code', array('class' => 'form-control', 'size' => 3, 'maxlength' => 3)); ?>
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