<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-sub-publishing-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Work_Id', array('value' => $work_model->Work_Id));
    ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Contact_Start', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_Contact_Start', array('class' => 'form-control date')); ?>
                <?php echo $form->error($model, 'Work_Sub_Contact_Start'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Contact_End', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_Contact_End', array('class' => 'form-control date')); ?>
                <?php echo $form->error($model, 'Work_Sub_Contact_End'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Territories', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php
                $selected = $model->getTerritoryselected();
                ?>
                <?php echo $form->dropDownList($model, 'Work_Sub_Territories', $territories, array('class' => 'form-control', 'multiple' => true, 'options' => $selected)); ?>
                <?php echo $form->error($model, 'Work_Sub_Territories'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Clause', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->radioButtonList($model, 'Work_Sub_Clause', Myclass::getClause(), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Work_Sub_Clause'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Sign_Date', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php
                if ($model->isNewRecord) {
                    $sign_date = date('Y-m-d');
                } else {
                    $sign_date = $model->Work_Sub_Sign_Date;
                }
                ?>
                <?php echo $form->textField($model, 'Work_Sub_Sign_Date', array('class' => 'form-control date', 'value' => $sign_date)); ?>
                <?php echo $form->error($model, 'Work_Sub_Sign_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_File', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Work_Sub_File'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Catelog_Number', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_Catelog_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Work_Sub_Catelog_Number'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_References', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_References', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Work_Sub_References'); ?>
            </div>
        </div>

    </div>
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#WorkSubPublishing_Work_Sub_Clause').find("br").remove();
    });
EOD;
Yii::app()->clientScript->registerScript('_sub_pub_form', $js);
?>