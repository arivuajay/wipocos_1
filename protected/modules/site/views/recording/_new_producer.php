<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'producer-account-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:InsertNewProducer'
    ),
    'enableAjaxValidation' => true,
        ));
?>
<div class="col-lg-12">
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Internal_Code', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pro_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
            <?php echo $form->error($model, 'Pro_Internal_Code'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Corporate_Name', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pro_Corporate_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Pro_Corporate_Name'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Pro_Ipi_Base_Number', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pro_Ipi_Base_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Pro_Ipi_Base_Number'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Date', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pro_Date', array('class' => 'form-control date')); ?>
            <?php echo $form->error($model, 'Pro_Date'); ?>
        </div>
    </div>
</div>

<div class="box-footer">
    <div class="form-group">
        <div class="col-lg-12">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            <?php echo CHtml::button('Back', array('class' => 'btn btn-default', 'onclick' => '{$("#new-producer-dismiss").trigger("click"); $("#producer").trigger("click")}')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
