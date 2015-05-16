<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-publishing-form',
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
            <?php echo $form->labelEx($model, 'Work_Pub_Contact_Start', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Pub_Contact_Start', array('class' => 'form-control date')); ?>
                <?php echo $form->error($model, 'Work_Pub_Contact_Start'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Pub_Contact_End', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Pub_Contact_End', array('class' => 'form-control date')); ?>
                <?php echo $form->error($model, 'Work_Pub_Contact_End'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Pub_Territories', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php
                $selected = array();
                if ($model->Work_Pub_Territories != '') {
                    $exp = explode(',', $model->Work_Pub_Territories);
                    foreach ($exp as $ex){
                        $selected[$ex] = array('selected' => 'selected');
                    }
                }
                ?>
                <?php echo $form->dropDownList($model, 'Work_Pub_Territories', $territories, array('class' => 'form-control', 'multiple' => true, 'options' => $selected)); ?>
                <?php echo $form->error($model, 'Work_Pub_Territories'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Pub_Sign_Date', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php
                if($model->isNewRecord){
                    $sign_date = date('Y-m-d');
                }else{
                    $sign_date = $model->Work_Pub_Sign_Date;
                }
                ?>
                <?php echo $form->textField($model, 'Work_Pub_Sign_Date', array('class' => 'form-control date', 'value' => $sign_date)); ?>
                <?php echo $form->error($model, 'Work_Pub_Sign_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Pub_File', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Pub_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Work_Pub_File'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Pub_References', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Pub_References', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Work_Pub_References'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>