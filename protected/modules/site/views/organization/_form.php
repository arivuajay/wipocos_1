<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'organization-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            ?>
            <div class="box-body">

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Code', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php
                        if ($model->isNewRecord) {
                            $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'O'));
                            $internal_code = $gen_int_code->Fullcode;
                        } else {
                            $internal_code = $model->Org_Code;
                        }
                        ?>

                        <?php echo $form->textField($model, 'Org_Code', array('class' => 'form-control', 'size' => 25, 'maxlength' => 255, 'readonly' => true, 'value' => $internal_code)); ?>
                        <?php echo $form->error($model, 'Org_Code'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Abbrevation', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Org_Abbrevation', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Org_Abbrevation'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Nation_Id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php $nationalities = Myclass::getMasterNationality(); ?>
                        <?php echo $form->dropDownList($model, 'Org_Nation_Id', $nationalities, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Org_Nation_Id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Country_Id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php $countries = Myclass::getMasterCountry(); ?>
                        <?php echo $form->dropDownList($model, 'Org_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Org_Country_Id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Currency_Id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php $currencies = Myclass::getMasterCurrency() ?>
                        <?php echo $form->dropDownList($model, 'Org_Currency_Id', $currencies, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Org_Currency_Id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Society_Type_Id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php $social_types = $model->getSocialType(); ?>
                        <?php echo $form->dropDownList($model, 'Org_Society_Type_Id', $social_types, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Org_Society_Type_Id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Address', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textArea($model, 'Org_Address', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                        <?php echo $form->error($model, 'Org_Address'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Telephone', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Org_Telephone', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Org_Telephone'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Email', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Org_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Org_Email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Fax', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Org_Fax', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Org_Fax'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Website', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Org_Website', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Org_Website'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Bank_Account', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Org_Bank_Account', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Org_Bank_Account'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Org_Related_Rights', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Org_Related_Rights', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Org_Related_Rights'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Active', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->checkBox($model, 'Active', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Active'); ?>
                    </div>
                </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>