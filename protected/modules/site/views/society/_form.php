<?php
/* @var $this SocietyController */
/* @var $model Society */
/* @var $form CActiveForm */
$countries = Myclass::getMasterCountry();
$territories = Myclass::getMasterTerritory();
$regions = Myclass::getMasterRegion();
$professions = Myclass::getMasterProfession();
$roles = CHtml::listData(MasterRole::model()->isActive()->findAll(), 'Master_Role_ID', 'Description');
$pay_methods = Myclass::getMasterPaymentMethod();
$documents = Myclass::getMasterDocument();
$document_types = Myclass::getMasterDocumentType();
$organization = Myclass::getOrganization();
$hierarchy = Myclass::getMasterHierarchy();
$types = Myclass::getMasterType();
$languages = Myclass::getMasterLanguage();
$currencies = Myclass::getMasterCurrency();
$factors = Myclass::getMasterFactor();

$work_categories = Myclass::getMasterWorkCategory();
$internal_positions = Myclass::getMasterInternalPosition();
$managed_rights = Myclass::getMasterManagedRight();
$document_status = CHtml::listData(MasterDocumentStatus::model()->findAll(array('order' => 'Document_Sts_Name')), 'Master_Document_Sts_Id', 'Document_Sts_Name');
$recording_types = Myclass::getMasterRecordType();
$mediums = Myclass::getMasterMedium();
$legal_forms = Myclass::getMasterLegalForm();
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'society-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => false,
            ));
            ?>
            <div class="col-lg-5">
                <div class="box-body">

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Abbr_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Abbr_Id', $organization, array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Society_Abbr_Id'); ?>

                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Logo_File', array('class' => '')); ?>

                        <?php echo $form->fileField($model, 'Society_Logo_File', array()); ?>
                        <?php echo $form->error($model, 'Society_Logo_File'); ?>
                    </div>

                    <?php if (!$model->isNewRecord) { ?>
                        <div class="form-group">
                            <?php echo CHtml::image($model->getFilePath(), 'logo', array('height' => '110px', 'width' => '110px')) ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Code', array('class' => '')); ?>

                        <?php echo $form->textField($model, 'Society_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Society_Code'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Language_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Language_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Mailing_Address', array('class' => '')); ?>

                        <?php echo $form->textField($model, 'Society_Mailing_Address', array('class' => 'form-control', 'size' => 50, 'maxlength' => 500)); ?>
                        <?php echo $form->error($model, 'Society_Mailing_Address'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Country_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Country_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Territory_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Territory_Id', $territories, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Territory_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Region_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Region_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Region_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Profession_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Profession_Id', $professions, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Profession_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Role_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Role_Id', $roles, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Role_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Hirearchy_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Hirearchy_Id', $hierarchy, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Hirearchy_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Soceity_Work_Cat_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Soceity_Work_Cat_Id', $work_categories, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Soceity_Work_Cat_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Soceity_Int_Pos_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Soceity_Int_Pos_Id', $internal_positions, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Soceity_Int_Pos_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Soceity_Mnge_Rght_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Soceity_Mnge_Rght_Id', $managed_rights, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Soceity_Mnge_Rght_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Active', array('class' => '')); ?><br />

                        <?php echo $form->checkBox($model, 'Active', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Active'); ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="box-body">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Payment_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Payment_Id', $pay_methods, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Payment_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Type_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Type_Id', $types, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Type_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Factor', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Factor', $factors, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Factor'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Doc_Type_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Doc_Type_Id', $document_types, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Doc_Type_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Doc_Id', array('class' => '')); ?>

                        <?php echo $form->dropDownList($model, 'Society_Doc_Id', $documents, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Doc_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Duration', array('class' => '')); ?>

                        <?php echo $form->textField($model, 'Society_Duration', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Society_Duration'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Rate', array('class' => '')); ?>

                        <?php echo $form->textField($model, 'Society_Rate', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                        <?php echo $form->error($model, 'Society_Rate'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_CopyRight', array('class' => '')); ?>

                        <?php echo $form->textField($model, 'Society_CopyRight', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Society_CopyRight'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_RelatedRights', array('class' => '')); ?>

                        <?php echo $form->textField($model, 'Society_RelatedRights', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Society_RelatedRights'); ?>
                    </div>

                    <!--                    <div class="form-group">
                    <?php echo $form->labelEx($model, 'Society_Main_Performer_Id', array('class' => '')); ?>
                    
                    <?php echo $form->textField($model, 'Society_Main_Performer_Id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'Society_Main_Performer_Id'); ?>
                                        </div>
                    
                                        <div class="form-group">
                    <?php echo $form->labelEx($model, 'Society_Producer_Id', array('class' => '')); ?>
                    
                    <?php echo $form->textField($model, 'Society_Producer_Id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'Society_Producer_Id'); ?>
                                        </div>-->

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Currency_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Society_Currency_Id', $currencies, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Society_Currency_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Society_Subscription', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Society_Subscription', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Society_Subscription'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Soceity_Doc_Sts_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Soceity_Doc_Sts_Id', $document_status, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Soceity_Doc_Sts_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Soceity_Rec_Type_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Soceity_Rec_Type_Id', $recording_types, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Soceity_Rec_Type_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Soceity_Medium_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Soceity_Medium_Id', $mediums, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Soceity_Medium_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Soceity_Legal_Form_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Soceity_Legal_Form_Id', $legal_forms, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Soceity_Legal_Form_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'import_file', array('class' => '')); ?>
                        <?php echo $form->fileField($model, 'import_file', array()); ?>
                        <?php echo $form->error($model, 'import_file'); ?>
                    </div>

<!--                    <div class="form-group">
                        <?php $this->renderPartial('_upload'); ?>
                    </div>-->

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
    </div><!-- ./col -->
</div>
