<?php
/* @var $this SocietyController */
/* @var $model Society */
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
        <?php echo $form->label($model, 'Society_Id'); ?>
        <?php echo $form->textField($model, 'Society_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Abbr_Id'); ?>
        <?php echo $form->textField($model, 'Society_Abbr_Id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Logo_File'); ?>
        <?php echo $form->textField($model, 'Society_Logo_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Mailing_Address'); ?>
        <?php echo $form->textArea($model, 'Society_Mailing_Address', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Country_Id'); ?>
        <?php echo $form->textField($model, 'Society_Country_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Territory_Id'); ?>
        <?php echo $form->textField($model, 'Society_Territory_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Region_Id'); ?>
        <?php echo $form->textField($model, 'Society_Region_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Profession_Id'); ?>
        <?php echo $form->textField($model, 'Society_Profession_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Role_Id'); ?>
        <?php echo $form->textField($model, 'Society_Role_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Hirearchy_Id'); ?>
        <?php echo $form->textField($model, 'Society_Hirearchy_Id', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Payment_Id'); ?>
        <?php echo $form->textField($model, 'Society_Payment_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Type_Id'); ?>
        <?php echo $form->textField($model, 'Society_Type_Id', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Factor'); ?>
        <?php echo $form->textField($model, 'Society_Factor', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Doc_Type_Id'); ?>
        <?php echo $form->textField($model, 'Society_Doc_Type_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Doc_Id'); ?>
        <?php echo $form->textField($model, 'Society_Doc_Id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Duration'); ?>
        <?php echo $form->textField($model, 'Society_Duration', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_CopyRight'); ?>
        <?php echo $form->textField($model, 'Society_CopyRight', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_RelatedRights'); ?>
        <?php echo $form->textField($model, 'Society_RelatedRights', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Currency'); ?>
        <?php echo $form->textField($model, 'Society_Currency', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Rate'); ?>
        <?php echo $form->textField($model, 'Society_Rate', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Main_Performer_Id'); ?>
        <?php echo $form->textField($model, 'Society_Main_Performer_Id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'Society_Producer_Id'); ?>
        <?php echo $form->textField($model, 'Society_Producer_Id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
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