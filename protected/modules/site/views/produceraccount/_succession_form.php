<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'producer-succession-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pro_Acc_Id', array('value' => $producer_model->Pro_Acc_Id));
    ?>
    <div class="box-body">
        <?php
        $trans_date = '';
        if (isset($model->Pro_Suc_Date_Transfer) && $model->Pro_Suc_Date_Transfer != '0000-00-00') {
            $trans_date = $model->Pro_Suc_Date_Transfer;
        }
        ?>
        <!--        <div class="form-group">
        <?php echo $form->labelEx($model, 'Pro_Suc_Date_Transfer', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
        <?php echo $form->textField($model, 'Pro_Suc_Date_Transfer', array('class' => 'form-control date', 'value' => $trans_date)); ?>
        <?php echo $form->error($model, 'Pro_Suc_Date_Transfer'); ?>
                    </div>
                </div>-->

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Suc_Name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pro_Suc_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pro_Suc_Name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Suc_Address_1', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pro_Suc_Address_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 500)); ?>
                <?php echo $form->error($model, 'Pro_Suc_Address_1'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Suc_Address_2', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pro_Suc_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 500)); ?>
                <?php echo $form->error($model, 'Pro_Suc_Address_2'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Suc_Annotation', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textArea($model, 'Pro_Suc_Annotation', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'Pro_Suc_Annotation'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>