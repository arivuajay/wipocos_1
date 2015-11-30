<div class="box-primary box">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'author-related-rights-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Auth_Acc_Id', array('value' => $author_model->Auth_Acc_Id));

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
                        <?php echo $form->labelEx($model, 'Auth_Rel_Society_Id', array('class' => '')); ?>
                        <?php $societies = CHtml::listData(Society::model()->with('socOrg')->isActive()->findAll(), 'Society_Id', 'socOrg.Org_Abbrevation'); ?>
                        <?php echo $form->dropDownList($model, 'Auth_Rel_Society_Id', $societies, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Auth_Rel_Society_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Rel_Entry_Date', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Auth_Rel_Entry_Date', array('class' => 'form-control date', 'value' => isset($model->Auth_Rel_Entry_Date) ? $model->Auth_Rel_Entry_Date : date('Y-m-d'))); ?>
                        <?php echo $form->error($model, 'Auth_Rel_Entry_Date'); ?>

                        <?php echo $form->labelEx($model, 'Auth_Rel_Exit_Date', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Auth_Rel_Exit_Date', array('class' => 'form-control date', 'value' => isset($model->Auth_Rel_Exit_Date) ? $model->Auth_Rel_Exit_Date : date('Y-m-d'))); ?>
                        <?php echo $form->error($model, 'Auth_Rel_Exit_Date'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Rel_Internal_Position_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Auth_Rel_Internal_Position_Id', $internal_positions, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Auth_Rel_Internal_Position_Id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Rel_Entry_Date_2', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Auth_Rel_Entry_Date_2', array('class' => 'form-control date', 'value' => isset($model->Auth_Rel_Entry_Date_2) ? $model->Auth_Rel_Entry_Date_2 : date('Y-m-d'))); ?>
                        <?php echo $form->error($model, 'Auth_Rel_Entry_Date_2'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Rel_Exit_Date_2', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'Auth_Rel_Exit_Date_2', array('class' => 'form-control date', 'value' => isset($model->Auth_Rel_Exit_Date_2) ? $model->Auth_Rel_Exit_Date_2 : date('Y-m-d'))); ?>
                        <?php echo $form->error($model, 'Auth_Rel_Exit_Date_2'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Auth_Rel_Region_Id', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'Auth_Rel_Region_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Auth_Rel_Region_Id'); ?>
                    </div>


                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <div class="box-body">

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Rel_Profession_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Auth_Rel_Profession_Id', $professions, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($model, 'Auth_Rel_Profession_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Rel_File', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Auth_Rel_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($model, 'Auth_Rel_File'); ?>
                        </div>

                        <?php if (!$model->isNewRecord) { ?>
                            <!--                <div class="form-group">
                            <?php echo CHtml::link('View File', $model->getFilePath(), array('target' => '_blank')) ?>
                                            </div>-->
                        <?php } ?>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Rel_Duration', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Auth_Rel_Duration', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($model, 'Auth_Rel_Duration'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Rel_Avl_Work_Cat_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Auth_Rel_Avl_Work_Cat_Id', $work_categories, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($model, 'Auth_Rel_Avl_Work_Cat_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Rel_Type_Rght_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Auth_Rel_Type_Rght_Id', $right_types, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Auth_Rel_Type_Rght_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Rel_Managed_Rights_Id', array('class' => '')); ?>
                            <div class="row">
                                <?php
                                if ($model->Auth_Rel_Managed_Rights_Id && is_array($model->Auth_Rel_Managed_Rights_Id)) {
                                    $selected_keys = array_flip($model->Auth_Rel_Managed_Rights_Id);
                                    $remain_manages = @array_diff_key($managed_rights, $selected_keys);
                                    $selected_manages = @array_intersect_key($managed_rights, $selected_keys);
                                } else {
                                    $remain_manages = $managed_rights;
                                    $selected_manages = array();
                                }
                                echo '<div class="col-sm-5">';
                                echo CHtml::dropDownList('Auth_Rel_Managed_Rights_Source', array(), $remain_manages, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-rel-mged-from', 'size' => 7));
                                echo '</div><div class="col-sm-2 mt30"><button type="button" id="btn-add-rel-mged-select" class="btn btn-default btn-sm">>></button><br />';
                                echo '<br /><button type="button" id="btn-remove-rel-mged-select" class="btn btn-default btn-sm"><<</button></div><div class="col-sm-5">';
                                echo CHtml::dropDownList('Auth_Rel_Managed_Rights_Destination', array(), $selected_manages, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-rel-mged-to', 'size' => 7));

                                echo $form->dropDownList($model, 'Auth_Rel_Managed_Rights_Id', $managed_rights, array('class' => 'hide', 'multiple' => 'multiple'));
                                echo '</div>';
                                ?>
                            </div>
                            <?php // echo $form->dropDownList($model, 'Auth_Rel_Managed_Rights_Id', $managed_rights, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($model, 'Auth_Rel_Managed_Rights_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Auth_Rel_Territories_Id', array('class' => '')); ?>
                            <div class="row">
                                <?php
                                if ($model->Auth_Rel_Territories_Id && is_array($model->Auth_Rel_Territories_Id)) {
                                    $selected_terr_keys = @array_flip($model->Auth_Rel_Territories_Id);
                                    $remain_terr = @array_diff_key($territories, $selected_terr_keys);
                                    $selected_terr = @array_intersect_key($territories, $selected_terr_keys);
                                } else {
                                    $remain_terr = $territories;
                                    $selected_terr = array();
                                }
                                echo '<div class="col-sm-5">';
                                echo CHtml::dropDownList('Auth_Rel_Territories_Source', array(), $remain_terr, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-terr-from', 'size' => 7));
                                echo '</div><div class="col-sm-2 mt30"><button type="button" id="btn-add-terr-select" class="btn btn-default btn-sm">>></button><br />';
                                echo '<br /><button type="button" id="btn-remove-terr-select" class="btn btn-default btn-sm"><<</button></div><div class="col-sm-5">';
                                echo CHtml::dropDownList('Auth_Rel_Territories_Destination', array(), $selected_terr, array('class' => 'form-control', 'multiple' => true, 'id' => 'select-terr-to', 'size' => 7));

                                echo $form->dropDownList($model, 'Auth_Rel_Territories_Id', $territories, array('class' => 'hide', 'multiple' => 'multiple'));
                                echo '</div>';
                                ?>
                            </div>
                            <?php // echo $form->dropDownList($model, 'Auth_Rel_Territories_Id', $territories, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($model, 'Auth_Rel_Territories_Id'); ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box-footer text-right">
        <div class="form-group">
            <div class="col-lg-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div>
<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#btn-add-rel-mged-select').click(function(){
            $('#select-rel-mged-from option:selected').each( function() {
                $('#select-rel-mged-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#AuthorRelatedRights_Auth_Rel_Managed_Rights_Id option[value="'+$(this).val()+'"]').attr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-remove-rel-mged-select').click(function(){
            $('#select-rel-mged-to option:selected').each( function() {
                $('#select-rel-mged-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#AuthorRelatedRights_Auth_Rel_Managed_Rights_Id option[value="'+$(this).val()+'"]').removeAttr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-add-terr-select').click(function(){
            $('#select-terr-from option:selected').each( function() {
                $('#select-terr-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#AuthorRelatedRights_Auth_Rel_Territories_Id option[value="'+$(this).val()+'"]').attr('selected','selected');
                $(this).remove();
            });
            return false;
        });
        $('#btn-remove-terr-select').click(function(){
            $('#select-terr-to option:selected').each( function() {
                $('#select-terr-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $('#AuthorRelatedRights_Auth_Rel_Territories_Id option[value="'+$(this).val()+'"]').removeAttr('selected','selected');
                $(this).remove();
            });
            return false;
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_mged_rights_form', $js);
?>