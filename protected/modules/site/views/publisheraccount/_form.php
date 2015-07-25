<?php
/* @var $this PublisheraccountController */
/* @var $model PublisherAccount */
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
$legal_forms = Myclass::getMasterLegalForm();
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
            if ($model->Pub_Non_Member == 'N') {
                switch ($model->Pub_Is_Producer) {
                    case 'Y':
                        $other_tab_validation = !$model->isNewRecord && !$managed_model->isNewRecord && !$related_model->isNewRecord;
                        break;
                    case 'N':
                        $other_tab_validation = !$model->isNewRecord && !$managed_model->isNewRecord;
                        break;
                }
                $doc_tab_validation = !$model->isNewRecord;
            }
        } else {
            $other_tab_validation = $doc_tab_validation = false;
        }
        ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Address</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Payment</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Managers and Biography</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Marks, Series & <br />Cross-references</a></li>
                <li><a id="a_tab_6" href="#tab_6" <?php if ($doc_tab_validation) echo 'data-toggle="tab"'; ?>>Managed Rights</a></li>
                <?php if ($model->Pub_Is_Producer == 'Y') { ?>
                    <li><a id="a_tab_9" href="#tab_9" <?php if ($doc_tab_validation) echo 'data-toggle="tab"'; ?>>Related Rights</a></li>
                <?php } ?>
            <!--<li><a id="a_tab_7" href="#tab_7" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Related Rights</a></li>-->
                <li><a id="a_tab_8" href="#tab_8" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Liquidation <?php echo $model->Pub_Is_Producer == 'Y' ? '<br />' : ''; ?> and Inheritance</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box-primary box">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'publisher-account-form',
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
                                    <?php echo $form->labelEx($model, 'Pub_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
                                    <?php echo $form->error($model, 'Pub_Internal_Code'); ?>
                                </div>

                                <div class="form-group" style="pointer-events: none">
                                    <?php echo $form->labelEx($model, 'is_publisher', array('class' => '')); ?><br />
                                    <?php echo $form->checkBox($model, 'is_publisher', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N', 'checked' => true, 'disabled' => false)); ?>
                                    <?php echo $form->error($model, 'is_publisher'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Is_Producer', array('class' => '')); ?><br />
                                    <?php echo $form->checkBox($model, 'Pub_Is_Producer', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                                    <?php echo $form->error($model, 'Pub_Is_Producer'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Corporate_Name', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Corporate_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Pub_Corporate_Name'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Ipi', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Ipi', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pub_Ipi'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Ipi_Base_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Pub_Ipi_Base_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pub_Ipi_Base_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pub_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Pub_Language_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Legal_Form_id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pub_Legal_Form_id', $legal_forms, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Pub_Legal_Form_id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Photo', array('class' => '')); ?>
                                    <?php echo $form->fileField($model, 'Pub_Photo', array()); ?>
                                    <?php echo $form->error($model, 'Pub_Photo'); ?>
                                </div>

                                <?php if (!$model->isNewRecord && $model->Pub_Photo != '') { ?>
                                    <div class="form-group">
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
                                                <?php echo $form->labelEx($model, 'Pub_Date', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Pub_Date', array('class' => 'form-control date')); ?>
                                                <?php echo $form->error($model, 'Pub_Date'); ?>
                                            </div>

                                            <!--                                <div class="form-group">
                                            <?php echo $form->labelEx($model, 'Pub_Place', array('class' => '')); ?>
                                            <?php echo $form->textField($model, 'Pub_Place', array('class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'Pub_Place'); ?>
                                                                            </div>-->

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Pub_Country_Id', array('class' => '')); ?>
                                                <?php echo $form->dropDownList($model, 'Pub_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                                                <?php echo $form->error($model, 'Pub_Country_Id'); ?>
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
                                            if (isset($model->Pub_Reg_Date) && $model->Pub_Reg_Date != '0000-00-00') {
                                                $reg_date = $model->Pub_Reg_Date;
                                            }
                                            ?>
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Pub_Reg_Date', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Pub_Reg_Date', array('class' => 'form-control date', 'value' => $reg_date)); ?>
                                                <?php echo $form->error($model, 'Pub_Reg_Date'); ?>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Pub_Reg_Number', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Pub_Reg_Number', array('class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'Pub_Reg_Number'); ?>
                                            </div>

                                            <?php
                                            $expr_date = '';
                                            if (isset($model->Pub_Excerpt_Date) && $model->Pub_Excerpt_Date != '0000-00-00') {
                                                $expr_date = $model->Pub_Excerpt_Date;
                                            }
                                            ?>
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Pub_Excerpt_Date', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Pub_Excerpt_Date', array('class' => 'form-control date', 'value' => $expr_date)); ?>
                                                <?php echo $form->error($model, 'Pub_Excerpt_Date'); ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pub_Non_Member', array('class' => '')); ?><br />
                                    <?php echo $form->checkBox($model, 'Pub_Non_Member', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                                    <?php echo $form->error($model, 'Pub_Non_Member'); ?>
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
                                </div>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab_2">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_address_form', array('model' => $address_model, 'publisher_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_payment_form', array('model' => $payment_model, 'publisher_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_biography_form', array('model' => $biograph_model, 'publisher_model' => $model, 'biograph_upload_model' => $biograph_upload_model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_5">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_pseudonym_form', array('model' => $psedonym_model, 'publisher_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_6">
                    <?php
                    if ($doc_tab_validation) {
                        $this->renderPartial('_managed_rights_form', array('model' => $managed_model, 'publisher_model' => $model, 'regions' => $regions));
                    }
                    ?>
                </div>
                <?php if ($model->Pub_Is_Producer == 'Y') { ?>
                    <div class="tab-pane" id="tab_9">
                        <?php
                        if ($doc_tab_validation) {
                            $this->renderPartial('/produceraccount/_related_rights_form', array('model' => $related_model, 'producer_model' => $producer_model, 'regions' => $regions));
                        }
                        ?>
                    </div>
                <?php } ?>
                <div class="tab-pane" id="tab_8">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_succession_form', array('model' => $succession_model, 'publisher_model' => $model));
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
        $('#PublisherAccount_Pub_Gender').find("br").remove();
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
        $("#a_tab_{$tab}").trigger('click');

        $("#PublisherManageRights_Pub_Mnge_Entry_Date").on("change", function(){
            $("#PublisherManageRights_Pub_Mnge_Entry_Date_2").val($(this).val());
        });
        $("#PublisherManageRights_Pub_Mnge_Exit_Date").on("change", function(){
            $("#PublisherManageRights_Pub_Mnge_Exit_Date_2").val($(this).val());
        });

        $("#PublisherRelatedRights_Pub_Rel_Entry_Date").on("change", function(){
             $("#PublisherRelatedRights_Pub_Rel_Entry_Date_2").val($(this).val());
        });
        $("#PublisherRelatedRights_Pub_Rel_Exit_Date").on("change", function(){
            $("#PublisherRelatedRights_Pub_Rel_Exit_Date_2").val($(this).val());
        });

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
