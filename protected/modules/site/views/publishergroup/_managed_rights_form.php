<div class="box-primary box">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'publisher-group-managed-rights-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pub_Group_Id', array('value' => $group_model->Pub_Group_Id));

    $societies = Myclass::getSociety();
    $professions = Myclass::getMasterProfession();
    $work_categories = Myclass::getMasterWorkCategory();
    $occ = $group_model->Pub_Group_Is_Publisher == '1' ? MasterTypeRights::OCCUPATION_PUBLISHER : MasterTypeRights::OCCUPATION_PRODUCER;
    $rank = $group_model->Pub_Group_Is_Publisher == '1' ? MasterTypeRights::PUBLISHER_RANK : MasterTypeRights::PRODUCER_RANK;
    $domain = $group_model->Pub_Group_Is_Publisher == '1' ? MasterTypeRights::PUBLISHER_DOMAIN : MasterTypeRights::PRODUCER_DOMAIN;
    $right_types = Myclass::getMasterTypeRight($occ, $rank, $domain);
    $territories = Myclass::getMasterTerritory();
    $managed_rights = Myclass::getMasterManagedRight();
    $internal_positions = Myclass::getMasterInternalPosition();
    $regions = Myclass::getMasterRegion();
    ?>

    <div class="col-lg-5">
        <div class="box-body">



            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Society_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Pub_Group_Mnge_Society_Id', $societies, array('class' => 'form-control', 'disabled' => 'disabled')); ?>
                <?php echo $form->error($model, 'Pub_Group_Mnge_Society_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Entry_Date', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Pub_Group_Mnge_Entry_Date', array('class' => 'form-control date', 'value' => isset($model->Pub_Group_Mnge_Entry_Date) ? $model->Pub_Group_Mnge_Entry_Date : date('Y-m-d'))); ?>
                <?php echo $form->error($model, 'Pub_Group_Mnge_Entry_Date'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Exit_Date', array('class' => '')); ?>
                <?php
                $exit_date = '';
                if (isset($model->Pub_Group_Mnge_Exit_Date)) {
                    $exit_date = $model->Pub_Group_Mnge_Exit_Date != "0000-00-00" ? $model->Pub_Group_Mnge_Exit_Date : '';
                }
                ?>
                <?php echo $form->textField($model, 'Pub_Group_Mnge_Exit_Date', array('class' => 'form-control date', 'value' => $exit_date)); ?>
                <?php echo $form->error($model, 'Pub_Group_Mnge_Exit_Date'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Internal_Position_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Pub_Group_Mnge_Internal_Position_Id', $internal_positions, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Pub_Group_Mnge_Internal_Position_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Entry_Date_2', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Pub_Group_Mnge_Entry_Date_2', array('class' => 'form-control date', 'value' => isset($model->Pub_Group_Mnge_Entry_Date_2) ? $model->Pub_Group_Mnge_Entry_Date_2 : date('Y-m-d'))); ?>
                <?php echo $form->error($model, 'Pub_Group_Mnge_Entry_Date_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Exit_Date_2', array('class' => '')); ?>
                <?php
                $exit_date_2 = '';
                if (isset($model->Pub_Group_Mnge_Exit_Date_2)) {
                    $exit_date = $model->Pub_Group_Mnge_Exit_Date_2 != "0000-00-00" ? $model->Pub_Group_Mnge_Exit_Date_2 : '';
                }
                ?>
                <?php echo $form->textField($model, 'Pub_Group_Mnge_Exit_Date_2', array('class' => 'form-control date', 'value' => $exit_date_2)); ?>
                <?php echo $form->error($model, 'Pub_Group_Mnge_Exit_Date_2'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Region_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Pub_Group_Mnge_Region_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($model, 'Pub_Group_Mnge_Region_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'not_available', array('class' => '')); ?><br />
                <?php echo $form->checkBox($model, 'not_available', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                <?php echo $form->error($model, 'not_available'); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
        <div class="box-body">

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Profession_Id', array('class' => '')); ?>
                <?php echo $form->dropDownList($model, 'Pub_Group_Mnge_Profession_Id', $professions, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($model, 'Pub_Group_Mnge_Profession_Id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Pub_Group_Mnge_File', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Pub_Group_Mnge_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Pub_Group_Mnge_File'); ?>
            </div>


            <!--            <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Duration', array('class' => '')); ?>
            <?php echo $form->textField($model, 'Pub_Group_Mnge_Duration', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'Pub_Group_Mnge_Duration'); ?>
                        </div>-->

            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Rights and Territories</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Avl_Work_Cat_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Pub_Group_Mnge_Avl_Work_Cat_Id', $work_categories, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Pub_Group_Mnge_Avl_Work_Cat_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Type_Rght_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Pub_Group_Mnge_Type_Rght_Id', $right_types, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Pub_Group_Mnge_Type_Rght_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Managed_Rights_Id', array('class' => '')); ?>
                            <div class="row">
                                <?php
                                if ($model->Pub_Group_Mnge_Managed_Rights_Id && is_array($model->Pub_Group_Mnge_Managed_Rights_Id)) {
                                    $selected_keys = array_flip($model->Pub_Group_Mnge_Managed_Rights_Id);
                                    $remain_manages = @array_diff_key($managed_rights, $selected_keys);
                                    $selected_manages = @array_intersect_key($managed_rights, $selected_keys);
                                } else {
                                    $remain_manages = $managed_rights;
                                    $selected_manages = array();
                                }
                                echo '<div class="col-sm-5">';
                                echo CHtml::dropDownList('Pub_Group_Mnge_Managed_Rights_Id_Source', array(), $remain_manages, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-pub-grp-mgd-mgmd-from', 'size' => 7));
                                echo '</div><div class="col-sm-2 mt30"><button type="button" id="btn-add-pub-grp-mgd-mgmd-select" class="btn btn-default btn-sm">>></button><br />';
                                echo '<br /><button type="button" id="btn-remove-pub-grp-mgd-mgmd-select" class="btn btn-default btn-sm"><<</button></div><div class="col-sm-5">';
                                echo CHtml::dropDownList('Pub_Group_Mnge_Managed_Rights_Id_Destination', array(), $selected_manages, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-pub-grp-mgd-mgmd-to', 'size' => 7));

                                echo $form->dropDownList($model, 'Pub_Group_Mnge_Managed_Rights_Id', $managed_rights, array('class' => 'hide', 'multiple' => 'multiple'));
                                echo '</div>';
                                ?>
                            </div>
                            <?php // echo $form->dropDownList($model, 'Pub_Group_Mnge_Managed_Rights_Id', $managed_rights, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Pub_Group_Mnge_Managed_Rights_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Pub_Group_Mnge_Territories_Id', array('class' => '')); ?>
                            <div class="row">
                                <?php
                                if ($model->Pub_Group_Mnge_Territories_Id && is_array($model->Pub_Group_Mnge_Territories_Id)) {
                                    $selected_terr_keys = @array_flip($model->Pub_Group_Mnge_Territories_Id);
                                    $remain_terr = @array_diff_key($territories, $selected_terr_keys);
                                    $selected_terr = @array_intersect_key($territories, $selected_terr_keys);
                                } else {
                                    $remain_terr = $territories;
                                    $selected_terr = array();
                                }
                                echo '<div class="col-sm-5">';
                                echo CHtml::dropDownList('Pub_Mnge_Territories_Source', array(), $remain_terr, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-pub-grp-mgd-terr-from', 'size' => 7));
                                echo '</div><div class="col-sm-2 mt30"><button type="button" id="btn-add-pub-grp-mgd-terr-select" class="btn btn-default btn-sm">>></button><br />';
                                echo '<br /><button type="button" id="btn-remove-pub-grp-mgd-terr-select" class="btn btn-default btn-sm"><<</button></div><div class="col-sm-5">';
                                echo CHtml::dropDownList('Pub_Mnge_Territories_Destination', array(), $selected_terr, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-pub-grp-mgd-terr-to', 'size' => 7));

                                echo $form->dropDownList($model, 'Pub_Group_Mnge_Territories_Id', $territories, array('class' => 'hide', 'multiple' => 'multiple'));
                                echo '</div>';
                                ?>
                            </div>
                            <?php // echo $form->dropDownList($model, 'Pub_Group_Mnge_Territories_Id', $territories, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Pub_Group_Mnge_Territories_Id'); ?>
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

<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#btn-add-pub-grp-mgd-mgmd-select').click(function(){
            $('#select-pub-grp-mgd-mgmd-from option:selected').each( function() {
                $('#select-pub-grp-mgd-mgmd-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#PublisherGroupManageRights_Pub_Group_Mnge_Managed_Rights_Id option[value="'+$(this).val()+'"]').attr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-remove-pub-grp-mgd-mgmd-select').click(function(){
            $('#select-pub-grp-mgd-mgmd-to option:selected').each( function() {
                $('#select-pub-grp-mgd-mgmd-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#PublisherGroupManageRights_Pub_Group_Mnge_Managed_Rights_Id option[value="'+$(this).val()+'"]').removeAttr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-add-pub-grp-mgd-terr-select').click(function(){
            $('#select-pub-grp-mgd-terr-from option:selected').each( function() {
                $('#select-pub-grp-mgd-terr-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#PublisherGroupManageRights_Pub_Group_Mnge_Territories_Id option[value="'+$(this).val()+'"]').attr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-remove-pub-grp-mgd-terr-select').click(function(){
            $('#select-pub-grp-mgd-terr-to option:selected').each( function() {
                $('#select-pub-grp-mgd-terr-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#PublisherGroupManageRights_Pub_Group_Mnge_Territories_Id option[value="'+$(this).val()+'"]').removeAttr('selected','selected');
                $(this).remove();
            });
            return false;
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_mged_rights_form', $js);
?>