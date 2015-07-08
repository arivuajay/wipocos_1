<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sound-carrier-fixations-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Sound_Car_Id', array('value' => $sound_car_model->Sound_Car_Id));
    $titles = CHtml::listData(Recording::model()->findAll(), 'Rcd_GUID', 'Rcd_Title');
    ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_GUID', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php
                $post_url = Yii::app()->createAbsoluteUrl('/site/recording/getrecordingdetails');
                echo $form->dropDownList($model, 'Sound_Car_Fix_GUID', $titles, array(
                    'class' => 'form-control', 
                    'prompt' => '',
                    'onchange' => "{"
                    . "$.ajax({
                        type: 'POST',
                        url: '{$post_url}',
                        data: {id: $(this).val()},
                        success: function(data){
                            console.log(data);
                        },
                      });"
                    . "}",
                    )); ?>
                <?php echo $form->error($model, 'Sound_Car_Fix_GUID'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo CHtml::label('Internal Code', '', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo CHtml::textField('Recording Internal Code', '', array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo CHtml::label('ISRC Code', '', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo CHtml::textField('Recording ISRC Code', '', array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>
        <hr />

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_Duration', array('class' => 'col-sm-2 control-label', 'label' => 'Duration (H : m : s)')); ?>
            <?php echo $form->hiddenField($model, 'Sound_Car_Fix_Duration'); ?>
            <div class="col-lg-1">
                <?php echo $form->textField($model, 'duration_hours', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'duration_hours'); ?>
            </div>
            <div class="col-lg-1">
                <?php echo $form->textField($model, 'duration_minutes', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'duration_minutes'); ?>
            </div>
            <div class="col-lg-1">
                <?php echo $form->textField($model, 'duration_seconds', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'duration_seconds'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_Date', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Sound_Car_Fix_Date', array('class' => 'form-control date')); ?>
                <?php echo $form->error($model, 'Sound_Car_Fix_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_Studio', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Sound_Car_Fix_Studio', $countries, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Sound_Car_Fix_Studio'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_Country_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Sound_Car_Fix_Country_Id', $countries, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Sound_Car_Fix_Country_Id'); ?>
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
