<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'publisher-succession-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pub_Acc_Id', array('value' => $publisher_model->Pub_Acc_Id));
    ?>
    <div class="box-header">
        <h3 class="box-title">Successor</h3>
    </div>
    <div class="box-body">
        <?php
        $trans_date = '';
        if (isset($model->Pub_Suc_Date_Transfer) && $model->Pub_Suc_Date_Transfer != '0000-00-00') {
            $trans_date = $model->Pub_Suc_Date_Transfer;
        }
        ?>
        <!--        <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Suc_Date_Transfer', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-5">
        <?php echo $form->textField($model, 'Pub_Suc_Date_Transfer', array('class' => 'form-control date', 'value' => $trans_date)); ?>
        <?php echo $form->error($model, 'Pub_Suc_Date_Transfer'); ?>
                    </div>
                </div>-->

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Suc_Name', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Suc_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Suc_Name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Suc_Liquidation_Date', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Suc_Liquidation_Date', array('class' => 'form-control date', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Suc_Liquidation_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Suc_Address_1', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Suc_Address_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 500)); ?>
                <?php echo $form->error($model, 'Pub_Suc_Address_1'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Suc_Address_2', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Suc_Address_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 500)); ?>
                <?php echo $form->error($model, 'Pub_Suc_Address_2'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Suc_Annotation', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textArea($model, 'Pub_Suc_Annotation', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'Pub_Suc_Annotation'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>