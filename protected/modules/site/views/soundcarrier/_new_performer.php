<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'performer-account-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:InsertNewPerformer'
    ),
    'enableAjaxValidation' => true,
        ));
$marital_status = Myclass::getMasterMaritalStatus();
$languages = Myclass::getMasterLanguage();
$nationalities = Myclass::getMasterNationality();
$regions = Myclass::getMasterRegion();
?>
<div class="col-lg-12">
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Internal_Code', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Perf_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
            <?php echo $form->error($model, 'Perf_Internal_Code'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_First_Name', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Perf_First_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Perf_First_Name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Sur_Name', array('class' => '')); ?>

            <?php echo $form->textField($model, 'Perf_Sur_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'Perf_Sur_Name'); ?>
        </div>

        <div class="form-group hide" style="pointer-events: none">
            <?php echo $form->labelEx($model, 'is_performer', array('class' => '')); ?><br />
            <?php echo $form->checkBox($model, 'is_performer', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N', 'checked' => true, 'disabled' => false)); ?>
            <?php echo $form->error($model, 'is_performer'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Perf_Is_Author', array('class' => '')); ?><br />
            <?php echo $form->checkBox($model, 'Perf_Is_Author', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
            <?php echo $form->error($model, 'Perf_Is_Author'); ?>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Gender', array('class' => '')); ?><br />
            <?php echo $form->radioButtonList($model, 'Perf_Gender', array('M' => 'Male', 'F' => 'Female'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Perf_Gender'); ?>
        </div>
        
        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Perf_DOB', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Perf_DOB', array('class' => 'form-control date', 'value' => (isset($model->Perf_DOB) && $model->Perf_DOB != '0000-00-00') ? date('Y-m-d', strtotime($model->Perf_DOB)) : '')); ?>
            <?php echo $form->error($model, 'Perf_DOB'); ?>
        </div>

        <!--                                <div class="form-group">
        <?php echo $form->labelEx($model, 'Perf_Place_Of_Birth_Id', array('class' => '')); ?>
        <?php echo $form->dropDownList($model, 'Perf_Place_Of_Birth_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
        <?php echo $form->error($model, 'Perf_Place_Of_Birth_Id'); ?>
                                        </div>-->

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Perf_Marital_Status_Id', array('class' => '')); ?>
            <?php echo $form->dropDownList($model, 'Perf_Marital_Status_Id', $marital_status, array('class' => 'form-control', 'prompt' => '')); ?>
            <?php echo $form->error($model, 'Perf_Marital_Status_Id'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Perf_Spouse_Name', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Perf_Spouse_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Perf_Spouse_Name'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Perf_Photo', array('class' => '')); ?>
            <?php echo $form->fileField($model, 'Perf_Photo', array()); ?>
            <?php echo $form->error($model, 'Perf_Photo'); ?>
        </div>

        <?php if (!$model->isNewRecord && $model->Perf_Photo != '') { ?>
            <div class="form-group hide">
                <?php
                $file_path = $model->getFilePath();
                echo CHtml::link(CHtml::image($file_path, 'No Profile Picture', array('height' => '60px', 'width' => '60px')), $file_path, array('class' => 'popup-prof'));
                $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => ".popup-prof"));
                ?>
            </div>
            <div class="form-group help-block hide">
                <span><strong>Note:</strong> Once you add new profile picture, the old profile picture will be overwritten</span>
            </div>
        <?php } ?>
    </div>
</div>
<div class="col-lg-1 hide"></div>
<div class="col-lg-5 hide">
    <div class="box-body">

        
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Ipi', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Perf_Ipi', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Perf_Ipi'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Ipi_Base_Number', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Perf_Ipi_Base_Number', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Perf_Ipi_Base_Number'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Ipn_Number', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Perf_Ipn_Number', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Perf_Ipn_Number'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Identity_Number', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Perf_Identity_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Perf_Identity_Number'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Birth_Country_Id', array('class' => '')); ?>
            <?php echo $form->dropDownList($model, 'Perf_Birth_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
            <?php echo $form->error($model, 'Perf_Birth_Country_Id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Nationality_Id', array('class' => '')); ?>
            <?php echo $form->dropDownList($model, 'Perf_Nationality_Id', $nationalities, array('class' => 'form-control', 'prompt' => '')); ?>
            <?php echo $form->error($model, 'Perf_Nationality_Id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Language_Id', array('class' => '')); ?>
            <?php echo $form->dropDownList($model, 'Perf_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
            <?php echo $form->error($model, 'Perf_Language_Id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Non_Member', array('class' => '')); ?><br />
            <?php echo $form->checkBox($model, 'Perf_Non_Member', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
            <?php echo $form->error($model, 'Perf_Non_Member'); ?>
        </div>

        <div class="form-group">
            <label>Status</label><br />
            <?php echo $model->status; ?>
        </div>
    </div>
</div>

<div class="box-footer">
    <div class="form-group">
        <div class="col-lg-12">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            <?php echo CHtml::button('Back', array('class' => 'btn btn-default', 'onclick' => '{$("#new-artist-dismiss").trigger("click"); $("#main_artist").trigger("click")}')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
                    