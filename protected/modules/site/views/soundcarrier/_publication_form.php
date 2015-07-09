<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'soundcarrier-publication-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Sound_Car_Id', array('value' => $sound_car_model->Sound_Car_Id));
    $nationalities = Myclass::getMasterNationality();
    ?>
    <div class="box-body">

        <div class="form-group">
            <?php echo CHtml::label('Sound Carrier', '', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-2">
                <?php echo CHtml::textField('Recording Internal Code', $sound_car_model->Sound_Car_Internal_Code, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
            <div class="col-sm-3">
                <?php echo CHtml::textField('Recording Name', $sound_car_model->Sound_Car_Title, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>
        <hr />

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Publ_Internal_Code', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Sound_Car_Publ_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100, 'readonly' => true)); ?>
                <?php echo $form->error($model, 'Sound_Car_Publ_Internal_Code'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Publ_Year', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Sound_Car_Publ_Year', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
                <?php echo $form->error($model, 'Sound_Car_Publ_Year'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Publ_Country_Id', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Sound_Car_Publ_Country_Id', $countries, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Sound_Car_Publ_Country_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Publ_Prod_Nation_Id', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Sound_Car_Publ_Prod_Nation_Id', $nationalities, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Sound_Car_Publ_Prod_Nation_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Publ_Studio', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Sound_Car_Publ_Studio', $studios, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Sound_Car_Publ_Studio'); ?>
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