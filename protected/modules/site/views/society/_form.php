<?php
/* @var $this SocietyController */
/* @var $model Society */
/* @var $form CActiveForm */
$countries = CHtml::listData(MasterCountry::model()->isActive()->findAll(), 'Master_Country_Id', 'Country_Name');
$territories = CHtml::listData(MasterTerritories::model()->isActive()->findAll(), 'Master_Territory_Id', 'Territory_Name');
$regions = CHtml::listData(MasterRegion::model()->isActive()->findAll(), 'Master_Region_Id', 'Region_Name');
$professions = CHtml::listData(MasterProfession::model()->isActive()->findAll(), 'Master_Profession_Id', 'Profession_Name');
$roles = CHtml::listData(MasterRole::model()->isActive()->findAll(), 'Master_Role_ID', 'Description');
$pay_methods = CHtml::listData(MasterPaymentMethod::model()->isActive()->findAll(), 'Master_Paymode_Id', 'Paymode_Name');
$documents = CHtml::listData(MasterDocument::model()->isActive()->findAll(), 'Master_Doc_Id', 'Doc_Name');
$document_types = CHtml::listData(MasterDocumentType::model()->isActive()->findAll(), 'Master_Doc_Type_Id', 'Doc_Type_Name');
$organization = CHtml::listData(Organization::model()->findAll(), 'Org_Id', 'Org_Abbrevation');
$hierarchy = CHtml::listData(MasterHierarchy::model()->isActive()->findAll(), 'Master_Hierarchy_Id', 'Hierarchy_Name');
$types = CHtml::listData(MasterType::model()->isActive()->findAll(), 'Master_Type_Id', 'Type_Name');
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'society-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype'=> 'multipart/form-data'),
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
	'enableAjaxValidation'=>true,
)); ?>
            <div class="col-lg-5 col-xs-5">
                <div class="box-body">
                <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Code',  array('class' => '')); ?>
                        
                        <?php echo $form->textField($model,'Society_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                        <?php echo $form->error($model,'Society_Code'); ?>
                    </div>
                    
                                    <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Abbr_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Abbr_Id', $organization, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Abbr_Id'); ?>
                        
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Logo_File',  array('class' => '')); ?>
                        
                        <?php echo $form->fileField($model,'Society_Logo_File',array()); ?>
                        <?php echo $form->error($model,'Society_Logo_File'); ?>
                    </div>
                    
                    <?php if(!$model->isNewRecord){?>
                                        <div class="form-group">
                                                <?php echo CHtml::image($model->getFilePath(), 'logo', array('height' => '50px', 'width' => '50px'))?>
                    </div>
                    <?php }?>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Mailing_Address',  array('class' => '')); ?>
                        
                        <?php echo $form->textArea($model,'Society_Mailing_Address',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
                        <?php echo $form->error($model,'Society_Mailing_Address'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Country_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Country_Id', $countries, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Country_Id'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Territory_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Territory_Id', $territories, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Territory_Id'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Region_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Region_Id', $regions, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Region_Id'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Profession_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Profession_Id', $professions, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Profession_Id'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Role_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Role_Id', $roles, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Role_Id'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Hirearchy_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Hirearchy_Id', $hierarchy, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Hirearchy_Id'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Payment_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Payment_Id', $pay_methods, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Payment_Id'); ?>
                    </div>

                                        

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Active',  array('class' => '')); ?><br />
                        
                        <?php echo $form->checkBox($model,'Active',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Active'); ?>
                    </div>

                                </div>
            </div>
            <div class="col-lg-1 col-xs-1"></div>
            <div class="col-lg-5 col-xs-5">
                <div class="box-body">
                <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Type_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Type_Id',$types,array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Type_Id'); ?>
                    </div>
                
                                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Factor',  array('class' => '')); ?>
                        
                        <?php echo $form->textField($model,'Society_Factor',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                        <?php echo $form->error($model,'Society_Factor'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Doc_Type_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Doc_Type_Id', $document_types, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Doc_Type_Id'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Doc_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->dropDownList($model,'Society_Doc_Id', $documents, array('class'=>'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model,'Society_Doc_Id'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Duration',  array('class' => '')); ?>
                        
                        <?php echo $form->textField($model,'Society_Duration',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Society_Duration'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_CopyRight',  array('class' => '')); ?>
                        
                        <?php echo $form->textField($model,'Society_CopyRight',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Society_CopyRight'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_RelatedRights',  array('class' => '')); ?>
                        
                        <?php echo $form->textField($model,'Society_RelatedRights',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Society_RelatedRights'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Currency',  array('class' => '')); ?>
                        
                        <?php echo $form->textField($model,'Society_Currency',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                        <?php echo $form->error($model,'Society_Currency'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Rate',  array('class' => '')); ?>
                        
                        <?php echo $form->textField($model,'Society_Rate',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
                        <?php echo $form->error($model,'Society_Rate'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Main_Performer_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->textField($model,'Society_Main_Performer_Id',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                        <?php echo $form->error($model,'Society_Main_Performer_Id'); ?>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Society_Producer_Id',  array('class' => '')); ?>
                        
                        <?php echo $form->textField($model,'Society_Producer_Id',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                        <?php echo $form->error($model,'Society_Producer_Id'); ?>
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
    </div><!-- ./col -->
</div>
