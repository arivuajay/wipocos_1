<?php
/* @var $this AuthoraccountaddressController */
/* @var $model AuthorAccountAddress */
/* @var $form CActiveForm */
?>

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'author-account-address-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Auth_Acc_Id', array('value' => $author_model->Auth_Acc_Id));
    ?>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6">

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Home_Address_1', array('class' => 'col-sm-4 control-label')); ?> 
                    <div class="col-sm-8">
                        <?php echo $form->textArea($model, 'Auth_Home_Address_1', array('class' => 'form-control', 'rows' => '5')); ?>
                        <?php echo $form->error($model, 'Auth_Home_Address_1'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Home_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Home_Address_2'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Home_Address_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Home_Address_3'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <div class="clearfix">&nbsp;</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Mailing_Address_1', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textArea($model, 'Auth_Mailing_Address_1', array('class' => 'form-control', 'rows' => '5')); ?>
                        <?php echo $form->error($model, 'Auth_Mailing_Address_1'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Mailing_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Mailing_Address_2'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Mailing_Address_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Mailing_Address_3'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <div class="clearfix">&nbsp;</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Author_Account_1', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Author_Account_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Author_Account_1'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Author_Account_2', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Author_Account_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Author_Account_2'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Author_Account_3', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Author_Account_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Author_Account_3'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Unknown_Address', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8" style="margin-top: 5px;">
                        <?php echo $form->checkBox($model, 'Auth_Unknown_Address', array('class' => 'form-control', 'value'=>'Y', 'uncheckValue'=>'N')); ?>
                        <?php echo $form->error($model, 'Auth_Unknown_Address'); ?>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Home_Telephone', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Home_Telephone', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Auth_Home_Telephone'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Home_Email', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Home_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Auth_Home_Email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Home_Website', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Home_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Auth_Home_Website'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Home_Fax', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Home_Fax', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Auth_Home_Fax'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Mailing_Telephone', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Mailing_Telephone', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Auth_Mailing_Telephone'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Mailing_Fax', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Mailing_Fax', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Auth_Mailing_Fax'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Mailing_Email', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Mailing_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Auth_Mailing_Email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Mailing_Website', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Mailing_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Auth_Mailing_Website'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Performer_Account_1', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Performer_Account_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Performer_Account_1'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Performer_Account_2', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Performer_Account_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Performer_Account_2'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Auth_Performer_Account_3', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Auth_Performer_Account_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Auth_Performer_Account_3'); ?>
                    </div>
                </div>

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
