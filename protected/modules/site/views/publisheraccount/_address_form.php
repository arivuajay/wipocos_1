<?php
/* @var $this PublisheraccountaddressController */
/* @var $model PublisherAccountAddress */
/* @var $form CActiveForm */
?>

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'publisher-account-address-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pub_Acc_Id', array('value' => $publisher_model->Pub_Acc_Id));
    $countries = Myclass::getMasterCountry(false);
    ?>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6">

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Head_Address_1', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Head_Address_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Pub_Head_Address_1'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Head_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Pub_Head_Address_2'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Head_Address_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Pub_Head_Address_3'); ?>
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
                    <?php echo $form->labelEx($model, 'Pub_Mailing_Address_1', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Mailing_Address_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Pub_Mailing_Address_1'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Mailing_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Pub_Mailing_Address_2'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Mailing_Address_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Pub_Mailing_Address_3'); ?>
                    </div>
                </div>

                <!--            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Publisher_Account_1', array('class' => 'col-sm-4 control-label')); ?>
                <?php echo $form->textField($model, 'Pub_Publisher_Account_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Publisher_Account_1'); ?>
                            </div>
                
                            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Publisher_Account_2', array('class' => 'col-sm-4 control-label')); ?>
                <?php echo $form->textField($model, 'Pub_Publisher_Account_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Publisher_Account_2'); ?>
                            </div>
                
                            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Publisher_Account_3', array('class' => 'col-sm-4 control-label')); ?>
                <?php echo $form->textField($model, 'Pub_Publisher_Account_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Publisher_Account_3'); ?>
                            </div>-->

                <div class="form-group">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Unknown_Address', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8" style="margin-top: 5px;">
                        <?php echo $form->checkBox($model, 'Pub_Unknown_Address', array('class' => 'form-control', 'value'=>'Y', 'uncheckValue'=>'N')); ?>
                        <?php echo $form->error($model, 'Pub_Unknown_Address'); ?>
                    </div>
                </div>

            </div>


            <div class="col-lg-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Head_Telephone', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Head_Telephone', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Pub_Head_Telephone'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Head_Email', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Head_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Pub_Head_Email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Head_Website', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Head_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Pub_Head_Website'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Head_Fax', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Head_Fax', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Pub_Head_Fax'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Mailing_Telephone', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Mailing_Telephone', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Pub_Mailing_Telephone'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Mailing_Fax', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Mailing_Fax', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Pub_Mailing_Fax'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Mailing_Email', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Mailing_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Pub_Mailing_Email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Mailing_Website', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Pub_Mailing_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Pub_Mailing_Website'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pub_Addr_Country_Id', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->dropDownList($model, 'Pub_Addr_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Pub_Addr_Country_Id'); ?>
                    </div>
                </div>

                <!--            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Producer_Account_1', array('class' => 'col-sm-4 control-label')); ?>
                <?php echo $form->textField($model, 'Pub_Producer_Account_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Producer_Account_1'); ?>
                            </div>
                
                            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Producer_Account_2', array('class' => 'col-sm-4 control-label')); ?>
                <?php echo $form->textField($model, 'Pub_Producer_Account_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Producer_Account_2'); ?>
                            </div>
                
                            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Producer_Account_3', array('class' => 'col-sm-4 control-label')); ?>
                <?php echo $form->textField($model, 'Pub_Producer_Account_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Producer_Account_3'); ?>
                            </div>-->
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