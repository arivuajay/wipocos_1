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
<div class="row pull-right" style="margin: 0 0 10px;">
    <div class="col-lg-12">
        <?php $this->renderPartial('/default/_colors') ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <?php
        $rights_label = 'Managed Rights';
        if ($model->isNewRecord) {
            if (isset($type)) {
                if ($type == 'producer') {
                    $rights_label = 'Related Rights';
                }
            }
        } else {
            if ($model->Pub_Group_Is_Producer == '1') {
                $rights_label = 'Related Rights';
            }
        }

        $other_tab_validation = $doc_tab_validation = true;
        if (!$model->isNewRecord) {
            if ($model->Pub_Group_Non_Member == 'N') {
                $other_tab_validation = !$model->isNewRecord && !$managed_model->isNewRecord;
                $doc_tab_validation = !$model->isNewRecord;
            }
        } else {
            $other_tab_validation = $doc_tab_validation = false;
        }
        ?>

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Members</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Payments</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Biography</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Cross-references</a></li>
                <li><a id="a_tab_6" href="#tab_6" <?php if ($doc_tab_validation) echo 'data-toggle="tab"'; ?>><?php echo $rights_label ?></a></li>
                <li><a id="a_tab_7" href="#tab_7" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Representatives</a></li>
                <!--<li><a id="a_tab_8" href="#tab_8" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Sub publishing Catalog</a></li>-->
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
                        $countries = Myclass::getMasterCountry();
                        $languages = Myclass::getMasterLanguage();
                        $legal_forms = Myclass::getMasterLegalForm();

                        if (isset($type)) {
                            if ($type == 'publisher') {
                                echo $form->hiddenField($model, 'Pub_Group_Is_Publisher', array('value' => '1'));
                            } elseif ($type == 'producer') {
                                echo $form->hiddenField($model, 'Pub_Group_Is_Producer', array('value' => '1'));
                            }
                        }
                        ?>
                        <div class="col-lg-5">
                            <div class="box-body">
                                <?php
                                if ($model->isNewRecord) {
                                   $int_type = $type == 'publisher' ? InternalcodeGenerate::PUBLISHER_GROUP_CODE :InternalcodeGenerate::PRODUCER_GROUP_CODE;
                                    $model->Pub_Group_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => $int_type))->Fullcode;
                                }
                                ?>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_Internal_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50, 'readonly' => true)); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_Name', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Name'); ?>
                                </div>

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
                                    <?php echo $form->labelEx($model, 'Pub_Group_Non_Member', array('class' => '')); ?><br />
                                    <?php echo $form->checkBox($model, 'Pub_Group_Non_Member', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                                    <?php echo $form->error($model, 'Pub_Group_Non_Member'); ?>
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
                                <div class="form-group foundation">
                                    <div class="box-header">
                                        <h3 class="box-title">Foundation</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Pub_Group_Date', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Pub_Group_Date', array('class' => 'form-control date')); ?>
                                                <?php echo $form->error($model, 'Pub_Group_Date'); ?>
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
                                        </div>

                                    </div>
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
                                <?php if ((isset($type) && $type == 'producer') || (isset($model->Pub_Group_Is_Producer) && $model->Pub_Group_Is_Producer == '1')) { ?>
                                    <!--                                    <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Group_IPD_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Group_IPD_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pub_Group_IPD_Number'); ?>
                                                                        </div>-->
                                <?php } ?>

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
                        $this->renderPartial('_member_form', array('group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_copy_payment_form', array('model' => $payment_model, 'group_model' => $model));
                    }
                    ?>
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_related_payment_form', array('model' => $rel_payment_model, 'group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_biography_form', array('model' => $biograph_model, 'group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_5">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_pseudonym_form', array('model' => $psedonym_model, 'group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_6">
                    <?php
                    if ($doc_tab_validation) {
                        $this->renderPartial('_managed_rights_form', array('model' => $managed_model, 'group_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_7">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_representative_form', array('model' => $address_model, 'group_model' => $model));
                    }
                    ?>
                </div>

                <!--                <div class="tab-pane" id="tab_8">
                <?php
                if ($other_tab_validation) {
                    $this->renderPartial('_sub_publish_catalog', compact('model', 'org_publisher_model', 'sub_publisher_model', 'org_share_publisher_model', 'sub_share_publisher_model', 'catalog_model'));
                }
                ?>
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
        $("#PublisherGroupManageRights_Pub_Group_Mnge_Entry_Date").on("change", function(){
            $("#PublisherGroupManageRights_Pub_Group_Mnge_Entry_Date_2").val($(this).val());
        });
        $("#PublisherGroupManageRights_Pub_Group_Mnge_Exit_Date").on("change", function(){
            $("#PublisherGroupManageRights_Pub_Group_Mnge_Exit_Date_2").val($(this).val());
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>