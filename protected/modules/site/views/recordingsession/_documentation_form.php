<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'recordingsession-documentation-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Rcd_Ses_Id', array('value' => $record_ses_model->Rcd_Ses_Id));
    $doc_status = CHtml::listData(MasterDocumentStatus::model()->isActive()->findAll(), 'Master_Document_Sts_Id', 'Document_Sts_Name');
    $doc_type = Myclass::getMasterDocument();
    ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Ses_Doc_Status_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Rcd_Ses_Doc_Status_Id', $doc_status, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Rcd_Ses_Doc_Status_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Ses_Doc_Type_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Rcd_Ses_Doc_Type_Id', $doc_type, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Rcd_Ses_Doc_Type_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Ses_Doc_Sign_Date', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Rcd_Ses_Doc_Sign_Date', array('class' => 'form-control date')); ?>
                <?php echo $form->error($model, 'Rcd_Ses_Doc_Sign_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Ses_Doc_File', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Rcd_Ses_Doc_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Rcd_Ses_Doc_File'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>