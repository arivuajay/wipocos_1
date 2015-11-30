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

    $societies = CHtml::listData(Society::model()->with('socOrg')->isActive()->findAll(), 'Society_Id', 'Society_Code');
    $professions = CHtml::listData(MasterProfession::model()->isActive()->findAll(), 'Master_Profession_Id', 'Profession_Name');
    $work_categories = CHtml::listData(MasterWorksCategory::model()->isActive()->findAll(), 'Master_Work_Category_Id', 'Work_Category_Name');
    $right_types = CHtml::listData(MasterTypeRights::model()->isActive()->findAll(), 'Master_Type_Rights_Id', 'Type_Rights_Name');
    $territories = CHtml::listData(MasterTerritories::model()->isActive()->findAll(), 'Master_Territory_Id', 'Territory_Name');
    $managed_rights = CHtml::listData(MasterManagedRights::model()->isActive()->findAll(), 'Master_Mgd_Rights_Id', 'Mgd_Rights_Name');
    $internal_positions = CHtml::listData(MasterInternalPosition::model()->isActive()->findAll(), 'Master_Int_Post_Id', 'Int_Post_Name');
    ?>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-5">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pub_Mnge_Society_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Pub_Mnge_Society_Id', $societies, array('class' => 'form-control')); ?>
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
                        <?php echo $form->dropDownList($model, 'Pub_Mnge_Region_Id', $regions, array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Pub_Mnge_Region_Id'); ?>
                    </div>


                </div>
                <div class="col-lg-1 col-xs-1"></div>
                <div class="col-lg-5 col-xs-5">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pub_Mnge_Profession_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Pub_Mnge_Profession_Id', $professions, array('class' => 'form-control')); ?>
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
                        <div class="row">
                            <?php
                            if ($model->Pub_Mnge_Managed_Rights_Id && is_array($model->Pub_Mnge_Managed_Rights_Id)) {
                                $selected_keys = array_flip($model->Pub_Mnge_Managed_Rights_Id);
                                $remain_manages = @array_diff_key($managed_rights, $selected_keys);
                                $selected_manages = @array_intersect_key($managed_rights, $selected_keys);
                            } else {
                                $remain_manages = $managed_rights;
                                $selected_manages = array();
                            }
                            echo '<div class="col-sm-5">';
                            echo CHtml::dropDownList('Pub_Mnge_Managed_Rights_Id_Source', array(), $remain_manages, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-pub-mgd-mgmd-from', 'size' => 7));
                            echo '</div><div class="col-sm-2 mt30"><button type="button" id="btn-add-pub-mgd-mgmd-select" class="btn btn-default btn-sm">>></button><br />';
                            echo '<br /><button type="button" id="btn-remove-pub-mgd-mgmd-select" class="btn btn-default btn-sm"><<</button></div><div class="col-sm-5">';
                            echo CHtml::dropDownList('Pub_Mnge_Managed_Rights_Id_Destination', array(), $selected_manages, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-pub-mgd-mgmd-to', 'size' => 7));

                            echo $form->dropDownList($model, 'Pub_Mnge_Managed_Rights_Id', $managed_rights, array('class' => 'hide', 'multiple' => 'multiple'));
                            echo '</div>';
                            ?>
                        </div>
                        <?php // echo $form->dropDownList($model, 'Pub_Mnge_Managed_Rights_Id', $managed_rights, array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Pub_Mnge_Managed_Rights_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Pub_Mnge_Territories_Id', array('class' => '')); ?>
                        <div class="row">
                            <?php
                            if ($model->Pub_Mnge_Territories_Id && is_array($model->Pub_Mnge_Territories_Id)) {
                                $selected_terr_keys = @array_flip($model->Pub_Mnge_Territories_Id);
                                $remain_terr = @array_diff_key($territories, $selected_terr_keys);
                                $selected_terr = @array_intersect_key($territories, $selected_terr_keys);
                            } else {
                                $remain_terr = $territories;
                                $selected_terr = array();
                            }
                            echo '<div class="col-sm-5">';
                            echo CHtml::dropDownList('Pub_Mnge_Territories_Source', array(), $remain_terr, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-pub-mgd-terr-from', 'size' => 7));
                            echo '</div><div class="col-sm-2 mt30"><button type="button" id="btn-add-pub-mgd-terr-select" class="btn btn-default btn-sm">>></button><br />';
                            echo '<br /><button type="button" id="btn-remove-pub-mgd-terr-select" class="btn btn-default btn-sm"><<</button></div><div class="col-sm-5">';
                            echo CHtml::dropDownList('Pub_Mnge_Territories_Destination', array(), $selected_terr, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-pub-mgd-terr-to', 'size' => 7));

                            echo $form->dropDownList($model, 'Pub_Mnge_Territories_Id', $territories, array('class' => 'hide', 'multiple' => 'multiple'));
                            echo '</div>';
                            ?>
                        </div>
                        <?php // echo $form->dropDownList($model, 'Pub_Mnge_Territories_Id', $territories, array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Pub_Mnge_Territories_Id'); ?>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="box-footer text-right">
        <div class="form-group">
            <div class="col-sm-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#btn-add-pub-mgd-mgmd-select').click(function(){
            $('#select-pub-mgd-mgmd-from option:selected').each( function() {
                $('#select-pub-mgd-mgmd-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#PublisherManageRights_Pub_Mnge_Managed_Rights_Id option[value="'+$(this).val()+'"]').attr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-remove-pub-mgd-mgmd-select').click(function(){
            $('#select-pub-mgd-mgmd-to option:selected').each( function() {
                $('#select-pub-mgd-mgmd-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#PublisherManageRights_Pub_Mnge_Managed_Rights_Id option[value="'+$(this).val()+'"]').removeAttr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-add-pub-mgd-terr-select').click(function(){
            $('#select-pub-mgd-terr-from option:selected').each( function() {
                $('#select-pub-mgd-terr-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#PublisherManageRights_Pub_Mnge_Territories_Id option[value="'+$(this).val()+'"]').attr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-remove-pub-mgd-terr-select').click(function(){
            $('#select-pub-mgd-terr-to option:selected').each( function() {
                $('#select-pub-mgd-terr-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#PublisherManageRights_Pub_Mnge_Territories_Id option[value="'+$(this).val()+'"]').removeAttr('selected','selected');
                $(this).remove();
            });
            return false;
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_mged_rights_form', $js);
?>