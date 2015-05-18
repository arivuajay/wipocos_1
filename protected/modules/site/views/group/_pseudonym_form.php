<?php
/* @var $this AuthorPseudonymController */
/* @var $model AuthorPseudonym */
/* @var $form CActiveForm */
?>
<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'group-pseudonym-form',
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
            <?php echo $form->labelEx($model, 'Group_Pseudo_Type_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php $psedonyms = Myclass::getMasterPseudonym(); ?>
                <?php echo $form->dropDownList($model, 'Group_Pseudo_Type_Id', $psedonyms, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($model, 'Group_Pseudo_Type_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Group_Pseudo_Name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Group_Pseudo_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'Group_Pseudo_Name'); ?>
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