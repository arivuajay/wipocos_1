<?php
/* @var $this MasterLabelController */
/* @var $model MasterLabel */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'master-label-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
	'enableAjaxValidation'=>true,
)); ?>
            <div class="box-body">
                                    <div class="form-group">
                        <?php echo $form->labelEx($model,'Label_Code',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Label_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                        <?php echo $form->error($model,'Label_Code'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Label_Name',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Label_Name',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                        <?php echo $form->error($model,'Label_Name'); ?>
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