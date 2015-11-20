<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'publisher-account-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:InsertNewPublisher'
    ),
    'enableAjaxValidation' => true,
        ));
?>
<div class="col-lg-12">
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Internal_Code', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pub_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
            <?php echo $form->error($model, 'Pub_Internal_Code'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Corporate_Name', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pub_Corporate_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Pub_Corporate_Name'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Pub_Ipi_Base_Number', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pub_Ipi_Base_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Pub_Ipi_Base_Number'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Date', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pub_Date', array('class' => 'form-control date')); ?>
            <?php echo $form->error($model, 'Pub_Date'); ?>
        </div>
    </div>
</div>

<div class="box-footer">
    <div class="form-group">
        <div class="col-lg-12">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            <?php echo CHtml::button('Back', array('class' => 'btn btn-default', 'onclick' => '{$("#new-publisher-dismiss").trigger("click"); $("#publisher").trigger("click")}')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
