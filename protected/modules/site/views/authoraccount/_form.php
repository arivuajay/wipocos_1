<?php
/* @var $this AuthoraccountController */
/* @var $model AuthorAccount */
/* @var $form CActiveForm */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);

$marital_status = Myclass::getMasterMaritalStatus();
$countries = Myclass::getMasterCountry();
$languages = Myclass::getMasterLanguage();
$nationalities = Myclass::getMasterNationality();
$regions = Myclass::getMasterRegion();
?>
<div class="row pull-right" style="margin: 0 0 10px;">
    <div class="col-lg-12">
        <?php $this->renderPartial('/default/_colors')?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-xs-12">

        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if (!$model->isNewRecord && !$managed_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Address</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if (!$model->isNewRecord && !$managed_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Payment</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if (!$model->isNewRecord && !$managed_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Biography</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if (!$model->isNewRecord && !$managed_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Pseudonyms</a></li>
                <li><a id="a_tab_6" href="#tab_6" <?php if (!$model->isNewRecord) echo 'data-toggle="tab"'; ?>>Managed Rights</a></li>
                <li><a id="a_tab_7" href="#tab_7" <?php if (!$model->isNewRecord && !$managed_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Death Inheritance</a></li>
                <li><a id="a_tab_8" href="#tab_8" <?php if (!$model->isNewRecord && !$managed_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Upload Documents</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'author-account-form',
                            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'enableAjaxValidation' => true,
                        ));
                        ?>
                        <div class="col-lg-5">
                            <div class="box-body">
                                <?php
                                if ($model->isNewRecord) {
                                    $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'A'));
                                    $internal_code = $gen_int_code->Fullcode;
                                } else {
                                    $internal_code = $model->Auth_Internal_Code;
                                }
                                ?>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Auth_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true, 'value' => $internal_code)); ?>
                                    <?php echo $form->error($model, 'Auth_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_First_Name', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Auth_First_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Auth_First_Name'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Sur_Name', array('class' => '')); ?>

                                    <?php echo $form->textField($model, 'Auth_Sur_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                    <?php echo $form->error($model, 'Auth_Sur_Name'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Gender', array('class' => '')); ?><br />
                                    <?php echo $form->radioButtonList($model, 'Auth_Gender', Myclass::getGender(), array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Auth_Gender'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_DOB', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Auth_DOB', array('class' => 'form-control date', 'value' => (isset($model->Auth_DOB) && $model->Auth_DOB != '0000-00-00') ? date('Y-m-d', strtotime($model->Auth_DOB)) : '')); ?>
                                    <?php echo $form->error($model, 'Auth_DOB'); ?>
                                </div>

                                <!--                                <div class="form-group">
                                <?php echo $form->labelEx($model, 'Auth_Place_Of_Birth_Id', array('class' => '')); ?>
                                <?php echo $form->dropDownList($model, 'Auth_Place_Of_Birth_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($model, 'Auth_Place_Of_Birth_Id'); ?>
                                                                </div>-->

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Marital_Status_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Auth_Marital_Status_Id', $marital_status, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Auth_Marital_Status_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Spouse_Name', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Auth_Spouse_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Auth_Spouse_Name'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Non_Member', array('class' => '')); ?><br />
                                    <?php echo $form->checkBox($model, 'Auth_Non_Member', array('class' => 'form-control', 'value'=>'Y', 'uncheckValue'=>'N')); ?>
                                    <?php echo $form->error($model, 'Auth_Non_Member'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label>Status</label><br />
                                    <?php echo $model->status; ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="box-body">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Ipi', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Auth_Ipi', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Auth_Ipi'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Ipi_Base_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Auth_Ipi_Base_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Auth_Ipi_Base_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Ipn_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Auth_Ipn_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Auth_Ipn_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Identity_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Auth_Identity_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Auth_Identity_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Birth_Country_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Auth_Birth_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Auth_Birth_Country_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Nationality_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Auth_Nationality_Id', $nationalities, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Auth_Nationality_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Auth_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Auth_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Auth_Language_Id'); ?>
                                </div>

                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                                </div>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab_2">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_address_form', array('model' => $address_model, 'author_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_payment_form', array('model' => $payment_model, 'author_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_biography_form', array('model' => $biograph_model, 'author_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_5">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_pseudonym_form', array('model' => $psedonym_model, 'author_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_6">
<?php
if (!$model->isNewRecord) {
    $this->renderPartial('_managed_rights_form', array('model' => $managed_model, 'author_model' => $model, 'regions' => $regions));
}
?>
                </div>
                <div class="tab-pane" id="tab_7">
<?php
if (!$model->isNewRecord) {
    $this->renderPartial('_death_form', array('model' => $death_model, 'author_model' => $model));
}
?>
                </div>
                <div class="tab-pane" id="tab_8">
<?php
if (!$model->isNewRecord) {
    $this->renderPartial('_upload_document_form', array('model' => $upload_model, 'author_model' => $model));
}
?>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row">
</div>
<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#AuthorAccount_Auth_Gender').find("br").remove();
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
        $("#a_tab_{$tab}").trigger('click');
        
        $("#AuthorManageRights_Auth_Mnge_Entry_Date").on("change", function(){
            $("#AuthorManageRights_Auth_Mnge_Entry_Date_2").val($(this).val());
        });
        $("#AuthorManageRights_Auth_Mnge_Exit_Date").on("change", function(){
            $("#AuthorManageRights_Auth_Mnge_Exit_Date_2").val($(this).val());
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>