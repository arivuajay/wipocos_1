<div class="box-primary box">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'producer-related-rights-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pro_Acc_Id', array('value' => $producer_model->Pro_Acc_Id));

    $societies = Myclass::getSociety();
    $professions = Myclass::getMasterProfession();
    $work_categories = Myclass::getMasterWorkCategory();
    $right_types = Myclass::getMasterTypeRight(MasterTypeRights::OCCUPATION_PRODUCER, MasterTypeRights::PRODUCER_RANK, MasterTypeRights::PRODUCER_DOMAIN);
    $territories = Myclass::getMasterTerritory();
    $managed_rights = MasterManagedRights::getMasterManagedRightbyRank(MasterManagedRights::PRODUCER_RANK);
    $internal_positions = Myclass::getMasterInternalPosition();
    ?>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-5">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Rel_Society_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Pro_Rel_Society_Id', $societies, array('class' => 'form-control', 'disabled' => 'disabled')); ?>
                        <?php echo $form->error($model, 'Pro_Rel_Society_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Rel_Entry_Date', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Pro_Rel_Entry_Date', array('class' => 'form-control date', 'value' => isset($model->Pro_Rel_Entry_Date) ? $model->Pro_Rel_Entry_Date : date('Y-m-d'))); ?>
                        <?php echo $form->error($model, 'Pro_Rel_Entry_Date'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Rel_Exit_Date', array('class' => '')); ?>
                        <?php
                        $exit_date = '';
                        if (isset($model->Pro_Rel_Exit_Date)) {
                            $exit_date = $model->Pro_Rel_Exit_Date != "0000-00-00" ? $model->Pro_Rel_Exit_Date : '';
                        }
                        ?>
                        <?php echo $form->textField($model, 'Pro_Rel_Exit_Date', array('class' => 'form-control date', 'value' => $exit_date)); ?>
                        <?php echo $form->error($model, 'Pro_Rel_Exit_Date'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Rel_Internal_Position_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Pro_Rel_Internal_Position_Id', $internal_positions, array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Pro_Rel_Internal_Position_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Rel_Entry_Date_2', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Pro_Rel_Entry_Date_2', array('class' => 'form-control date', 'value' => isset($model->Pro_Rel_Entry_Date_2) ? $model->Pro_Rel_Entry_Date_2 : date('Y-m-d'))); ?>
                        <?php echo $form->error($model, 'Pro_Rel_Entry_Date_2'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Rel_Exit_Date_2', array('class' => '')); ?>
                        <?php
                        $exit_date_2 = '';
                        if (isset($model->Pro_Rel_Exit_Date_2)) {
                            $exit_date_2 = $model->Pro_Rel_Exit_Date_2 != "0000-00-00" ? $model->Pro_Rel_Exit_Date_2 : '';
                        }
                        ?>
                        <?php echo $form->textField($model, 'Pro_Rel_Exit_Date_2', array('class' => 'form-control date', 'value' => $exit_date_2)); ?>
                        <?php echo $form->error($model, 'Pro_Rel_Exit_Date_2'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Rel_Region_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Pro_Rel_Region_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Pro_Rel_Region_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'not_available', array('class' => '')); ?><br />
                        <?php echo $form->checkBox($model, 'not_available', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                        <?php echo $form->error($model, 'not_available'); ?>
                    </div>

                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Rel_Profession_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Pro_Rel_Profession_Id', $professions, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Pro_Rel_Profession_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pro_Rel_File', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Pro_Rel_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Pro_Rel_File'); ?>
                    </div>

                    <!--            <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pro_Rel_Duration', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'Pro_Rel_Duration', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'Pro_Rel_Duration'); ?>
                                </div>-->

                    <div class="form-group foundation">
                        <div class="box-header">
                            <h3 class="box-title">IPD Data</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Rel_Avl_Work_Cat_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pro_Rel_Avl_Work_Cat_Id', $work_categories, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pro_Rel_Avl_Work_Cat_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Rel_Type_Rght_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pro_Rel_Type_Rght_Id', $right_types, array('class' => 'form-control', 'disabled' => empty($right_types), 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Pro_Rel_Type_Rght_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Rel_Managed_Rights_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pro_Rel_Managed_Rights_Id', $managed_rights, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pro_Rel_Managed_Rights_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Pro_Rel_Territories_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Pro_Rel_Territories_Id', $territories, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Pro_Rel_Territories_Id'); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="box-footer text-right">
        <div class="form-group">
            <div class="col-sm-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div>