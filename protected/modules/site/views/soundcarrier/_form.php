<?php
/* @var $this SoundcarrierController */
/* @var $model SoundCarrier */
/* @var $form CActiveForm */
?>
<?php
/* @var $this WorkController */
/* @var $model Work */
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
$labels = Myclass::getMasterLabel();
$mediums = Myclass::getMasterMedium();
$countries = Myclass::getMasterCountry();
$manfs = Myclass::getMasterManufacturer();
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">

        <?php
        $other_tab_validation = $doc_tab_validation = $rgt_tab_validation = true;
        if (!$model->isNewRecord) {
            $doc_tab_validation = !$model->isNewRecord;
            $rgt_tab_validation = !$model->isNewRecord;
            $other_tab_validation = true;
        } else {
            $other_tab_validation = $doc_tab_validation = $rgt_tab_validation = false;
        }
        ?>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Documentation</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Publication</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Sub Titles</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Biography</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'sound-carrier-form',
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
                                    <?php echo $form->labelEx($model, 'Sound_Car_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Title', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Title'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Sound_Car_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Language_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Standardized_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Standardized_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Standardized_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Catelog', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Catelog', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Catelog'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Barcode', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Barcode', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Barcode'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Distributor', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Distributor', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Distributor'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Label_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Sound_Car_Label_Id', $labels, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Label_Id'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="box-body">

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Medium', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Sound_Car_Medium', $mediums, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Medium'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Type_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Sound_Car_Type_Id', $types, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Type_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Main_Artist', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Main_Artist', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Main_Artist'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Producer', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Producer', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Producer'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Product_Country_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Sound_Car_Product_Country_Id', $countries, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Product_Country_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Year', array('class' => '')); ?>
                                    <?php
                                    $year = date('Y');
                                    if ($model->Sound_Car_Year != NULL && $model->Sound_Car_Year != '0000') {
                                        $year = $model->Sound_Car_Year;
                                    }
                                    ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Year', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4, 'value' => $year)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Year'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Release_Year', array('class' => '')); ?>
                                    <?php
                                    $year = date('Y');
                                    if ($model->Sound_Car_Release_Year != NULL && $model->Sound_Car_Release_Year != '0000') {
                                        $year = $model->Sound_Car_Release_Year;
                                    }
                                    ?>
                                    <?php echo $form->textField($model, 'Sound_Car_Release_Year', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4, 'value' => $year)); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Release_Year'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Sound_Car_Manf_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Sound_Car_Manf_Id', $manfs, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Sound_Car_Manf_Id'); ?>
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
                        $this->renderPartial('_documentation_form', array('model' => $document_model, 'sound_car_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_publication_form', array('model' => $publication_model, 'sound_car_model' => $model, 'countries' => $countries));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_subtitle_form', array('model' => $sub_title_model, 'sound_car_model' => $model, 'languages' => $languages, 'types' => $types));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_5">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_biography_form', array('model' => $biograph_model, 'sound_car_model' => $model, 'biograph_upload_model' => $biograph_upload_model));
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
        $('.year').datepicker({ dateFormat: 'yyyy' });
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
        $("#a_tab_{$tab}").trigger('click');
     });
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>