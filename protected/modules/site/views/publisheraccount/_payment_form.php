<?php
/* @var $this PublisherPaymentMethodController */
/* @var $model PublisherPaymentMethod */
/* @var $form CActiveForm */
?>

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'publisher-payment-method-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pub_Acc_Id', array('value' => $publisher_model->Pub_Acc_Id));
    ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Pay_Method_id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php $pay_methods = Myclass::getMasterPaymentMethod(); ?>
                <?php echo $form->dropDownList($model, 'Pub_Pay_Method_id', $pay_methods, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($model, 'Pub_Pay_Method_id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Bank_Account', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Bank_Account', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Bank_Account'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Pay_Address', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Pay_Address', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Pay_Address'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Pay_Iban', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Pay_Iban', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Pay_Iban'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Pay_Swift', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Pay_Swift', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Pay_Swift'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->

    <div class="box-footer text-right">
        <div class="form-group">
            <div class="col-sm-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
