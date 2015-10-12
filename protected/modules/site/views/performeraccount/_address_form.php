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
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <?php // echo $form->labelEx($model, 'Perf_Home_Address_1', array('class' => 'col-sm-4 control-label')); ?>
                    <?php echo CHtml::label($model->getAttributeLabel('Perf_Home_Address_1').' *', 'PerformerAccountAddress_Perf_Home_Address_1', array('class' => 'col-sm-4 control-label')); ?> 
                    <div class="col-sm-8">
                        <?php echo $form->textArea($model, 'Perf_Home_Address_1', array('class' => 'form-control addr-input', 'rows' => '5')); ?>
                        <?php echo $form->error($model, 'Perf_Home_Address_1'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Home_Address_2', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Home_Address_2'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Home_Address_3', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Home_Address_3'); ?>
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
                    <?php // echo $form->labelEx($model, 'Perf_Mailing_Address_1', array('class' => 'col-sm-4 control-label')); ?>
                    <?php echo CHtml::label($model->getAttributeLabel('Perf_Mailing_Address_1'), 'PerformerAccountAddress_Perf_Mailing_Address_1', array('class' => 'col-sm-4 control-label')); ?> 
                    <div class="col-sm-8">
                        <?php echo $form->textArea($model, 'Perf_Mailing_Address_1', array('class' => 'form-control addr-input', 'rows' => '5')); ?>
                        <?php echo $form->error($model, 'Perf_Mailing_Address_1'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Mailing_Address_2', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Mailing_Address_2'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Mailing_Address_3', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Mailing_Address_3'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('&nbsp;', '', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <div class="clearfix">&nbsp;</div>
                    </div>
                </div>
                
<!--                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Author_Account_1', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Author_Account_1', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Author_Account_1'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Author_Account_2', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Author_Account_2', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Author_Account_2'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Author_Account_3', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Author_Account_3', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Author_Account_3'); ?>
                    </div>
                </div>-->

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Unknown_Address', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8" style="margin-top: 5px;">
                        <?php echo $form->checkBox($model, 'Perf_Unknown_Address', array('class' => 'form-control', 'value'=>'Y', 'uncheckValue'=>'N')); ?>
                        <?php echo $form->error($model, 'Perf_Unknown_Address'); ?>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Home_Telephone', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Home_Telephone', array('class' => 'form-control addr-input', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Perf_Home_Telephone'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Home_Email', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Home_Email', array('class' => 'form-control addr-input', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Perf_Home_Email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Home_Website', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Home_Website', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Perf_Home_Website'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Home_Fax', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Home_Fax', array('class' => 'form-control addr-input', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Perf_Home_Fax'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Mailing_Telephone', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Mailing_Telephone', array('class' => 'form-control addr-input', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Perf_Mailing_Telephone'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Mailing_Fax', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Mailing_Fax', array('class' => 'form-control addr-input', 'size' => 25, 'maxlength' => 25)); ?>
                        <?php echo $form->error($model, 'Perf_Mailing_Fax'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Mailing_Email', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Mailing_Email', array('class' => 'form-control addr-input', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Perf_Mailing_Email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Mailing_Website', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Mailing_Website', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Perf_Mailing_Website'); ?>
                    </div>
                </div>

<!--                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Performer_Account_1', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Performer_Account_1', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Performer_Account_1'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Performer_Account_2', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Performer_Account_2', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Performer_Account_2'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Perf_Performer_Account_3', array('class' => 'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model, 'Perf_Performer_Account_3', array('class' => 'form-control addr-input', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'Perf_Performer_Account_3'); ?>
                    </div>
                </div>-->
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

<?php
$js = <<< EOD
    unknown = '{$model->Perf_Unknown_Address}';
    $(document).ready(function(){
        $('#PerformerAccountAddress_Perf_Unknown_Address').on('ifChecked', function(event){
            $('.addr-input').attr("readonly", true);
        });

        $('#PerformerAccountAddress_Perf_Unknown_Address').on('ifUnchecked', function(event){
            $('.addr-input').attr("readonly", false);
        });
    
        if(unknown == 'Y'){
            $('.addr-input').attr("readonly", true);
        }
    
        if(unknown == 'N'){
            $('.addr-input').attr("readonly", false);
        }
    });
EOD;
Yii::app()->clientScript->registerScript('_addr_form', $js);
?>