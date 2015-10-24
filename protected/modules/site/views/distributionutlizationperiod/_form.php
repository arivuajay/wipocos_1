<?php
/* @var $this DistributionutlizationperiodController */
/* @var $model DistributionUtlizationPeriod */
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
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'distribution-utlization-period-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            $classes = DistributionSubclass::classList();
            $settings = DistributionSetting::settingList();
            $years = DistributionUtlizationPeriod::getYearlist();
            ?>
            <div class="box-body">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Period_Internal_Code', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Period_Internal_Code', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4, 'readonly' => true)); ?>
                        <?php echo $form->error($model, 'Period_Internal_Code'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Period_Year', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->dropDownList($model, 'Period_Year', $years, array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Period_Year'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo $form->labelEx($model, 'Period_Number', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Period_Number', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Period_Number'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Period_From', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Period_From', array('class' => 'form-control date')); ?>
                        <?php echo $form->error($model, 'Period_From'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Period_To', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Period_To', array('class' => 'form-control date')); ?>
                        <?php echo $form->error($model, 'Period_To'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Sub_Class_Id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->dropDownList($model, 'Sub_Class_Id', $classes, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Sub_Class_Id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Setting_Id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->dropDownList($model, 'Setting_Id', $settings, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Setting_Id'); ?>
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