<div class="box box-primary">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-rightholder-search-form',
        'action' => $this->createUrl('/site/work/update', array('id' => $work_model->Work_Id, 'tab' => '7')),
        'method' => 'get',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal')
    ));
    ?>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Rightholders</h3>
                </div>
                <div class="box-body">
                    <p class="help-inline">Enter the begin of the name or title,or one of the following criteria:</p>
                    <div class="col-lg-6">
                        <div class="box-body">
                            <div class="form-group">
                                <?php echo CHtml::label('Surname', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('sur', $_REQUEST['sur'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::label('Firstname', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('fn', $_REQUEST['sur'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::label('Author', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::checkBox('is_auth', ($_REQUEST['is_auth'] == 1), array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::label('Publisher', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::checkBox('is_publ', ($_REQUEST['is_publ'] == 1), array('class' => 'form-control')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-body">
                            <div class="form-group">
                                <?php echo CHtml::label('Internal Code', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('i_code', $_REQUEST['i_code'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::label('IPI name number', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('i_name', $_REQUEST['i_name'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::label('IPI base number', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('i_base', $_REQUEST['i_base'], array('class' => 'form-control')); ?>

                            </div>
                            <div class="form-group">
                                <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-success', 'name' => 'rght_holder')); ?>
                                <?php echo CHtml::resetButton('Clear', array('class' => 'btn btn-primary')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-rightholder-form',
        'action' => $this->createUrl('/site/work/update', array('id' => $work_model->Work_Id, 'tab' => '7')),
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Work_Id', array('value' => $work_model->Work_Id));
    echo $form->hiddenField($model, 'Work_Member_Internal_Code');

    $organizations = CHtml::listData(Organization::model()->findAll(), 'Org_Id', 'Org_Abbrevation');

    if (!empty($authusers) || !empty($publusers)) {
        ?>
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <div class="box-header">
                        <h3 class="box-title">Search Results</h3>
                    </div>
                    <div class="box-body"  style="max-height: 300px; overflow-y: scroll">
                        <table id="search_result" class="table table-bordered selectable" style="max-height: 300px; overflow-y: scroll;">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Internal Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($authusers) {
                                    foreach ($authusers as $key => $user) {
                                        ?>
                                        <tr data-uid="<?php echo $user->Auth_Internal_Code ?>">
                                            <td><?php echo $user->Auth_First_Name ?></td>
                                            <td><?php echo $user->Auth_Sur_Name ?></td>
                                            <td><?php echo $user->Auth_Internal_Code ?></td>
                                        </tr>
                                        <?php
                                    }
                                }

                                if ($publusers) {
                                    foreach ($publusers as $key => $user) {
                                        ?>
                                        <tr data-uid="<?php echo $user->Pub_Internal_Code ?>">
                                            <td><?php echo $user->Pub_Corporate_Name ?></td>
                                            <td><?php echo $user->Pub_Ipi_Base_Number ?></td>
                                            <td><?php echo $user->Pub_Internal_Code ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="col-lg-6">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Broadcasting and performance Shares</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Broad_Share', array('class' => '')); ?>
                            <div class="input-group">
                                <?php echo $form->textField($model, 'Work_Right_Broad_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                <span class="input-group-addon"> %</span>
                            </div>
                            <?php echo $form->error($model, 'Work_Right_Broad_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Broad_Special', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Work_Right_Broad_Special', $model->getSpecialStatus(), array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Work_Right_Broad_Special'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Broad_Org_id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Work_Right_Broad_Org_id', $organizations, array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                            <?php echo $form->error($model, 'Work_Right_Broad_Org_id'); ?>
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
                    <h3 class="box-title">Mechanical Shares</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Mech_Share', array('class' => '')); ?>
                            <div class="input-group">
                                <?php echo $form->textField($model, 'Work_Right_Mech_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                <span class="input-group-addon"> %</span>
                            </div>
                            <?php echo $form->error($model, 'Work_Right_Mech_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Mech_Special', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Work_Right_Mech_Special', $model->getSpecialStatus(), array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Work_Right_Mech_Special'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Mech_Org_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Work_Right_Mech_Org_Id', $organizations, array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                            <?php echo $form->error($model, 'Work_Right_Mech_Org_Id'); ?>
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
                <div class="col-lg-11 help-block">
                    <?php echo $form->error($model, 'Work_Member_Internal_Code'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div>


<?php
$js = <<< EOD
    $(document).ready(function() {
        $("#search_result tr").click(function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            $('#WorkRightholder_Work_Member_Internal_Code').val($(this).data('uid'));
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_right_form', $js);
?>