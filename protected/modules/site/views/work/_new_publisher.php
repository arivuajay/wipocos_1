
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'producer-account-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:InsertNewProducer'
    ),
    'enableAjaxValidation' => true,
        ));
$languages = Myclass::getMasterLanguage();
$nationalities = Myclass::getMasterNationality();
$regions = Myclass::getMasterRegion();
$legal_forms = Myclass::getMasterLegalForm();
?>
<div class="col-lg-12">
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Internal_Code', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pro_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
            <?php echo $form->error($model, 'Pro_Internal_Code'); ?>
        </div>

        <div class="form-group hide" style="pointer-events: none">
            <?php echo $form->labelEx($model, 'is_producer', array('class' => '')); ?><br />
            <?php echo $form->checkBox($model, 'is_producer', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N', 'checked' => true, 'disabled' => false)); ?>
            <?php echo $form->error($model, 'is_producer'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Pro_Is_Publisher', array('class' => '')); ?><br />
            <?php echo $form->checkBox($model, 'Pro_Is_Publisher', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
            <?php echo $form->error($model, 'Pro_Is_Publisher'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Corporate_Name', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pro_Corporate_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Pro_Corporate_Name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Date', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pro_Date', array('class' => 'form-control date')); ?>
            <?php echo $form->error($model, 'Pro_Date'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Pro_Ipi', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pro_Ipi', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Pro_Ipi'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Pro_Ipi_Base_Number', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pro_Ipi_Base_Number', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Pro_Ipi_Base_Number'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Pro_Language_Id', array('class' => '')); ?>
            <?php echo $form->dropDownList($model, 'Pro_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
            <?php echo $form->error($model, 'Pro_Language_Id'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Pro_Legal_Form_id', array('class' => '')); ?>
            <?php echo $form->dropDownList($model, 'Pro_Legal_Form_id', $legal_forms, array('class' => 'form-control', 'prompt' => '')); ?>
            <?php echo $form->error($model, 'Pro_Legal_Form_id'); ?>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Pro_Photo', array('class' => '')); ?>
            <?php echo $form->fileField($model, 'Pro_Photo', array()); ?>
            <?php echo $form->error($model, 'Pro_Photo'); ?>
        </div>

        <?php if (!$model->isNewRecord && $model->Pro_Photo != '') { ?>
            <div class="form-group hide">
                <?php
                $file_path = $model->getFilePath();
                echo CHtml::link(CHtml::image($file_path, 'No Profile Picture', array('height' => '60px', 'width' => '60px')), $file_path, array('class' => 'popup-prof'));
                $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => ".popup-prof"));
                ?>
            </div>
            <div class="form-group help-block">
                <span><strong>Note:</strong> Once you add new profile picture, the old profile picture will be overwritten</span>
            </div>
        <?php } ?>
    </div>
</div>
<div class="col-lg-1 hide"></div>
<div class="col-lg-5  hide">
    <div class="box-body">
        <div class="form-group foundation">
            <div class="box-header">
                <h3 class="box-title">Foundation</h3>
            </div>
            <div class="box-body">
                <div class="col-lg-12">

                    <!--                                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pro_Place', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'Pro_Place', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'Pro_Place'); ?>
                                                    </div>-->

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Country_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Pro_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Pro_Country_Id'); ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group foundation">
            <div class="box-header">
                <h3 class="box-title">Commercial Register</h3>
            </div>
            <div class="box-body">
                <div class="col-lg-12">
                    <?php
                    $reg_date = '';
                    if (isset($model->Pro_Reg_Date) && $model->Pro_Reg_Date != '0000-00-00') {
                        $reg_date = $model->Pro_Reg_Date;
                    }
                    ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Reg_Date', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Pro_Reg_Date', array('class' => 'form-control date', 'value' => $reg_date)); ?>
                        <?php echo $form->error($model, 'Pro_Reg_Date'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Reg_Number', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Pro_Reg_Number', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Pro_Reg_Number'); ?>
                    </div>

                    <?php
                    $expr_date = '';
                    if (isset($model->Pro_Excerpt_Date) && $model->Pro_Excerpt_Date != '0000-00-00') {
                        $expr_date = $model->Pro_Excerpt_Date;
                    }
                    ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Excerpt_Date', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Pro_Excerpt_Date', array('class' => 'form-control date', 'value' => $expr_date)); ?>
                        <?php echo $form->error($model, 'Pro_Excerpt_Date'); ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Non_Member', array('class' => '')); ?><br />
            <?php echo $form->checkBox($model, 'Pro_Non_Member', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
            <?php echo $form->error($model, 'Pro_Non_Member'); ?>
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
            <?php echo CHtml::button('Back', array('class' => 'btn btn-default', 'onclick' => '{$("#new-producer-dismiss").trigger("click"); $("#producer").trigger("click")}')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
                    