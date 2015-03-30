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
        <div class="box box-primary">
            <?php 
            $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'group-form',
                    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                    'enableAjaxValidation'=>true,
            ));
            $countries = CHtml::listData(MasterCountry::model()->isActive()->findAll(), 'Master_Country_Id', 'Country_Name');
            $languages = CHtml::listData(MasterLanguage::model()->isActive()->findAll(), 'Master_Lang_Id', 'Lang_Name');
            $legal_forms = CHtml::listData(MasterLegalForm::model()->isActive()->findAll(), 'Master_Legal_Form_Id', 'Legal_Form_Name');
            ?>
            <div class="box-body">
                                    <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_Name',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Group_Name',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                        <?php echo $form->error($model,'Group_Name'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_Is_Author',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->checkBox($model,'Group_Is_Author',array('class'=>'form-control','size'=>1,'maxlength'=>1)); ?>
                        <?php echo $form->error($model,'Group_Is_Author'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_Is_Performer',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->checkBox($model,'Group_Is_Performer',array('class'=>'form-control','size'=>1,'maxlength'=>1)); ?>
                        <?php echo $form->error($model,'Group_Is_Performer'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_Internal_Code',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Group_Internal_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                        <?php echo $form->error($model,'Group_Internal_Code'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_IPI_Name_Number',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Group_IPI_Name_Number',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Group_IPI_Name_Number'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_IPN_Base_Number',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Group_IPN_Base_Number',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Group_IPN_Base_Number'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_IPN_Number',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Group_IPN_Number',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Group_IPN_Number'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_Date',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Group_Date',array('class'=>'form-control date')); ?>
                        <?php echo $form->error($model,'Group_Date'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_Place',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Group_Place',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                        <?php echo $form->error($model,'Group_Place'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_Country_Id',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->dropDownList($model,'Group_Country_Id',$countries,array('class'=>'form-control','prompt'=>'')); ?>
                        <?php echo $form->error($model,'Group_Country_Id'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_Legal_Form_Id',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->dropDownList($model,'Group_Legal_Form_Id',$legal_forms,array('class'=>'form-control','prompt'=>'')); ?>
                        <?php echo $form->error($model,'Group_Legal_Form_Id'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Group_Language_Id',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->dropDownList($model,'Group_Language_Id',$languages,array('class'=>'form-control','prompt'=>'')); ?>
                        <?php echo $form->error($model,'Group_Language_Id'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Active',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->checkBox($model,'Active',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Active'); ?>
                        </div>
                    </div>

                                </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>
<?php 
$js = <<< EOD
    $(document).ready(function(){
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
    });
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>