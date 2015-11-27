<div class="box-primary box">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'author-managed-rights-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Auth_Acc_Id', array('value' => $author_model->Auth_Acc_Id));

    $societies = Myclass::getSociety();
    $professions = Myclass::getMasterProfession();
    $work_categories = Myclass::getMasterWorkCategory();
    $right_types = Myclass::getMasterTypeRight(MasterTypeRights::OCCUPATION_AUTHOR, MasterTypeRights::AUTHOR_RANK, MasterTypeRights::AUTHOR_DOMAIN);
    $territories = Myclass::getMasterTerritory();
    $managed_rights = MasterManagedRights::getMasterManagedRightbyRank(MasterManagedRights::AUTHOR_RANK);
    $internal_positions = Myclass::getMasterInternalPosition();
    ?>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-5">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Mnge_Society_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Auth_Mnge_Society_Id', $societies, array('class' => 'form-control', 'disabled' => 'disabled')); ?>
                        <?php echo $form->error($model, 'Auth_Mnge_Society_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Mnge_Entry_Date', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Auth_Mnge_Entry_Date', array('class' => 'form-control date', 'value' => isset($model->Auth_Mnge_Entry_Date) ? $model->Auth_Mnge_Entry_Date : date('Y-m-d'))); ?>
                        <?php echo $form->error($model, 'Auth_Mnge_Entry_Date'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Mnge_Exit_Date', array('class' => '')); ?>
                        <?php
                        $exit_date = '';
                        if (isset($model->Auth_Mnge_Exit_Date)) {
                            $exit_date = $model->Auth_Mnge_Exit_Date != "0000-00-00" ? $model->Auth_Mnge_Exit_Date : '';
                        }
                        ?>
                        <?php echo $form->textField($model, 'Auth_Mnge_Exit_Date', array('class' => 'form-control date', 'value' => $exit_date)); ?>
                        <?php echo $form->error($model, 'Auth_Mnge_Exit_Date'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Mnge_Internal_Position_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Auth_Mnge_Internal_Position_Id', $internal_positions, array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'Auth_Mnge_Internal_Position_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Mnge_Entry_Date_2', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Auth_Mnge_Entry_Date_2', array('class' => 'form-control date', 'value' => isset($model->Auth_Mnge_Entry_Date_2) ? $model->Auth_Mnge_Entry_Date_2 : date('Y-m-d'))); ?>
                        <?php echo $form->error($model, 'Auth_Mnge_Entry_Date_2'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Mnge_Exit_Date_2', array('class' => '')); ?>
                        <?php
                        $exit_date_2 = '';
                        if (isset($model->Auth_Mnge_Exit_Date_2)) {
                            $exit_date_2 = $model->Auth_Mnge_Exit_Date_2 != "0000-00-00" ? $model->Auth_Mnge_Exit_Date_2 : '';
                        }
                        ?>
                        <?php echo $form->textField($model, 'Auth_Mnge_Exit_Date_2', array('class' => 'form-control date', 'value' => $exit_date_2)); ?>
                        <?php echo $form->error($model, 'Auth_Mnge_Exit_Date_2'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Mnge_Region_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Auth_Mnge_Region_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Auth_Mnge_Region_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'not_available', array('class' => '')); ?><br />
                        <?php echo $form->checkBox($model, 'not_available', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                        <?php echo $form->error($model, 'not_available'); ?>
                    </div>

                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <div class="box-body">

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Mnge_Profession_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Auth_Mnge_Profession_Id', $professions, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Auth_Mnge_Profession_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Mnge_File', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Auth_Mnge_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($model, 'Auth_Mnge_File'); ?>
                        </div>

                        <?php if (!$model->isNewRecord) { ?>
                            <!--                <div class="form-group">
                            <?php echo CHtml::link('View File', $model->getFilePath(), array('target' => '_blank')) ?>
                                            </div>-->
                        <?php } ?>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Mnge_Duration', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Auth_Mnge_Duration', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($model, 'Auth_Mnge_Duration'); ?>
                        </div>

                        <div class="form-group foundation">
                            <div class="box-header">
                                <h3 class="box-title">Rights and Territories</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Auth_Mnge_Avl_Work_Cat_Id', array('class' => '')); ?>
                                        <?php echo $form->dropDownList($model, 'Auth_Mnge_Avl_Work_Cat_Id', $work_categories, array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'Auth_Mnge_Avl_Work_Cat_Id'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Auth_Mnge_Type_Rght_Id', array('class' => '')); ?>
                                        <?php echo $form->dropDownList($model, 'Auth_Mnge_Type_Rght_Id', $right_types, array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'Auth_Mnge_Type_Rght_Id'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Auth_Mnge_Managed_Rights_Id', array('class' => '')); ?>
                                        <div class="row">
                                            <?php
                                            if ($model->Auth_Mnge_Managed_Rights_Id && is_array($model->Auth_Mnge_Managed_Rights_Id)) {
                                                $selected_keys = array_flip($model->Auth_Mnge_Managed_Rights_Id);
                                                $remain_manages = @array_diff_key($managed_rights, $selected_keys);
                                                $selected_manages = @array_intersect_key($managed_rights, $selected_keys);
                                            } else {
                                                $remain_manages = $managed_rights;
                                                $selected_manages = array();
                                            }
                                            echo '<div class="col-sm-5">';
                                            echo CHtml::dropDownList('Auth_Mnge_Managed_Rights_Source', array(), $remain_manages, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-mged-from', 'size' => 7));
                                            echo '</div><div class="col-sm-2 mt30"><button type="button" id="btn-add-mged-select" class="btn btn-default btn-sm">>></button><br />';
                                            echo '<br /><button type="button" id="btn-remove-mged-select" class="btn btn-default btn-sm"><<</button></div><div class="col-sm-5">';
                                            echo CHtml::dropDownList('Auth_Mnge_Managed_Rights_Destination', array(), $selected_manages, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-mged-to', 'size' => 7));

                                            echo $form->dropDownList($model, 'Auth_Mnge_Managed_Rights_Id', $managed_rights, array('class' => 'hide', 'multiple' => 'multiple'));
                                            echo '</div>';
                                            ?>
                                        </div>
                                        <?php echo $form->error($model, 'Auth_Mnge_Managed_Rights_Id'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Auth_Mnge_Territories_Id', array('class' => '')); ?>
                                        <div class="row">
                                            <?php
                                            if ($model->Auth_Mnge_Territories_Id && is_array($model->Auth_Mnge_Territories_Id)) {
                                                $selected_terr_keys = @array_flip($model->Auth_Mnge_Territories_Id);
                                                $remain_terr = @array_diff_key($territories, $selected_terr_keys);
                                                $selected_terr = @array_intersect_key($territories, $selected_terr_keys);
                                            } else {
                                                $remain_terr = $territories;
                                                $selected_terr = array();
                                            }
                                            echo '<div class="col-sm-5">';
                                            echo CHtml::dropDownList('Auth_Mnge_Territories_Source', array(), $remain_terr, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-terr-from', 'size' => 7));
                                            echo '</div><div class="col-sm-2 mt30"><button type="button" id="btn-add-terr-select" class="btn btn-default btn-sm">>></button><br />';
                                            echo '<br /><button type="button" id="btn-remove-terr-select" class="btn btn-default btn-sm"><<</button></div><div class="col-sm-5">';
                                            echo CHtml::dropDownList('Auth_Mnge_Territories_Destination', array(), $selected_terr, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-terr-to', 'size' => 7));

                                            echo $form->dropDownList($model, 'Auth_Mnge_Territories_Id', $territories, array('class' => 'hide', 'multiple' => 'multiple'));
                                            echo '</div>';
                                            ?>
                                        </div>
                                        <?php echo $form->error($model, 'Auth_Mnge_Territories_Id'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div></div>

    <div class="box-footer text-right">
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
        $('#btn-add-mged-select').click(function(){
            $('#select-mged-from option:selected').each( function() {
                $('#select-mged-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#AuthorManageRights_Auth_Mnge_Managed_Rights_Id option[value="'+$(this).val()+'"]').attr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-remove-mged-select').click(function(){
            $('#select-mged-to option:selected').each( function() {
                $('#select-mged-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#AuthorManageRights_Auth_Mnge_Managed_Rights_Id option[value="'+$(this).val()+'"]').removeAttr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-add-terr-select').click(function(){
            $('#select-terr-from option:selected').each( function() {
                $('#select-terr-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#AuthorManageRights_Auth_Mnge_Territories_Id option[value="'+$(this).val()+'"]').attr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-remove-terr-select').click(function(){
            $('#select-terr-to option:selected').each( function() {
                $('#select-terr-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#AuthorManageRights_Auth_Mnge_Territories_Id option[value="'+$(this).val()+'"]').removeAttr('selected','selected');
                $(this).remove();
            });
            return false;
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_mged_rights_form', $js);
?>