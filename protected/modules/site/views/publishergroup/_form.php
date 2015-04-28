<?php
/* @var $this GroupController */
/* @var $model Group */
/* @var $form CActiveForm */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if (!$model->isNewRecord) echo 'data-toggle="tab"'; ?>>Members</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if (!$model->isNewRecord) echo 'data-toggle="tab"'; ?>>Payments</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if (!$model->isNewRecord) echo 'data-toggle="tab"'; ?>>Biography</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if (!$model->isNewRecord) echo 'data-toggle="tab"'; ?>>Cross-references</a></li>
                <li><a id="a_tab_6" href="#tab_6" <?php if (!$model->isNewRecord) echo 'data-toggle="tab"'; ?>>Managed Rights</a></li>
                <li><a id="a_tab_7" href="#tab_7" <?php if (!$model->isNewRecord) echo 'data-toggle="tab"'; ?>>Representatives</a></li>
                <!--<li><a id="a_tab_8" href="#tab_8" <?php if (!$model->isNewRecord) echo 'data-toggle="tab"'; ?>>Sub publishing Catalog</a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'publisher-group-form',
                            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'enableAjaxValidation' => true,
                        ));
                        $countries = CHtml::listData(MasterCountry::model()->isActive()->findAll(), 'Master_Country_Id', 'Country_Name');
                        $languages = CHtml::listData(MasterLanguage::model()->isActive()->findAll(), 'Master_Lang_Id', 'Lang_Name');
                        $legal_forms = CHtml::listData(MasterLegalForm::model()->isActive()->findAll(), 'Master_Legal_Form_Id', 'Legal_Form_Name');

                        if (isset($type)) {
                            if ($type == 'publisher') {
                                echo $form->hiddenField($model, 'Pub_Group_Is_Publisher', array('value' => '1'));
                            } elseif ($type == 'producer') {
                                echo $form->hiddenField($model, 'Pub_Group_Is_Producer', array('value' => '1'));
                            }
                        }
                        ?>
                        <div class="col-lg-5 col-xs-5">
                            <div class="box-body">
                                <?php
                                if ($model->isNewRecord) {
                                    $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'PG'));
                                    $internal_code = $gen_int_code->Fullcode;
                                } else {
                                    $internal_code = $model->Pub_Group_Internal_Code;
                                }
                                ?>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_Internal_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50, 'readonly' => true, 'value' => $internal_code)); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_Name', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Name'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_Place', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_Place', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Place'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_Country_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pub_Group_Country_Id', $countries, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Country_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_Legal_Form_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pub_Group_Legal_Form_Id', $legal_forms, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Legal_Form_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pub_Group_Language_Id', $languages, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Language_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Status</label><br />
                                    <?php echo $model->status;?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-1 col-xs-1"></div>

                        <div class="col-lg-5 col-xs-5">
                            <div class="box-body">

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_IPI_Name_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_IPI_Name_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pub_Group_IPI_Name_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_IPN_Base_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_IPN_Base_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pub_Group_IPN_Base_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_IPD_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_IPD_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pub_Group_IPD_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_Date', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_Date', array('class' => 'form-control date')); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Date'); ?>
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
                        $this->renderPartial('_member_form', array('group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_copy_payment_form', array('model' => $payment_model, 'group_model' => $model));
                    }
                    ?>
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_related_payment_form', array('model' => $rel_payment_model, 'group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_biography_form', array('model' => $biograph_model, 'group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_5">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_pseudonym_form', array('model' => $psedonym_model, 'group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_6">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_managed_rights_form', array('model' => $managed_model, 'group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_7">
                    <?php
                    if (!$model->isNewRecord) {
                        $this->renderPartial('_representative_form', array('model' => $address_model, 'group_model' => $model));
                    }
                    ?>
                </div>
<!--                <div class="tab-pane" id="tab_8">
                    <div class="box box-primary boxdivs">
                        <?php
//                        if (!$model->isNewRecord) {
//                            $this->renderPartial('_original_publisher', array('model' => $org_publisher_model, 'group_model' => $model));
//                            $this->renderPartial('_sub_publisher', array('model' => $sub_publisher_model, 'group_model' => $model));
//                        }
                        ?>
                    </div>
                    <div class="box box-primary boxdivs">
                        <?php
//                        if (!$model->isNewRecord) {
//                            $this->renderPartial('_original_publisher_share', array('model' => $org_share_publisher_model, 'group_model' => $model));
//                            $this->renderPartial('_sub_publisher_share', array('model' => $sub_share_publisher_model, 'group_model' => $model));
//                        }
                        ?>
                    </div>
                    <div class="box box-primary boxdivs">
                    <?php
//                    if (!$model->isNewRecord) {
//                        $this->renderPartial('_group_catalogue', array('model' => $catalog_model, 'group_model' => $model));
//                    }
                    ?>
                    </div>
                </div>-->
            </div>
        </div>

    </div>
</div>
<?php
$js = <<< EOD
    $(document).ready(function(){
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
        $("#a_tab_{$tab}").trigger('click');
    });
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>