<?php
/* @var $this DistributionsettingController */
/* @var $model DistributionSetting */
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
                'id' => 'distribution-setting-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            ?>
            <div class="box-body">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Setting_Internal_Code', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Setting_Internal_Code', array('class' => 'form-control', 'readonly' => true)); ?>
                        <?php echo $form->error($model, 'Setting_Internal_Code'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Setting_Identifier', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Setting_Identifier', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Setting_Identifier'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Setting_Date', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Setting_Date', array('class' => 'form-control date')); ?>
                        <?php echo $form->error($model, 'Setting_Date'); ?>
                    </div>
                </div>

<!--                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Total_Distribute', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Total_Distribute', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                        <?php echo $form->error($model, 'Total_Distribute'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Closing_Distribute', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Closing_Distribute', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Closing_Distribute'); ?>
                    </div>
                </div>-->

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