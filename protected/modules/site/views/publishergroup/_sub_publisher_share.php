<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'publisher-group-sub-share-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'enableAjaxValidation' => true,
        ));
echo $form->hiddenField($model, 'Pub_Group_Id', array('value' => $group_model->Pub_Group_Id));
?>
<div class="box-body col-lg-6">
    <h4>Share of Original Publisher</h4>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Sub_Share_Broadcast', array('class' => 'col-sm-4 control-label')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model, 'Pub_Group_Sub_Share_Broadcast', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'Pub_Group_Sub_Share_Broadcast'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Sub_Share_Mechanical', array('class' => 'col-sm-4 control-label')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model, 'Pub_Group_Sub_Share_Mechanical', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'Pub_Group_Sub_Share_Mechanical'); ?>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-0 col-sm-offset-2">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
        </div>
    </div>

</div><!-- /.box-body -->
<?php $this->endWidget(); ?>             
