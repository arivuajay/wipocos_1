<div class="box-primary box">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'publisher-managed-rights-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pub_Acc_Id', array('value' => $publisher_model->Pub_Acc_Id));

    $societies = Myclass::getSociety();
    $professions = Myclass::getMasterProfession();
    $work_categories = Myclass::getMasterWorkCategory();
    $right_types = Myclass::getMasterTypeRight(MasterTypeRights::OCCUPATION_PUBLISHER, MasterTypeRights::PUBLISHER_RANK, MasterTypeRights::PUBLISHER_DOMAIN);
    $territories = Myclass::getMasterTerritory();
    $managed_rights = MasterManagedRights::getMasterManagedRightbyRank(MasterManagedRights::PUBLISHER_RANK);
    $internal_positions = Myclass::getMasterInternalPosition();
    ?>

    <div class="col-lg-5">
        <div class="box-body">



            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Mnge_Society_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Pub_Mnge_Society_Id', $societies, array('class' => 'form-control','disabled'=>'disabled')); ?>
                <?php echo $form->error($model, 'Pub_Mnge_Society_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Mnge_Entry_Date', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Pub_Mnge_Entry_Date', array('class' => 'form-control date', 'value' => isset($model->Pub_Mnge_Entry_Date) ? $model->Pub_Mnge_Entry_Date : date('Y-m-d'))); ?>
                <?php echo $form->error($model, 'Pub_Mnge_Entry_Date'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Mnge_Exit_Date', array('class' => '')); ?>
                <?php
                $exit_date = '';
                if (isset($model->Pub_Mnge_Exit_Date)) {
                    $exit_date = $model->Pub_Mnge_Exit_Date != "0000-00-00" ? $model->Pub_Mnge_Exit_Date : '';
                }
                ?>
                <?php echo $form->textField($model, 'Pub_Mnge_Exit_Date', array('class' => 'form-control date', 'value' => $exit_date)); ?>
                <?php echo $form->error($model, 'Pub_Mnge_Exit_Date'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Mnge_Internal_Position_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Pub_Mnge_Internal_Position_Id', $internal_positions, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Pub_Mnge_Internal_Position_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Mnge_Entry_Date_2', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Pub_Mnge_Entry_Date_2', array('class' => 'form-control date', 'value' => isset($model->Pub_Mnge_Entry_Date_2) ? $model->Pub_Mnge_Entry_Date_2 : date('Y-m-d'))); ?>
                <?php echo $form->error($model, 'Pub_Mnge_Entry_Date_2'); ?>
            </div>

            <div class="form-group">
                <?php
                $exit_date_2 = '';
                if (isset($model->Pub_Mnge_Exit_Date_2)) {
                    $exit_date_2 = $model->Pub_Mnge_Exit_Date_2 != "0000-00-00" ? $model->Pub_Mnge_Exit_Date_2 : '';
                }
                ?>
                <?php echo $form->labelEx($model, 'Pub_Mnge_Exit_Date_2', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Pub_Mnge_Exit_Date_2', array('class' => 'form-control date', 'value' => $exit_date_2)); ?>
                <?php echo $form->error($model, 'Pub_Mnge_Exit_Date_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Mnge_Region_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Pub_Mnge_Region_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($model, 'Pub_Mnge_Region_Id'); ?>
            </div>


        </div>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
        <div class="box-body">

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Mnge_Profession_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Pub_Mnge_Profession_Id', $professions, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($model, 'Pub_Mnge_Profession_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Mnge_File', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Pub_Mnge_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Pub_Mnge_File'); ?>
            </div>

            <!--            <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Mnge_Duration', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pub_Mnge_Duration', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'Pub_Mnge_Duration'); ?>
                        </div>-->

            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Rights and Territories</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Pub_Mnge_Avl_Work_Cat_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Pub_Mnge_Avl_Work_Cat_Id', $work_categories, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Pub_Mnge_Avl_Work_Cat_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Pub_Mnge_Type_Rght_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Pub_Mnge_Type_Rght_Id', $right_types, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Pub_Mnge_Type_Rght_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Pub_Mnge_Managed_Rights_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Pub_Mnge_Managed_Rights_Id', $managed_rights, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Pub_Mnge_Managed_Rights_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Pub_Mnge_Territories_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Pub_Mnge_Territories_Id', $territories, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Pub_Mnge_Territories_Id'); ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <div class="box-footer">
        <div class="form-group">
            <div class="col-lg-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div>