<?php
/* @var $this OrganizationController */
/* @var $model Organization */
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
        <?php echo $form->label($model, 'Org_Id'); ?>
        <?php echo $form->textField($model, 'Org_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Code'); ?>
        <?php echo $form->textField($model, 'Org_Code', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Abbrevation'); ?>
        <?php echo $form->textField($model, 'Org_Abbrevation', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Nation_Id'); ?>
        <?php echo $form->textField($model, 'Org_Nation_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Country_Id'); ?>
        <?php echo $form->textField($model, 'Org_Country_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Currency'); ?>
        <?php echo $form->textField($model, 'Org_Currency', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Society_Type_Id'); ?>
        <?php echo $form->textField($model, 'Org_Society_Type_Id', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Address'); ?>
        <?php echo $form->textArea($model, 'Org_Address', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Telephone'); ?>
        <?php echo $form->textField($model, 'Org_Telephone', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Email'); ?>
        <?php echo $form->textField($model, 'Org_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Fax'); ?>
        <?php echo $form->textField($model, 'Org_Fax', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Website'); ?>
        <?php echo $form->textField($model, 'Org_Website', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Bank_Account'); ?>
        <?php echo $form->textField($model, 'Org_Bank_Account', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Org_Related_Rights'); ?>
        <?php echo $form->textField($model, 'Org_Related_Rights', array('class' => 'form-control')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->