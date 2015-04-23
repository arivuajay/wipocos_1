<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'publisher-group-catalogue-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'enableAjaxValidation' => true,
        ));
echo $form->hiddenField($model, 'Pub_Group_Id', array('value' => $group_model->Pub_Group_Id));
?>
<div class="box-body col-lg-12">
    <h4>Subcontracted Catalogue</h4>
    <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Cat_Number', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model, 'Pub_Group_Cat_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'Pub_Group_Cat_Number'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Cat_Start_Date', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model, 'Pub_Group_Cat_Start_Date', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Pub_Group_Cat_Start_Date'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Cat_End_Date', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model, 'Pub_Group_Cat_End_Date', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Pub_Group_Cat_End_Date'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Cat_Name', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model, 'Pub_Group_Cat_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'Pub_Group_Cat_Name'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Cat_Territory_Id', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model, 'Pub_Group_Cat_Territory_Id', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Pub_Group_Cat_Territory_Id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Cat_Clasue', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->radioButtonList($model, 'Pub_Group_Cat_Clasue', array('Made', 'Sale'), array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
            <?php echo $form->error($model, 'Pub_Group_Cat_Clasue'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Cat_Sign_Date', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model, 'Pub_Group_Cat_Sign_Date', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Pub_Group_Cat_Sign_Date'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Cat_File', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model, 'Pub_Group_Cat_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Pub_Group_Cat_File'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Pub_Group_Cat_Reference', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model, 'Pub_Group_Cat_Reference', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Pub_Group_Cat_Reference'); ?>
        </div>
    </div>

</div><!-- /.box-body -->
<div class="box-footer">
    <div class="form-group">
        <div class="col-sm-0 col-sm-offset-3">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
    