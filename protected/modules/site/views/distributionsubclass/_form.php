<?php
/* @var $this DistributionsubclassController */
/* @var $model DistributionSubclass */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'distribution-subclass-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            $class = DistributionClass::classList();
            $measurings = DistributionSubclass::measuringUnitList();
            $calcs = DistributionSubclass::calculatingUnitList();
            $dists = DistributionSubclass::distributionParameters();
            ?>
            <div class="col-lg-5">

                <div class="box-body">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Class_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Class_Id', $class, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Class_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Subclass_Code', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Subclass_Code', array('class' => 'form-control', 'size' => 30, 'maxlength' => 30)); ?>
                        <?php echo $form->error($model, 'Subclass_Code'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Subclass_Name', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Subclass_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Subclass_Name'); ?>
                    </div>

                    <div class="form-group foundation">
                        <div class="box-header">
                            <h3 class="box-title">Statutory Deduction in percentage (%)</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Subclass_Admin_Cost', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Subclass_Admin_Cost', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                    <?php echo $form->error($model, 'Subclass_Admin_Cost'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Subclass_Social_Deduct', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Subclass_Social_Deduct', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                    <?php echo $form->error($model, 'Subclass_Social_Deduct'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Subclass_Cultural_Deduct', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Subclass_Cultural_Deduct', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                    <?php echo $form->error($model, 'Subclass_Cultural_Deduct'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="box-body">
                    <div class="form-group foundation">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $model->getAttributeLabel('Subclass_Measure_Unit'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php echo $form->radioButtonList($model, 'Subclass_Measure_Unit', $measurings, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Subclass_Measure_Unit'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group foundation">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $model->getAttributeLabel('Subclass_Calc_Unit'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php echo $form->radioButtonList($model, 'Subclass_Calc_Unit', $calcs, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Subclass_Calc_Unit'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group foundation">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $model->getAttributeLabel('Subclass_Dist_Params'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php echo $form->radioButtonList($model, 'Subclass_Dist_Params', $dists, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Subclass_Dist_Params'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-12">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>