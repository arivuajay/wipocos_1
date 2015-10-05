<?php
/* @var $this AuthoraccountaddressController */
/* @var $model AuthorAccountAddress */
/* @var $form CActiveForm */
?>

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'group-account-address-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Group_Id', array('value' => $group_model->Group_Id));
    $countries = Myclass::getMasterCountry(false);
    ?>

    <div class="col-lg-5">
        <div class="box-body">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Rep_Name', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Rep_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Group_Rep_Name'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Rep_Address_1', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Rep_Address_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            </div>

            <div class="form-group">
                <?php echo $form->textField($model, 'Group_Rep_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Group_Rep_Address_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->textField($model, 'Group_Rep_Address_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Group_Rep_Address_3'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->textField($model, 'Group_Rep_Address_4', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Group_Rep_Address_4'); ?>
            </div>

            <div class="clearfix"></div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Home_Address_1', array('class' => '')); ?>
                <?php echo $form->textArea($model, 'Group_Home_Address_1', array('class' => 'form-control', 'rows' => '5')); ?>
                <?php echo $form->error($model, 'Group_Home_Address_1'); ?>
            </div>

            <div class="form-group hide">
                <?php echo $form->textField($model, 'Group_Home_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Group_Home_Address_2'); ?>
            </div>

            <div class="form-group hide">
                <?php echo $form->textField($model, 'Group_Home_Address_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Group_Home_Address_3'); ?>
            </div>

            <div class="form-group hide">
                <?php echo $form->textField($model, 'Group_Home_Address_4', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Group_Home_Address_4'); ?>
            </div>

            <div class="clearfix"></div>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Mailing_Address_1', array('class' => '')); ?>
                <?php echo $form->textArea($model, 'Group_Mailing_Address_1', array('class' => 'form-control', 'rows' => '5')); ?>
                <?php echo $form->error($model, 'Group_Mailing_Address_1'); ?>
            </div>

            <div class="form-group hide">
                <?php echo $form->textField($model, 'Group_Mailing_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Group_Mailing_Address_2'); ?>
            </div>

            <div class="form-group hide">
                <?php echo $form->textField($model, 'Group_Mailing_Address_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Group_Mailing_Address_3'); ?>
            </div>

            <div class="form-group hide">
                <?php echo $form->textField($model, 'Group_Mailing_Address_4', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Group_Mailing_Address_4'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Unknown_Address', array('class' => '')); ?><br />
                <?php echo $form->checkBox($model, 'Group_Unknown_Address', array('class' => 'form-control', 'value'=>'Y', 'uncheckValue'=>'N')); ?>
                <?php echo $form->error($model, 'Group_Unknown_Address'); ?>
            </div>

        </div>

    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
        <div class="box-body">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Home_Telephone', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Home_Telephone', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'Group_Home_Telephone'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Home_Email', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Home_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'Group_Home_Email'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Home_Website', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Home_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Group_Home_Website'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Home_Fax', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Home_Fax', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'Group_Home_Fax'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Mailing_Telephone', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Mailing_Telephone', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'Group_Mailing_Telephone'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Mailing_Fax', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Mailing_Fax', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'Group_Mailing_Fax'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Mailing_Email', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Mailing_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'Group_Mailing_Email'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Mailing_Website', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Group_Mailing_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Group_Mailing_Website'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Group_Country_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Group_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($model, 'Group_Country_Id'); ?>
            </div>

        </div>
    </div>



    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
