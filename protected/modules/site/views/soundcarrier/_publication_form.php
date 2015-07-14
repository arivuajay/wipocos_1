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
            <?php echo $form->labelEx($model, 'Sound_Car_Publ_GUID', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php
                $post_url = Yii::app()->createAbsoluteUrl('/site/soundcarrier/getrecordingdetails');
                echo $form->dropDownList($model, 'Sound_Car_Publ_GUID', $titles, array(
                    'class' => 'form-control',
                    'prompt' => '',
                ));
                ?>
                <?php echo $form->error($model, 'Sound_Car_Publ_GUID'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo CHtml::label('Internal Code', '', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php 
                $int_code = $isrc = '';
                if (!$model->isNewRecord) {
                    if($model->Sound_Car_Publ_Work_Type == 'W'){
                        $int_code = $model->soundCarWork->Work_Internal_Code;
                        $isrc = '';
                    }else{
                        $int_code = $model->soundCarRecord->Rcd_Internal_Code;
                        $isrc = $model->soundCarRecord->Rcd_Isrc_Code;
                    }
                }
                ?>
                <?php echo CHtml::textField('Publ Recording Internal Code', $int_code, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo CHtml::label('ISRC Code', '', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo CHtml::textField('Publ Recording ISRC Code', $isrc, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>
        <hr />
        
<!--        <div class="form-group">
            <?php echo CHtml::label('Sound Carrier', '', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-2">
                <?php echo CHtml::textField('Recording Internal Code', $sound_car_model->Sound_Car_Internal_Code, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
            <div class="col-sm-3">
                <?php echo CHtml::textField('Recording Name', $sound_car_model->Sound_Car_Title, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>
        <hr />-->

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
            <div class="col-sm-0 col-sm-offset-3">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
<?php
$publications = SoundCarrierPublication::model()->findAll('Sound_Car_Id = :soundCar_id', array(':soundCar_id' => $sound_car_model->Sound_Car_Id));
if (!empty($publications)) {
    ?>
    <div class="box box-success">
        <div class="box-header">
            <h4 class="box-title">Publications</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Publ_GUID') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Publ_Internal_Code') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Publ_Year') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Publ_Country_Id') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Publ_Prod_Nation_Id') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Publ_Studio') ?></th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($publications as $key => $publication) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td>
                                <?php
                                if($publication->Sound_Car_Publ_Work_Type == 'W'){
                                    echo $publication->soundCarWork->Work_Org_Title;
                                }else{
                                    echo $publication->soundCarRecord->Rcd_Title;
                                }
                                ?>
                            </td>
                            <td><?php echo $publication->Sound_Car_Publ_Internal_Code ?></td>
                            <td><?php echo $publication->Sound_Car_Publ_Year ?></td>
                            <td><?php echo $publication->soundCarPublCountry->Country_Name ?></td>
                            <td><?php echo $publication->soundCarPublProdNation->Nation_Name ?></td>
                            <td><?php echo $publication->soundCarPublStudio->Studio_Name ?></td>
                            <td><?php echo $publication->createdBy->name ?></td>
                            <td><?php echo $publication->updatedBy->name ?></td>
                            <td>
                                <?php
                                echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/soundcarrier/update' , 'id' => $sound_car_model->Sound_Car_Id , 'tab' => 3, 'pubedit' => $publication->Sound_Car_Publ_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/soundcarrier/publicationdelete' , 'id' => $publication->Sound_Car_Publ_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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
        $('#SoundCarrierPublication_Sound_Car_Publ_GUID').on('change', function(){
            load_code2($(this).val());
        });
    });
        
    function load_code2(guid){
        $.ajax({
            type: 'POST',
            url: '{$post_url}',
            data: {guid: guid},
            dataType: 'JSON',
            success: function(data){
                $('#Publ_Recording_Internal_Code').val(data.Internal_Code);
                $('#Publ_Recording_ISRC_Code').val(data.Isrc_Code);
                $('#SoundCarrierPublations_Sound_Car_Publ_Work_Type').val(data.Work_Type);
            },
        });
    }
EOD;
Yii::app()->clientScript->registerScript('_pub_form', $js);
?>