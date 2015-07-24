<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'tariff-contracts-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            ?>
            <div class="box-body">
                <div class="form-group foundation" style="margin: 5px;">
                    <div class="box-header">
                        <h3 class="box-title">Search</h3>
                    </div>
                    <div class="box-body">
                        <p class="help-inline">Enter the begin of the name or internal code or one of the following criteria:</p>
                        <div class="col-lg-6">
                            <div class="box-body">
                                <div class="form-group hide">
                                    <?php echo CHtml::label('Record', '', array('class' => 'control-label')); ?>&nbsp;
                                    <?php echo CHtml::checkBox('is_record', (/* $_REQUEST['is_record'] == 1 */true), array('class' => 'form-control', 'id' => 'is_record')); ?>&nbsp;&nbsp;
                                    <div id="chkbox_err_rec" class="errorMessage hide">Select Record</div>
                                </div>
                                <div class="form-group">
                                    <?php echo CHtml::label('Search', '', array('class' => 'control-label')); ?>
                                    <?php echo CHtml::textField('searach_text', $_REQUEST['fn'], array('class' => 'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo CHtml::button('Search', array('class' => 'btn btn-success', 'name' => 'rght_holder', 'id' => 'search_button_rec')); ?>
                                    <?php // echo CHtml::resetButton('Clear', array('class' => 'btn btn-primary')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group foundation" style="margin: 5px;">
                    <div class="box-header">
                        <h3 class="box-title">User</h3>
                    </div>
                    <div class="box-body"></div>
                </div>

                <div class="form-group foundation" style="margin: 5px;">
                    <div class="box-header">
                        <h3 class="box-title">Agreement</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Internal_Code', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'Tarf_Cont_Internal_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'Tarf_Cont_Internal_Code'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group foundation" style="margin: 5px;">
                    <div class="box-header">
                        <h3 class="box-title">Establishment</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_City_Id', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'Tarf_Cont_City_Id', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'Tarf_Cont_City_Id'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_District', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'Tarf_Cont_District', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($model, 'Tarf_Cont_District'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Area', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'Tarf_Cont_Area', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($model, 'Tarf_Cont_Area'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Tariff_Id', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'Tarf_Cont_Tariff_Id', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'Tarf_Cont_Tariff_Id'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Insp_Id', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'Tarf_Cont_Insp_Id', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'Tarf_Cont_Insp_Id'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Balance', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'Tarf_Cont_Balance', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                <?php echo $form->error($model, 'Tarf_Cont_Balance'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box-body">
                        <div class="form-group foundation">
                            <div class="box-header">
                                <h3 class="box-title">Royalty</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_Amt_Pay', array('class' => '')); ?>
                                        <?php echo $form->textField($model, 'Tarf_Cont_Amt_Pay', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_Amt_Pay'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_From', array('class' => '')); ?>
                                        <?php echo $form->textField($model, 'Tarf_Cont_From', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_From'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_To', array('class' => '')); ?>
                                        <?php echo $form->textField($model, 'Tarf_Cont_To', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_To'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_Sign_Date', array('class' => '')); ?>
                                        <?php echo $form->textField($model, 'Tarf_Cont_Sign_Date', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_Sign_Date'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_Pay_Id', array('class' => '')); ?>
                                        <?php echo $form->textField($model, 'Tarf_Cont_Pay_Id', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_Pay_Id'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_Portion', array('class' => '')); ?>
                                        <?php echo $form->textField($model, 'Tarf_Cont_Portion', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_Portion'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_Comment', array('class' => '')); ?>
                                        <?php echo $form->textArea($model, 'Tarf_Cont_Comment', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_Comment'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box-body">
                        <div class="form-group foundation">
                            <div class="box-header">
                                <h3 class="box-title">Events</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_Event_Place_Id', array('class' => '')); ?>
                                        <?php echo $form->textField($model, 'Tarf_Cont_Event_Place_Id', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_Event_Place_Id'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_Event_Date', array('class' => '')); ?>
                                        <?php echo $form->textField($model, 'Tarf_Cont_Event_Date', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_Event_Date'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Tarf_Cont_Event_Comment', array('class' => '')); ?>
                                        <?php echo $form->textArea($model, 'Tarf_Cont_Event_Comment', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                                        <?php echo $form->error($model, 'Tarf_Cont_Event_Comment'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="col-lg-1">
                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>