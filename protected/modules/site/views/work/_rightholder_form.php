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
                                <?php echo CHtml::textField('fn', $_REQUEST['fn'], array('class' => 'form-control')); ?>
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
                        <table id="search_result" class="table table-bordered selectable">
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
                                        <tr data-urole="AU" data-uid="<?php echo $user->Auth_Internal_Code ?>">
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
                                        <tr data-urole="PU" data-uid="<?php echo $user->Pub_Internal_Code ?>">
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

    <a name="role-foundation">&nbsp;</a>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Role', array('class' => 'col-lg-2 control-label')); ?>
                            <div class="col-lg-8 user-role-dropdown">
                                <?php
                                $authRole = CHtml::listData(MasterTypeRights::model()->isActive()->isAuthor()->findAll(), 'Master_Type_Rights_Id', 'Type_Rights_Name');
                                $pubRole = CHtml::listData(MasterTypeRights::model()->isActive()->isPublisher()->findAll(), 'Master_Type_Rights_Id', 'Type_Rights_Name');
                                echo $form->dropDownList($model, 'Work_Right_Role', array(), array('class' => 'form-control default-role'));
                                echo $form->dropDownList($model, 'Work_Right_Role', $authRole, array('class' => 'form-control hide author-role', 'disabled' => 'disabled'));
                                echo $form->dropDownList($model, 'Work_Right_Role', $pubRole, array('class' => 'form-control hide publisher-role', 'disabled' => 'disabled'));
                                ?>
<?php echo $form->error($model, 'Work_Right_Role'); ?>
                            </div>
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
<?php echo CHtml::submitButton('Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                </div>
                <div class="col-lg-11 help-block">
<?php echo $form->error($model, 'Work_Member_Internal_Code'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box-body">
                    <div class="form-group foundation">
                        <div class="box-header">
                            <h3 class="box-title">Linked Rightholders</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-condensed" id="linked-holders">
                                <thead>
                                    <tr>
                                        <th>Member Name</th>
                                        <th>Internal Code</th>
                                        <th>Role</th>
                                        <th>Broadcasting Share</th>
                                        <th>Broadcasting Special</th>
                                        <!--<th>Broadcasting Organization</th>-->
                                        <th>Mechanical Share</th>
                                        <th>Mechanical Special</th>
                                        <!--<th>Mechanical Organization</th>-->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($work_model->workRightholders) {
                                        foreach ($work_model->workRightholders as $key => $member) {
                                            if ($member->workAuthor) {
                                                $name = $member->workAuthor->Auth_Sur_Name;
                                                $url = array('/site/authoraccount/view', 'id' => $member->workAuthor->Auth_Acc_Id);
                                                $role = 'AU';
                                            } elseif ($member->workPublisher) {
                                                $name = $member->workPublisher->Pub_Corporate_Name;
                                                $url = array('/site/publisheraccount/view', 'id' => $member->workPublisher->Pub_Acc_Id);
                                                $role = 'PU';
                                            }
                                            ?>
                                            <tr data-urole="<?php echo $role; ?>" data-uid="<?php echo $member->Work_Member_Internal_Code ?>">
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $member->Work_Member_Internal_Code; ?></td>
                                                <td><?php echo $member->workRightRole->Type_Rights_Name; ?></td>
                                                <td><?php echo $member->Work_Right_Broad_Share; ?></td>
                                                <td><?php echo $member->getSpecialStatus($member->Work_Right_Broad_Special); ?></td>
                                                <!--<td><?php // echo $member->workRightBroadOrg->Org_Abbrevation;     ?></td>-->
                                                <td><?php echo $member->Work_Right_Mech_Share; ?></td>
                                                <td><?php echo $member->getSpecialStatus($member->Work_Right_Mech_Special); ?></td>
                                                <!--<td><?php // echo $member->workRightMechOrg->Org_Abbrevation;     ?></td>-->
                                                <td>
                                                    <?php echo CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $url); ?>&nbsp;&nbsp;
                                                    <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', '#role-foundation', array('class' => 'holder-edit','data-brshare'=>$member->Work_Right_Broad_Share,'data-brspl'=>$member->Work_Right_Broad_Special,'data-mcshare'=>$member->Work_Right_Mech_Share,'data-mcspl'=>$member->Work_Right_Mech_Special)); ?>&nbsp;&nbsp;
        <?php echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', array('/site/work/holderremove', 'id' => $member->Work_Right_Id)); ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No records found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>



</div>


<?php
$js = <<< EOD
    $(document).ready(function() {
        $(document).on('click','.holder-edit',function(){
            $(this).closest('tr').trigger('click');
            _brshare = $(this).data('brshare');
            _brspl =  $(this).data('brspl');
            _mcshare =  $(this).data('mcshare');
            _mcspl =  $(this).data('mcspl');

            $('#WorkRightholder_Work_Right_Broad_Share').val(_brshare);
            $('#WorkRightholder_Work_Right_Broad_Special').val(_brspl);
            $('#WorkRightholder_Work_Right_Mech_Share').val(_mcshare);
            $('#WorkRightholder_Work_Right_Mech_Special').val(_mcspl);
        });

        $("#search_result tr,#linked-holders tr").click(function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            _uid = $(this).data('uid');
            _urole =  $(this).data('urole');

            $('#WorkRightholder_Work_Member_Internal_Code').val(_uid);
            $('.user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            if(_urole == 'AU'){
                $('.user-role-dropdown select.author-role').removeAttr('disabled').removeClass('hide');
            }else if(_urole == 'PU'){
                $('.user-role-dropdown select.publisher-role').removeAttr('disabled').removeClass('hide');
            }
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_right_form', $js);
?>