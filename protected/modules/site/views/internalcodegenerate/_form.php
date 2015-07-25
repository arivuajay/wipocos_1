<?php
/* @var $this InternalcodegenerateController */
/* @var $model InternalcodeGenerate */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'internalcode-generate-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            $societies = CHtml::listData(Society::model()->with('socOrg')->isActive()->findAll(array('order' => 'Society_Code')), 'Society_Id', 'Society_Code');
            ?>
            <div class="box-body">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Gen_User_Type', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo CHtml::textField('user_type', $model->getUsertype(), array('class' => 'form-control', 'disabled' => true)); ?>
                        <?php echo $form->error($model, 'Gen_User_Type'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Gen_Soc_Id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->dropDownList($model, 'Gen_Soc_Id', $societies, array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Gen_Soc_Id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Gen_Prefix', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Gen_Prefix', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                        <?php echo $form->error($model, 'Gen_Prefix'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Gen_Inter_Code', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Gen_Inter_Code', array('class' => 'form-control', 'maxlength' => $model->Gen_Code_Pad, 'size' => $model->Gen_Code_Pad)); ?>
                        <?php echo $form->error($model, 'Gen_Inter_Code'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo $form->labelEx($model, 'Gen_Suffix', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Gen_Suffix', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                        <?php echo $form->error($model, 'Gen_Suffix'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo $form->labelEx($model, 'Gen_Code_Pad', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Gen_Code_Pad', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Gen_Code_Pad'); ?>
                    </div>
                </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>