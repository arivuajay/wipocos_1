<?php
/* @var $this SharedefinitionperroleController */
/* @var $model ShareDefinitionPerRole */
/* @var $form CActiveForm */
$roles = MasterTypeRights::model()->getRolelist();
//$roles = CHtml::listData(MasterRole::model()->isActive()->findAll(), 'Master_Role_ID', 'Description');
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'share-definition-per-role-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            ?>
            <div class="box-body">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Shr_Def_Role', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->dropDownList($model, 'Shr_Def_Role', $roles, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Shr_Def_Role'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Shr_Def_Equ_remn', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Shr_Def_Equ_remn', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Shr_Def_Equ_remn'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Shr_Def_Blank_Tape_remn', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Shr_Def_Blank_Tape_remn', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Shr_Def_Blank_Tape_remn'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Shr_Def_Neigh_Rgts', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Shr_Def_Neigh_Rgts', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Shr_Def_Neigh_Rgts'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Shr_Def_Excl_Rgts', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Shr_Def_Excl_Rgts', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Shr_Def_Excl_Rgts'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Active', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->checkBox($model, 'Active', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Active'); ?>
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