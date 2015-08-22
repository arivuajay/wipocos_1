<?php
/* @var $this RecordingController */
/* @var $model Recording */
/* @var $form CActiveForm */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);

$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);

$languages = Myclass::getMasterLanguage();
$types = Myclass::getMasterType();
$countries = Myclass::getMasterCountry();
$doc_status = CHtml::listData(MasterDocumentStatus::model()->findAll(array('order' => 'Document_Sts_Code')), 'Master_Document_Sts_Id', 'Document_Sts_Name');
//$doc_status = CHtml::listData(MasterDocumentStatus::model()->isActive()->findAll(array('order' => 'Document_Sts_Code')), 'Master_Document_Sts_Id', 'Document_Sts_Name');
$recording_types = Myclass::getMasterRecordType();
$labels = Myclass::getMasterLabel();
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">

        <?php
        $other_tab_validation = $rgt_tab_validation = true;
        if (!$model->isNewRecord) {
            $other_tab_validation = !empty($right_holder_exists);
        }else{
            $other_tab_validation = $rgt_tab_validation = false;
        }
        ?>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if ($rgt_tab_validation) echo 'data-toggle="tab"'; ?>>Right Holders</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Sub Titles</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Publication</a></li>
                <!--<li><a id="a_tab_5" href="#tab_5" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Artists - Producers</a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'recording-form',
                            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'enableAjaxValidation' => true,
                        ));
                        ?>
                        <div class="col-lg-5">
                            <div class="box-body">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
                                    <?php echo $form->error($model, 'Rcd_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Title', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Rcd_Title'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Rcd_Language_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Type_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Type_Id', $types, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Type_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Date', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Date', array('class' => 'form-control date')); ?>
                                    <?php echo $form->error($model, 'Rcd_Date'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Record_Country_id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Record_Country_id', $countries, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Record_Country_id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Product_Country_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Product_Country_Id', $countries, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Product_Country_Id'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="box-body">

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Doc_Status_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Doc_Status_Id', $doc_status, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Doc_Status_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Record_Type_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Record_Type_Id', $recording_types, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Record_Type_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Label_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Label_Id', $labels, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Label_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Duration', array('class' => '')) . ' (H : m : s)'; ?>
                                    <?php echo $form->hiddenField($model, 'Rcd_Duration'); ?>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <?php echo $form->textField($model, 'duration_hours', array('class' => 'form-control')); ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <?php echo $form->textField($model, 'duration_minutes', array('class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'duration_minutes'); ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <?php echo $form->textField($model, 'duration_seconds', array('class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'duration_seconds'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <?php echo $form->error($model, 'duration_hours'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Reference', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Reference', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Rcd_Reference'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_File', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Rcd_File'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Isrc_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Isrc_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Rcd_Isrc_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Iswc_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Iswc_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Rcd_Iswc_Number'); ?>
                                </div>


                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                                </div>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php
                    if ($rgt_tab_validation) {
                        $this->renderPartial('_rightholder_form', array('model' => $right_holder_model, 'recording_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_2">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_subtitle_form', array('model' => $sub_title_model, 'recording_model' => $model, 'languages' => $languages, 'types' => $types));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_publication_form', array('model' => $publication_model, 'recording_model' => $model, 'countries' => $countries));
                    }
                    ?>
                </div>
<!--                <div class="tab-pane" id="tab_5">
                    <?php
//                    if ($other_tab_validation) {
//                        $this->renderPartial('_link_form', array('model' => $link_model, 'recording_model' => $model));
//                    }
                    ?>
                </div>-->
            </div>
        </div>
    </div>
</div>
<?php
$active_Tab = (is_null($tab)) ? "tab_1" : "tab_{$tab}";
$js = <<< EOD
    $(document).ready(function(){
        $('.year').datepicker({ dateFormat: 'yyyy' });
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
        $('.nav-tabs a[href="#$active_Tab"]').tab('show');
     });
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>