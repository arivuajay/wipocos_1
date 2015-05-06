<?php
/* @var $this ProduceraccountController */
/* @var $model ProducerAccount */
/* @var $form CActiveForm */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);

$marital_status = CHtml::listData(MasterMaritalStatus::model()->isActive()->findAll(), 'Master_Marital_State_Id', 'Marital_State');
$countries = CHtml::listData(MasterCountry::model()->isActive()->findAll(), 'Master_Country_Id', 'Country_Name');
$languages = CHtml::listData(MasterLanguage::model()->isActive()->findAll(), 'Master_Lang_Id', 'Lang_Name');
$nationalities = CHtml::listData(MasterNationality::model()->isActive()->findAll(), 'Master_Nation_Id', 'Nation_Name');
$regions = CHtml::listData(MasterRegion::model()->isActive()->findAll(), 'Master_Region_Id', 'Region_Name');
$legal_forms = CHtml::listData(MasterLegalForm::model()->isActive()->findAll(), 'Master_Legal_Form_Id', 'Legal_Form_Name');
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">

        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if (!$model->isNewRecord && !$related_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Address</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if (!$model->isNewRecord && !$related_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Payment</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if (!$model->isNewRecord && !$related_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Managers and Biography</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if (!$model->isNewRecord && !$related_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Marks, Series & <br />Cross-references</a></li>
                <li><a id="a_tab_6" href="#tab_6" <?php if (!$model->isNewRecord) echo 'data-toggle="tab"'; ?>>Related Rights</a></li>
                <!--<li><a id="a_tab_7" href="#tab_7" <?php if (!$model->isNewRecord && !$related_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Related Rights</a></li>-->
                <li><a id="a_tab_8" href="#tab_8" <?php if (!$model->isNewRecord && !$related_model->isNewRecord) echo 'data-toggle="tab"'; ?>>Liquidation and Inheritance</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box-primary box">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'producer-account-form',
                            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'enableAjaxValidation' => true,
                        ));
                        ?>
                        <div class="col-lg-5 col-xs-5">
                            <div class="box-body">
                                <?php
                                if ($model->isNewRecord) {
                                    $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'PR'));
                                    $internal_code = $gen_int_code->Fullcode;
                                } else {
                                    $internal_code = $model->Pro_Internal_Code;
                                }
                                ?>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pro_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true, 'value' => $internal_code)); ?>
                                    <?php echo $form->error($model, 'Pro_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Corporate_Name', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pro_Corporate_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Pro_Corporate_Name'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Ipi', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pro_Ipi', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pro_Ipi'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Ipi_Base_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pro_Ipi_Base_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pro_Ipi_Base_Number'); ?>
                                </div>

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

                                <div class="form-group">
                                    <label>Status</label><br />
                                    <?php echo $model->status; ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-1 col-xs-1"></div>
                        <div class="col-lg-5 col-xs-5">
                            <div class="box-body">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Date', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pro_Date', array('class' => 'form-control date')); ?>
                                    <?php echo $form->error($model, 'Pro_Date'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Place', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pro_Place', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pro_Place'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Country_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pro_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Pro_Country_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pro_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Pro_Language_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Legal_Form_id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pro_Legal_Form_id', $legal_forms, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Pro_Legal_Form_id'); ?>
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
                    if (!$model->isNewRecord && !$related_model->isNewRecord) {
                        $this->renderPartial('_address_form', array('model' => $address_model, 'producer_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if (!$model->isNewRecord && !$related_model->isNewRecord) {
                        $this->renderPartial('_payment_form', array('model' => $payment_model, 'producer_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php
                    if (!$model->isNewRecord && !$related_model->isNewRecord) {
                        $this->renderPartial('_biography_form', array('model' => $biograph_model, 'producer_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_5">
                    <?php
                    if (!$model->isNewRecord && !$related_model->isNewRecord) {
                        $this->renderPartial('_pseudonym_form', array('model' => $psedonym_model, 'producer_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_6">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_related_rights_form', array('model' => $related_model, 'producer_model' => $model, 'regions' => $regions));
                    }
                    ?>
                </div>
                <!--                <div class="tab-pane" id="tab_7">
                <?php
//                    if (!$model->isNewRecord) {
//                        $this->renderPartial('_related_rights_form', array('model' => $related_model, 'producer_model' => $model, 'regions' => $regions));
//                    }
                ?>
                                </div>-->
                <div class="tab-pane" id="tab_8">
                    <?php
                    if (!$model->isNewRecord && !$related_model->isNewRecord) {
                        $this->renderPartial('_succession_form', array('model' => $succession_model, 'producer_model' => $model));
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
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
        $("#a_tab_{$tab}").trigger('click');
        
        $("#ProducerRelatedRights_Pro_Mnge_Entry_Date").on("change", function(){
            $("#ProducerRelatedRights_Pro_Mnge_Entry_Date_2").val($(this).val());
        });
        $("#ProducerRelatedRights_Pro_Mnge_Exit_Date").on("change", function(){
            $("#ProducerRelatedRights_Pro_Mnge_Exit_Date_2").val($(this).val());
        });
        
        $("#ProducerRelatedRights_Pro_Rel_Entry_Date").on("change", function(){
             $("#ProducerRelatedRights_Pro_Rel_Entry_Date_2").val($(this).val());
        });
        $("#ProducerRelatedRights_Pro_Rel_Exit_Date").on("change", function(){
            $("#ProducerRelatedRights_Pro_Rel_Exit_Date_2").val($(this).val());
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>
