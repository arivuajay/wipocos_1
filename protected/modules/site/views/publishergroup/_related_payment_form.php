<?php
/* @var $this AuthorPaymentMethodController */
/* @var $model AuthorPaymentMethod */
/* @var $form CActiveForm */
?>

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'publisher-group-related-payment-method-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pub_Group_Id', array('value' => $group_model->Pub_Group_Id));
    ?>
    <div class="box-header">
        <h4>Payments – Related Rights</h4>
    </div>
    <div class="box-body">

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Pay_Rel_Payee', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Group_Pay_Rel_Payee', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Pub_Group_Pay_Rel_Payee'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Pay_Rel_Rate', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Group_Pay_Rel_Rate', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Pub_Group_Pay_Rel_Rate'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Pay_Rel_Pay_Method', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php $pay_methods = Myclass::getMasterPaymentMethod(); ?>
                <?php echo $form->dropDownList($model, 'Pub_Group_Pay_Rel_Pay_Method', $pay_methods, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($model, 'Pub_Group_Pay_Rel_Pay_Method'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Pay_Rel_Bank_Account', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Group_Pay_Rel_Bank_Account', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Pub_Group_Pay_Rel_Bank_Account'); ?>
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
