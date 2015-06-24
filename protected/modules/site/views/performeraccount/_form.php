<?php
/* @var $this PerformeraccountController */
/* @var $model PerformerAccount */
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
        <?php $this->renderPartial('/default/_colors') ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-xs-12">

        <?php
        $other_tab_validation = $doc_tab_validation = true;
        if (!$model->isNewRecord) {
            if ($model->Perf_Non_Member == 'N') {
                switch ($model->Perf_Is_Author) {
                    case 'Y':
                        $other_tab_validation = !$model->isNewRecord && !$managed_model->isNewRecord && !$related_model->isNewRecord;
                        break;
                    case 'N':
                        $other_tab_validation = !$model->isNewRecord && !$related_model->isNewRecord;
                        break;
                }
                $doc_tab_validation = !$model->isNewRecord;
            }
        }else{
            $other_tab_validation = $doc_tab_validation = false;
        }
        ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Address</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Payment</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Biography</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Pseudonyms</a></li>
                <?php if ($model->Perf_Is_Author == 'Y') { ?>
                    <li><a id="a_tab_9" href="#tab_9" <?php if ($doc_tab_validation) echo 'data-toggle="tab"'; ?>>Managed Rights</a></li>
                <?php } ?>
                <li><a id="a_tab_6" href="#tab_6" <?php if ($doc_tab_validation) echo 'data-toggle="tab"'; ?>>Related Rights</a></li>
                <li><a id="a_tab_7" href="#tab_7" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Death Inheritance</a></li>
                <li><a id="a_tab_8" href="#tab_8" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Upload <?php echo $model->Perf_Is_Author == 'Y' ? '<br />' : '';?> Documents</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'performer-account-form',
                            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'enableAjaxValidation' => true,
                        ));
                        ?>
                        <div class="col-lg-5">
                            <div class="box-body">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Perf_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Perf_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
                                    <?php echo $form->error($model, 'Perf_Internal_Code'); ?>
                                </div>

                                <div class="form-group" style="pointer-events: none">
                                    <?php echo $form->labelEx($model, 'is_performer', array('class' => '')); ?><br />
                                    <?php echo $form->checkBox($model, 'is_performer', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N', 'checked' => true, 'disabled' => false)); ?>
                                    <?php echo $form->error($model, 'is_performer'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Perf_Is_Author', array('class' => '')); ?><br />
                                    <?php echo $form->checkBox($model, 'Perf_Is_Author', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                                    <?php echo $form->error($model, 'Perf_Is_Author'); ?>
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

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Perf_Gender', array('class' => '')); ?><br />
                                    <?php echo $form->radioButtonList($model, 'Perf_Gender', array('M' => 'Male', 'F' => 'Female'), array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Perf_Gender'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Perf_DOB', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Perf_DOB', array('class' => 'form-control date', 'value' => (isset($model->Perf_DOB) && $model->Perf_DOB != '0000-00-00') ? date('Y-m-d', strtotime($model->Perf_DOB)) : '')); ?>
                                    <?php echo $form->error($model, 'Perf_DOB'); ?>
                                </div>

                                <!--                                <div class="form-group">
                                <?php echo $form->labelEx($model, 'Perf_Place_Of_Birth_Id', array('class' => '')); ?>
                                <?php echo $form->dropDownList($model, 'Perf_Place_Of_Birth_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($model, 'Perf_Place_Of_Birth_Id'); ?>
                                                                </div>-->

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Perf_Marital_Status_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Perf_Marital_Status_Id', $marital_status, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Perf_Marital_Status_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Perf_Spouse_Name', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Perf_Spouse_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Perf_Spouse_Name'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Perf_Photo', array('class' => '')); ?>
                                    <?php echo $form->fileField($model, 'Perf_Photo', array()); ?>
                                    <?php echo $form->error($model, 'Perf_Photo'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
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
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                                </div>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab_2">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_address_form', array('model' => $address_model, 'performer_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_payment_form', array('model' => $payment_model, 'performer_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_biography_form', array('model' => $biograph_model, 'performer_model' => $model, 'biograph_upload_model' => $biograph_upload_model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_5">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_pseudonym_form', array('model' => $psedonym_model, 'performer_model' => $model));
                    }
                    ?>
                </div>
                <?php if ($model->Perf_Is_Author == 'Y') { ?>
                    <div class="tab-pane" id="tab_9">
                        <?php
                        if ($doc_tab_validation) {
                            $this->renderPartial('/authoraccount/_managed_rights_form', array('model' => $managed_model, 'author_model' => $author_model, 'regions' => $regions));
                        }
                        ?>
                    </div>
                <?php } ?>
                <div class="tab-pane" id="tab_6">
                    <?php
                    if ($doc_tab_validation) {
                        $this->renderPartial('_related_rights_form', array('model' => $related_model, 'performer_model' => $model, 'regions' => $regions));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_7">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_death_form', array('model' => $death_model, 'performer_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_8">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_upload_document_form', array('model' => $upload_model, 'performer_model' => $model));
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#PerformerAccount_Perf_Gender').find("br").remove();
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
        $("#a_tab_{$tab}").trigger('click');

        $("#PerformerRelatedRights_Perf_Rel_Entry_Date").on("change", function(){
            $("#PerformerRelatedRights_Perf_Rel_Entry_Date_2").val($(this).val());
        });
        $("#PerformerRelatedRights_Perf_Rel_Exit_Date").on("change", function(){
            $("#PerformerRelatedRights_Perf_Rel_Exit_Date_2").val($(this).val());
        });

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