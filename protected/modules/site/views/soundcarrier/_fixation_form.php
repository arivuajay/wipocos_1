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
    $works = (new SoundCarrierRightholder)->distinctWorks($sound_car_model->Sound_Car_Id);
    
    $titles = array();
    foreach ($works as $work){
        if($work->Sound_Car_Right_Work_Type == 'W'){
            $titles[$work->rightholderWork->Work_GUID] = $work->rightholderWork->Work_Org_Title;
        }else if($work->Sound_Car_Right_Work_Type == 'R'){
            $titles[$work->rightholderRecord->Rcd_GUID] = $work->rightholderRecord->Rcd_Title;
        }
    }
    
    echo $form->hiddenField($model, 'Sound_Car_Fix_Work_Type');
//    $titles = CHtml::listData(Recording::model()->findAll(), 'Rcd_GUID', 'Rcd_Title');
    ?>
    <div class="box-body">
        <?php if (!$model->isNewRecord) { ?>
            <div class="col-lg-12 col-md-12">
                <div class="row mb10">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;New Fixation', array("/site/soundcarrier/update", 'id' => $sound_car_model->Sound_Car_Id, 'tab' => '6'), array('class' => 'btn btn-success pull-right')) ?>
                </div>
            </div>
        <?php } ?>
        
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_GUID', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php
                $post_url = Yii::app()->createAbsoluteUrl('/site/soundcarrier/getrecordingdetails');
                echo $form->dropDownList($model, 'Sound_Car_Fix_GUID', $titles, array(
                    'class' => 'form-control',
                    'prompt' => '',
                ));
                ?>
                <?php echo $form->error($model, 'Sound_Car_Fix_GUID'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo CHtml::label('Internal Code', '', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php 
                $int_code = $isrc = '';
                if (!$model->isNewRecord) {
                    if($model->Sound_Car_Fix_Work_Type == 'W'){
                        $int_code = $model->soundCarWork->Work_Internal_Code;
                        $isrc = '';
                    }else{
                        $int_code = $model->soundCarRecord->Rcd_Internal_Code;
                        $isrc = $model->soundCarRecord->Rcd_Isrc_Code;
                    }
                }
                ?>
                <?php echo CHtml::textField('Fix Recording Internal Code', $int_code, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo CHtml::label('ISRC Code', '', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo CHtml::textField('Fix Recording ISRC Code', $isrc, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>
        <hr />

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_Duration', array('class' => 'col-sm-3 control-label', 'label' => 'Duration (H : m : s)')); ?>
            <?php echo $form->hiddenField($model, 'Sound_Car_Fix_Duration'); ?>
            <div class="col-lg-1">
                <?php echo $form->textField($model, 'duration_hours', array('class' => 'form-control')); ?>
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
            <div class="col-lg-6 col-lg-offset-3">
            <?php echo $form->error($model, 'duration_hours'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_Date', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Sound_Car_Fix_Date', array('class' => 'form-control date')); ?>
                <?php echo $form->error($model, 'Sound_Car_Fix_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_Studio', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Sound_Car_Fix_Studio', $studios, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Sound_Car_Fix_Studio'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Fix_Country_Id', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Sound_Car_Fix_Country_Id', $countries, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Sound_Car_Fix_Country_Id'); ?>
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
</div>

<?php
$fixations = SoundCarrierFixations::model()->findAll('Sound_Car_Id = :soundCar_id', array(':soundCar_id' => $sound_car_model->Sound_Car_Id));
if (!empty($fixations)) {
    ?>
    <div class="box box-success">
        <div class="box-header">
            <h4 class="box-title">Fixations</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Fix_GUID') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Fix_Duration') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Fix_Date') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Fix_Studio') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Fix_Country_Id') ?></th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($fixations as $key => $fixation) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td>
                                <?php
                                if($fixation->Sound_Car_Fix_Work_Type == 'W'){
                                    echo $fixation->soundCarWork->Work_Org_Title;
                                }else{
                                    echo $fixation->soundCarRecord->Rcd_Title;
                                }
                                ?>
                            </td>
                            <td><?php echo $fixation->Sound_Car_Fix_Duration ?></td>
                            <td><?php echo $fixation->Sound_Car_Fix_Date ?></td>
                            <td><?php echo $fixation->soundCarFixStudio->Studio_Name ?></td>
                            <td><?php echo $fixation->soundCarFixCountry->Country_Name ?></td>
                            <td><?php echo $fixation->createdBy->name ?></td>
                            <td><?php echo $fixation->updatedBy->name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/soundcarrier/update' , 'id' => $sound_car_model->Sound_Car_Id , 'tab' => 6, 'fixedit' => $fixation->Sound_Car_Fix_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/soundcarrier/fixationdelete' , 'id' => $fixation->Sound_Car_Fix_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>

<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#SoundCarrierFixations_Sound_Car_Fix_GUID').on('change', function(){
            load_code($(this).val());
        });
    });
        
    function load_code(guid){
        $.ajax({
            type: 'POST',
            url: '{$post_url}',
            data: {guid: guid},
            dataType: 'JSON',
            success: function(data){
                $('#Fix_Recording_Internal_Code').val(data.Internal_Code);
                $('#Fix_Recording_ISRC_Code').val(data.Isrc_Code);
                $('#SoundCarrierFixations_Sound_Car_Fix_Work_Type').val(data.Work_Type);
                $('#SoundCarrierFixations_duration_hours').val(data.duration_hours);
                $('#SoundCarrierFixations_duration_minutes').val(data.duration_minutes);
                $('#SoundCarrierFixations_duration_seconds').val(data.duration_seconds);
            },
        });
    }
EOD;
Yii::app()->clientScript->registerScript('_fix_form', $js);
?>                 