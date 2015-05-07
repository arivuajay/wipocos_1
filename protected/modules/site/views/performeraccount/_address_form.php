<?php
/* @var $this PerformeraccountaddressController */
/* @var $model PerformerAccountAddress */
/* @var $form CActiveForm */
?>

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'performer-account-address-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Perf_Acc_Id', array('value' => $performer_model->Perf_Acc_Id));
    ?>
    <div class="col-lg-5">
        <div class="box-body">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Home_Address_1', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Home_Address_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Home_Address_1'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->textField($model, 'Perf_Home_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Home_Address_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->textField($model, 'Perf_Home_Address_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Home_Address_3'); ?>
            </div>

            <div class="clearfix"></div>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Mailing_Address_1', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Mailing_Address_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Mailing_Address_1'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->textField($model, 'Perf_Mailing_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Mailing_Address_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->textField($model, 'Perf_Mailing_Address_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Mailing_Address_3'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Author_Account_1', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Author_Account_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Author_Account_1'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Author_Account_2', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Author_Account_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Author_Account_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Author_Account_3', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Author_Account_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Author_Account_3'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Unknown_Address', array('class' => '')); ?><br />
                <?php echo $form->checkBox($model, 'Perf_Unknown_Address', array('class' => 'form-control', 'checked' => $model->Perf_Unknown_Address == 'Y' ? true : false)); ?>
                <?php echo $form->error($model, 'Perf_Unknown_Address'); ?>
            </div>

        </div>

    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
        <div class="box-body">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Home_Telephone', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Home_Telephone', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'Perf_Home_Telephone'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Home_Email', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Home_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'Perf_Home_Email'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Home_Website', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Home_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Perf_Home_Website'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Home_Fax', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Home_Fax', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'Perf_Home_Fax'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Mailing_Telephone', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Mailing_Telephone', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'Perf_Mailing_Telephone'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Mailing_Fax', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Mailing_Fax', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'Perf_Mailing_Fax'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Mailing_Email', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Mailing_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'Perf_Mailing_Email'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Mailing_Website', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Mailing_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Perf_Mailing_Website'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Performer_Account_1', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Performer_Account_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Performer_Account_1'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Performer_Account_2', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Performer_Account_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Performer_Account_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Performer_Account_3', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Performer_Account_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Perf_Performer_Account_3'); ?>
            </div>
        </div>
    </div>



    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
