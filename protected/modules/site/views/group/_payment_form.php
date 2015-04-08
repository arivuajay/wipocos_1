<?php
/* @var $this AuthorPaymentMethodController */
/* @var $model AuthorPaymentMethod */
/* @var $form CActiveForm */
?>

<div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'group-payment-method-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            echo $form->hiddenField($model, 'Group_Id', array('value' => $group_model->Group_Id));
            ?>
            <div class="box-body">

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'Group_Pay_Method_id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php $pay_methods = CHtml::listData(MasterPaymentMethod::model()->isActive()->findAll(), 'Master_Paymode_Id', 'Paymode_Name'); ?>
                        <?php echo $form->dropDownList($model, 'Group_Pay_Method_id', $pay_methods, array('class' => 'form-control', 'prompt' => '')); ?>
<?php echo $form->error($model, 'Group_Pay_Method_id'); ?>
                    </div>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'Group_Bank_Account_1', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Group_Bank_Account_1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($model, 'Group_Bank_Account_1'); ?>
                    </div>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'Group_Bank_Account_2', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Group_Bank_Account_2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($model, 'Group_Bank_Account_2'); ?>
                    </div>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'Group_Bank_Account_3', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Group_Bank_Account_3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($model, 'Group_Bank_Account_3'); ?>
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
