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
                <li><a id="a_tab_2" href="#tab_2" <?php if(!$model->isNewRecord) echo 'data-toggle="tab"';?>>Members</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if(!$model->isNewRecord) echo 'data-toggle="tab"';?>>Payment</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if(!$model->isNewRecord) echo 'data-toggle="tab"';?>>Biography</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if(!$model->isNewRecord) echo 'data-toggle="tab"';?>>Cross-references</a></li>
                <li><a id="a_tab_6" href="#tab_6" <?php if(!$model->isNewRecord) echo 'data-toggle="tab"';?>>Managed Rights</a></li>
                <li><a id="a_tab_7" href="#tab_7" <?php if(!$model->isNewRecord) echo 'data-toggle="tab"';?>>Representatives</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'group-form',
                            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'enableAjaxValidation' => true,
                        ));
                        $countries = CHtml::listData(MasterCountry::model()->isActive()->findAll(), 'Master_Country_Id', 'Country_Name');
                        $languages = CHtml::listData(MasterLanguage::model()->isActive()->findAll(), 'Master_Lang_Id', 'Lang_Name');
                        $legal_forms = CHtml::listData(MasterLegalForm::model()->isActive()->findAll(), 'Master_Legal_Form_Id', 'Legal_Form_Name');

                        if(isset($type)){
                            if($type == 'author'){
                                echo $form->hiddenField($model, 'Group_Is_Author', array('value' => '1'));
                            }elseif($type == 'performer'){
                                echo $form->hiddenField($model, 'Group_Is_Performer', array('value' => '1'));
                            }
                        }
                        ?>
                        <div class="col-lg-5 col-xs-5">
                            <div class="box-body">
                                <?php
                                if ($model->isNewRecord) {
                                    $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'G'));
                                    $internal_code = $gen_int_code->Fullcode;
                                } else {
                                    $internal_code = $model->Group_Internal_Code;
                                }
                                ?>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Group_Internal_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50, 'readonly' => true, 'value' => $internal_code)); ?>
                                    <?php echo $form->error($model, 'Group_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_Name', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Group_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Group_Name'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_Place', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Group_Place', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Group_Place'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_Country_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Group_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Group_Country_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_Legal_Form_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Group_Legal_Form_Id', $legal_forms, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Group_Legal_Form_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Group_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Group_Language_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Active', array('class' => '')); ?><br />
                                    <?php echo $form->checkBox($model, 'Active', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Active'); ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-1 col-xs-1"></div>

                        <div class="col-lg-5 col-xs-5">
                            <div class="box-body">

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_IPI_Name_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Group_IPI_Name_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Group_IPI_Name_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_IPN_Base_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Group_IPN_Base_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Group_IPN_Base_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_IPN_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Group_IPN_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Group_IPN_Number'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Group_Date', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Group_Date', array('class' => 'form-control date')); ?>
                                    <?php echo $form->error($model, 'Group_Date'); ?>
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
                    <?php if(!$model->isNewRecord){ $this->renderPartial('_member_form', array('group_model' => $model));}?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php if(!$model->isNewRecord){ $this->renderPartial('_payment_form', array('model' => $payment_model, 'group_model' => $model));}?>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php if(!$model->isNewRecord){ $this->renderPartial('_biography_form', array('model' => $biograph_model, 'group_model' => $model));}?>
                </div>
                <div class="tab-pane" id="tab_5">
                    <?php if(!$model->isNewRecord){ $this->renderPartial('_pseudonym_form', array('model' => $psedonym_model, 'group_model' => $model));}?>
                </div>
                <div class="tab-pane" id="tab_6">
                    <?php if(!$model->isNewRecord){ $this->renderPartial('_managed_rights_form', array('model' => $managed_model, 'group_model' => $model));}?>
                </div>
                <div class="tab-pane" id="tab_7">
                    <?php if(!$model->isNewRecord){ $this->renderPartial('_representative_form', array('model' => $address_model, 'group_model' => $model));}?>
                </div>
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