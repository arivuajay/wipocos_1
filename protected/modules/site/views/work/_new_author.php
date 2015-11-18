<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'author-account-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:InsertNewAuthor'
    ),
    'enableAjaxValidation' => true,
    ));
?>
<div class="col-lg-12">
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Auth_Internal_Code', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Auth_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
            <?php echo $form->error($model, 'Auth_Internal_Code'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Auth_First_Name', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Auth_First_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Auth_First_Name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Auth_Sur_Name', array('class' => '')); ?>

            <?php echo $form->textField($model, 'Auth_Sur_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'Auth_Sur_Name'); ?>
        </div>
    </div>
</div>
<div class="box-footer">
    <div class="form-group">
        <div class="col-lg-12">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            <?php echo CHtml::button('Back', array('class' => 'btn btn-default', 'onclick' => '{$("#new-author-dismiss").trigger("click"); $("#main_author").trigger("click")}')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
