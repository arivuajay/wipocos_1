<div class="box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'performer-related-rights-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Perf_Acc_Id', array('value' => $performer_model->Perf_Acc_Id));

    $societies = CHtml::listData(Society::model()->with('socOrg')->isActive()->findAll(), 'Society_Id', 'Society_Code');
    $professions = CHtml::listData(MasterProfession::model()->isActive()->findAll(), 'Master_Profession_Id', 'Profession_Name');
    $work_categories = CHtml::listData(MasterWorksCategory::model()->isActive()->findAll(), 'Master_Work_Category_Id', 'Work_Category_Name');
    $right_types = CHtml::listData(MasterTypeRights::model()->isActive()->findAll(), 'Master_Type_Rights_Id', 'Type_Rights_Name');
    $territories = CHtml::listData(MasterTerritories::model()->isActive()->findAll(), 'Master_Territory_Id', 'Territory_Name');
    $managed_rights = CHtml::listData(MasterManagedRights::model()->isActive()->findAll(), 'Master_Mgd_Rights_Id', 'Mgd_Rights_Name');
    $internal_positions = CHtml::listData(MasterInternalPosition::model()->isActive()->findAll(), 'Master_Int_Post_Id', 'Int_Post_Name');
    ?>

    <div class="col-lg-5 col-xs-5">
        <div class="box-body">



            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Society_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Perf_Rel_Society_Id', $societies, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Perf_Rel_Society_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Entry_Date', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Rel_Entry_Date', array('class' => 'form-control date', 'value' => isset($model->Perf_Rel_Entry_Date) ? $model->Perf_Rel_Entry_Date : date('Y-m-d'))); ?>
                <?php echo $form->error($model, 'Perf_Rel_Entry_Date'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Exit_Date', array('class' => '')); ?>
                 <?php 
                $exit_date = '';
                if(isset($model->Perf_Rel_Exit_Date)){
                    $exit_date = $model->Perf_Rel_Exit_Date != "0000-00-00" ? $model->Perf_Rel_Exit_Date : '';
                }
                ?>
               <?php echo $form->textField($model, 'Perf_Rel_Exit_Date', array('class' => 'form-control date', 'value' => $exit_date)); ?>
                <?php echo $form->error($model, 'Perf_Rel_Exit_Date'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Internal_Position_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Perf_Rel_Internal_Position_Id', $internal_positions, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Perf_Rel_Internal_Position_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Entry_Date_2', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Rel_Entry_Date_2', array('class' => 'form-control date', 'value' => isset($model->Perf_Rel_Entry_Date_2) ? $model->Perf_Rel_Entry_Date_2 : date('Y-m-d'))); ?>
                <?php echo $form->error($model, 'Perf_Rel_Entry_Date_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Exit_Date_2', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Rel_Exit_Date_2', array('class' => 'form-control date', 'value' => isset($model->Perf_Rel_Exit_Date_2) ? $model->Perf_Rel_Exit_Date_2 : date('Y-m-d'))); ?>
                <?php echo $form->error($model, 'Perf_Rel_Exit_Date_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Region_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Perf_Rel_Region_Id', $regions, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Perf_Rel_Region_Id'); ?>
            </div>


        </div>
    </div>
    <div class="col-lg-1 col-xs-1"></div>
    <div class="col-lg-5 col-xs-5">
        <div class="box-body">

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Profession_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Perf_Rel_Profession_Id', $professions, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Perf_Rel_Profession_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_File', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Rel_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Perf_Rel_File'); ?>
            </div>

            <?php if (!$model->isNewRecord) { ?>
<!--                <div class="form-group">
                    <?php echo CHtml::link('View File', $model->getFilePath(),  array('target' => '_blank')) ?>
                </div>-->
            <?php } ?>

<!--            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Duration', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Perf_Rel_Duration', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Perf_Rel_Duration'); ?>
            </div>-->

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Avl_Work_Cat_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Perf_Rel_Avl_Work_Cat_Id', $work_categories, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Perf_Rel_Avl_Work_Cat_Id'); ?>
            </div>

<!--            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Type_Rght_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Perf_Rel_Type_Rght_Id', $right_types, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Perf_Rel_Type_Rght_Id'); ?>
            </div>-->

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Managed_Rights_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Perf_Rel_Managed_Rights_Id', $managed_rights, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Perf_Rel_Managed_Rights_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Perf_Rel_Territories_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Perf_Rel_Territories_Id', $territories, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Perf_Rel_Territories_Id'); ?>
            </div>


        </div>
    </div>


    <div class="box-footer">
        <div class="form-group">
            <div class="col-lg-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div>