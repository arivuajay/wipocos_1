<div class="box box-primary">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-rightholder-search-form',
        'action' => $this->createUrl('/site/work/update', array('id' => $work_model->Work_Id, 'tab' => '7')),
        'method' => 'get',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'onsubmit' => "return false;"),
    ));
    ?>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Search</h3>
                </div>
                <div class="box-body">
                    <p class="help-inline">Enter the begin of the name or internal code or one of the following criteria:</p>
                    <div class="col-lg-6">
                        <div class="box-body">
                            <div class="form-group">
                                <?php
                                $view_author = UserIdentity::checkAccess(null, 'authoraccount', 'view');
                                $view_publisher = UserIdentity::checkAccess(null, 'publisheraccount', 'view');
                                $view_performer = UserIdentity::checkAccess(null, 'performeraccount', 'view');
                                $view_producer = UserIdentity::checkAccess(null, 'produceraccount', 'view');

                                $is_auth = $_REQUEST['is_auth'] == 1;
                                $is_publ = $_REQUEST['is_publ'] == 1;
                                if (!$view_author)
                                    $is_publ = true;
                                if (!$view_publisher)
                                    $is_auth = true;

                                if ($view_author) {
                                    echo CHtml::label('Author', '', array('class' => 'control-label'));
                                    echo '&nbsp;';
                                    echo CHtml::checkBox('is_auth', $is_auth, array('class' => 'form-control', 'id' => 'is_auth'));
                                    echo '&nbsp;&nbsp;';
                                }
                                if ($view_publisher) {
                                    echo CHtml::label('Publisher', '', array('class' => 'control-label'));
                                    echo '&nbsp;';
                                    echo CHtml::checkBox('is_publ', $is_publ, array('class' => 'form-control', 'id' => 'is_publ'));
                                    echo '&nbsp;&nbsp;';
                                }
                                if ($view_performer) {
                                    echo CHtml::label('Performer', '', array('class' => 'control-label'));
                                    echo '&nbsp;';
                                    echo CHtml::checkBox('is_perf', $is_publ, array('class' => 'form-control', 'id' => 'is_perf'));
                                    echo '&nbsp;&nbsp;';
                                }
                                if ($view_producer) {
                                    echo CHtml::label('Producer', '', array('class' => 'control-label'));
                                    echo '&nbsp;';
                                    echo CHtml::checkBox('is_prod', $is_publ, array('class' => 'form-control', 'id' => 'is_prod'));
                                    echo '&nbsp;&nbsp;';
                                }
                                ?>
                                <div id="chkbox_err" class="errorMessage hide">Select Author or Publisher or Performer or Producer</div>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::label('Search', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('searach_text', $_REQUEST['fn'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::button('Search', array('class' => 'btn btn-success', 'name' => 'rght_holder', 'id' => 'search_button')); ?>
                                <?php // echo CHtml::resetButton('Clear', array('class' => 'btn btn-primary')); ?>
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
            'afterValidate' => 'js:InsertRightHolder'
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Work_Id', array('value' => $work_model->Work_Id));
    echo $form->hiddenField($model, 'Work_Member_GUID');
    echo $form->hiddenField($model, 'Work_Member_Internal_Code');

    $organizations = CHtml::listData(Organization::model()->findAll(), 'Org_Id', 'Org_Abbrevation');
//    $authusers = AuthorAccount::model()->with('authorManageRights')->isStatusActive()->findAll();
//    $publusers = PublisherAccount::model()->with('publisherManageRights')->isStatusActive()->findAll();
    ?>


    <div id="search_right_result">
        <?php // $this->renderPartial('_search_right', compact('authusers', 'publusers')); ?>
    </div>

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
                                $authRole = CHtml::listData(MasterTypeRights::model()->isActive()->AuthException()->isAuthor()->findAll(), 'Master_Type_Rights_Id', 'rolename');
                                $pubRole = CHtml::listData(MasterTypeRights::model()->isActive()->PubException()->isPublisher()->findAll(), 'Master_Type_Rights_Id', 'rolename');
                                $perfRole = CHtml::listData(MasterTypeRights::model()->isActive()->PerfException()->isPerformer()->findAll(), 'Master_Type_Rights_Id', 'rolename');
                                $proRole = CHtml::listData(MasterTypeRights::model()->isActive()->ProException()->isProducer()->findAll(), 'Master_Type_Rights_Id', 'rolename');

                                echo $form->dropDownList($model, 'Work_Right_Role', array(), array('class' => 'form-control default-role'));
                                echo $form->dropDownList($model, 'Work_Right_Role', $authRole, array('class' => 'form-control hide author-role', 'disabled' => 'disabled'));
                                echo $form->dropDownList($model, 'Work_Right_Role', $pubRole, array('class' => 'form-control hide publisher-role', 'disabled' => 'disabled'));
                                echo $form->dropDownList($model, 'Work_Right_Role', $perfRole, array('class' => 'form-control hide performer-role roles_dd', 'disabled' => 'disabled', 'prompt' => ''));
                                echo $form->dropDownList($model, 'Work_Right_Role', $proRole, array('class' => 'form-control hide producer-role roles_dd', 'disabled' => 'disabled', 'prompt' => ''));
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
                    <h3 class="box-title">Public Performance & Broadcasting Shares</h3>
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
                            <?php echo $form->dropDownList($model, 'Work_Right_Broad_Special', $model->getSpecialStatus(), array('class' => 'form-control', 'prompt' => '')); ?>
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
                            <?php echo $form->dropDownList($model, 'Work_Right_Mech_Special', $model->getSpecialStatus(), array('class' => 'form-control', 'prompt' => '')); ?>
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
                    <input id="main_pub" value="0" type="hidden" />
                    <input id="sub_pub" value="0" type="hidden" />
                    <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-primary', 'id' => 'right_insert')); ?>
                </div>
                <div class="col-lg-11 help-block">
                    <?php echo $form->error($model, 'Work_Member_GUID'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="text-left share_validate"><div id="valid_broadcasting_share" class="hide"></div><div id="valid_mechanical_share" class="hide"></div></div>
                <div class="text-left total_share hide">Broadcasting Share : <span id="equal_total">100 %</span> </div>
                <div class="text-left total_share hide">Mechanical Share : <span id="blank_total">100 %</span></div>
                <div class="text-left total_share hide show_pub_hint">Publisher Share : <span id="pub_total">100 %</span></div>
                <div class="text-left total_share hide show_pub_hint">Main Publisher : <span id="is_main_added"></span></div>
                <br />
                <div class="form-group foundation">
                    <?php echo CHtml::form(array('/site/work/insertright'), 'post', array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'right_form')) ?>
                    <div class="box-header">
                        <h3 class="box-title">Linked Rightholders</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered" id="linked-holders">
                            <thead>
                                <tr>
                                    <th>Rightholder Name</th>
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
                                        $editable = true;
                                        if ($member->workAuthor) {
                                            $name = $member->workAuthor->fullname;
                                            $url = array('/site/authoraccount/view', 'id' => $member->workAuthor->Auth_Acc_Id);
                                            $role = MasterTypeRights::OCCUPATION_AUTHOR;
                                            $internal_code = $member->workAuthor->Auth_Internal_Code;
                                        } elseif ($member->workPublisher) {
                                            $name = $member->workPublisher->Pub_Corporate_Name;
                                            $url = array('/site/publisheraccount/view', 'id' => $member->workPublisher->Pub_Acc_Id);
                                            $role = MasterTypeRights::OCCUPATION_PUBLISHER;
                                            $internal_code = $member->workPublisher->Pub_Internal_Code;
                                        } elseif ($member->workPerformer) {
                                            $name = $member->workPerformer->fullname;
                                            $url = array('/site/performeraccount/view', 'id' => $member->workPerformer->Perf_Acc_Id);
                                            $role = 'PE';
                                            $internal_code = $member->workPerformer->Perf_Internal_Code;
                                            $editable = false;
                                        } elseif ($member->workProducer) {
                                            $name = $member->workProducer->Pro_Corporate_Name;
                                            $url = array('/site/produceraccount/view', 'id' => $member->workProducer->Pro_Acc_Id);
                                            $role = 'PR';
                                            $internal_code = $member->workProducer->Pro_Internal_Code;
                                            $editable = false;
                                        }
                                        ?>
                                        <tr data-urole="<?php echo $role; ?>" data-uid="<?php echo $member->Work_Member_GUID ?>" data-name="<?php echo $name ?>" data-intcode = "<?php echo $internal_code ?>">
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $internal_code; ?></td>
                                            <td><?php echo $member->workRightRole->Type_Rights_Code . ' - ' . $member->workRightRole->Type_Rights_Name; ?></td>
                                            <td><span class="badge share_value broad_share_value" data-share="<?php echo $member->Work_Right_Broad_Share; ?>"><?php echo $member->Work_Right_Broad_Share; ?>%</span></td>
                                            <td><?php echo $member->Work_Right_Broad_Special != '' ? $member->getSpecialStatus($member->Work_Right_Broad_Special) : ''; ?></td>
                                            <td><span class="badge share_value mech_share_value" data-share="<?php echo $member->Work_Right_Mech_Share; ?>"><?php echo $member->Work_Right_Mech_Share; ?>%</span></td>
                                            <td><?php echo $member->Work_Right_Mech_Special != '' ? $member->getSpecialStatus($member->Work_Right_Mech_Special) : ''; ?></td>
                                            <td>
                                                <?php
                                                if ($editable)
                                                    echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', '#role-foundation', array('class' => 'holder-edit', 'data-brshare' => $member->Work_Right_Broad_Share, 'data-brspl' => $member->Work_Right_Broad_Special, 'data-mcshare' => $member->Work_Right_Mech_Share, 'data-mcspl' => $member->Work_Right_Mech_Special)) . "&nbsp;&nbsp;";
                                                ?>
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', 'javascript:void(0)', array('class' => "row-delete")); ?>
                                            </td>
                                            <td class="hide">
                                                <input type="hidden" value="<?php echo $member->Work_Member_GUID ?>" name="WorkRightholder[<?php echo $key ?>][Work_Member_GUID]">
                                                <?php
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Id]", $member->Work_Id);
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Member_GUID]", $member->Work_Member_GUID);
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Member_Internal_Code]", $internal_code);
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Role]", $member->Work_Right_Role, array('class' => 'rightrole', 'data-wrkrole' => $member->Work_Right_Role));
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Broad_Share]", $member->Work_Right_Broad_Share);
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Broad_Special]", $member->Work_Right_Broad_Special);
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Broad_Org_id]", $member->Work_Right_Broad_Org_id);
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Mech_Share]", $member->Work_Right_Mech_Share);
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Mech_Special]", $member->Work_Right_Mech_Special);
                                                echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Mech_Org_Id]", $member->Work_Right_Mech_Org_Id);
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr id='norecord_tr'><td colspan='8'>No data created</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary', 'id' => 'right_ajax_submit', 'disabled' => true)) ?>
                            </div>
                        </div>
                    </div>
                    <div class="overlay loader"></div>
                    <div class="loading-img loader"></div>
                    <?php echo CHtml::endForm(); ?>
                </div>
                <div class="text-left help-block">
                    <span><strong>Note:</strong> Data will be automatically saved after Broadcasting Share & Mechanical Share is 100 % and One main publisher is added and (Publisher and Sub-Publisher) Shares is 50% Minimum</span>
                </div>

            </div>
        </div>
    </div>
</div>


<?php
$search_url = Yii::app()->createAbsoluteUrl("site/work/searchright");
$mainPublisher = $model->getMainPublisherRole();
$subPublisher = $model->getSubPublisherRole();
//$def_auth_role = DEFAULT_WORK_RIGHTHOLDER_AUTHOR_ROLE;
//$def_perf_role = DEFAULT_WORK_RIGHTHOLDER_PERFORMER_ROLE;

$js = <<< EOD
    var rowCount = $('#linked-holders tbody tr').length;
    $(document).ready(function() {
        $('body').on('click','.holder-edit', function(){
            $("#right_insert").val('Edit');
            $(this).closest('tr').trigger('click');
            _brshare = $(this).data('brshare');
            _brspl =  $(this).data('brspl');
            _mcshare =  $(this).data('mcshare');
            _mcspl =  $(this).data('mcspl');

            $('#WorkRightholder_Work_Right_Broad_Share').val(_brshare);
            $('#WorkRightholder_Work_Right_Broad_Special').val(_brspl);
            $('#WorkRightholder_Work_Right_Mech_Share').val(_mcshare);
            $('#WorkRightholder_Work_Right_Mech_Special').val(_mcspl);

            $("#search_result tr").removeClass('highlight');

            _tr = $(this).closest('tr');
            _urole = _tr.data('urole');
            _role = _tr.find('.rightrole').data('wrkrole');

            console.log(_urole);
            console.log(_role);
            console.log($('.user-role-dropdown select.publisher-role').val());
            $('.user-role-dropdown select.publisher-role:not(.hide)').val(2);
            if(_urole == 'AU'){
                _role !== null ? $('.user-role-dropdown select.author-role').val(_role) : '';
            }else if(_urole == 'PU'){
                _role !== null ? $('.user-role-dropdown select.publisher-role').val(_role) : '';
            }
        });

        $('body').on('click','#search_result tr', function(){
            $("#right_insert").val('Add');
        });

        $('body').on('click','#linked-holders tr', function(){
            $("#right_insert").val('Edit');
        });

        $('body').on('click','#search_result tr,#linked-holders tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            _uid = $(this).data('uid');
            _intcode = $(this).data('intcode');
            _urole =  $(this).data('urole');

            $('#WorkRightholder_Work_Member_GUID').val(_uid);
            $('#WorkRightholder_Work_Member_Internal_Code').val(_intcode);
            $('.user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            if(_urole == 'AU'){
                $('.user-role-dropdown select.author-role').removeAttr('disabled').removeClass('hide');
//                $('.user-role-dropdown select.author-role').removeAttr('disabled').removeClass('hide').val('$def_auth_role');
                $('#WorkRightholder_Work_Right_Broad_Share,#WorkRightholder_Work_Right_Mech_Share').removeAttr('readonly');
            }else if(_urole == 'PU'){
                $('.user-role-dropdown select.publisher-role').removeAttr('disabled').removeClass('hide');
//                $('.user-role-dropdown select.publisher-role').removeAttr('disabled').removeClass('hide').val('$def_perf_role');
                $('#WorkRightholder_Work_Right_Broad_Share,#WorkRightholder_Work_Right_Mech_Share').removeAttr('readonly');
            }else if(_urole == 'PE'){
                $('.user-role-dropdown select.performer-role').removeAttr('disabled').removeClass('hide');
                $('.user-role-dropdown select.performer-role option:eq(1)').attr('selected','selected');
                $('#WorkRightholder_Work_Right_Broad_Share,#WorkRightholder_Work_Right_Mech_Share').val(0).attr('readonly','readonly');
            }else if(_urole == 'PR'){
                $('.user-role-dropdown select.producer-role').removeAttr('disabled').removeClass('hide');
                $('.user-role-dropdown select.producer-role option:eq(1)').attr('selected','selected');
                $('#WorkRightholder_Work_Right_Broad_Share,#WorkRightholder_Work_Right_Mech_Share').val(0).attr('readonly','readonly');
            }else{
                $('.user-role-dropdown select.default-role').removeAttr('disabled').removeClass('hide');
            }

            _workrole =  $(this).find('.rightrole').data('wrkrole');
            if(_workrole == $mainPublisher){
                $("#main_pub").val(1);
            }
            if(_workrole == $subPublisher){
                $("#sub_pub").val(1);
            }
        });

        $('body').on('click','.row-delete', function(){
            $(this).closest('tr').remove();
            rowCount++;
            $('.user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('.user-role-dropdown select.default-role').removeAttr('disabled').removeClass('hide');
            checkShare();
            $('#work-rightholder-form')[0].reset();
            $("#right_insert").val('Add');
            $('#WorkRightholder_Work_Member_GUID').val("");
            return false;
        });

        $('#is_auth, #is_publ,#is_perf, #is_prod').on('ifChecked', function(event){
            $("#chkbox_err").addClass("hide");
        });

        $('#search_button').on("click", function(){
            if($("#is_auth").is(':checked') == false && $("#is_publ").is(':checked') == false && $("#is_perf").is(':checked') == false && $("#is_prod").is(':checked') == false){
                $("#chkbox_err").removeClass("hide");
                return false;
            }
            var data=$("#work-rightholder-search-form").serialize();
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:data,
                success:function(data){
                    $('#WorkRightholder_Work_Member_GUID').val('');
                    $("#search_right_result").html(data);
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });

    });
    function InsertRightHolder(form, data, hasError) {
        if (hasError == false) {
        var _prev_broad_share = _prev_mech_share = 0.00;
        $("#linked-holders input[id$='Work_Right_Broad_Share']").each(function(){
            _prev_broad_share = parseFloat(_prev_broad_share) + parseFloat($(this).val());
        });
        $("#linked-holders input[id$='Work_Right_Mech_Share']").each(function(){
            _prev_mech_share = parseFloat(_prev_mech_share) + parseFloat($(this).val());
        });
        _current_broad_share = parseFloat(_prev_broad_share) + parseFloat($("#work-rightholder-form input#WorkRightholder_Work_Right_Broad_Share").val());
        _current_mech_share = parseFloat(_prev_mech_share) + parseFloat($("#work-rightholder-form input#WorkRightholder_Work_Right_Mech_Share").val());

        if(_current_broad_share.toFixed(2) > 100.00){
            alert("Your Broadcasting Shares exceeds 100%. you should reduce existing Linked Rightholders shares");
            return false;
        }
        if(_current_mech_share.toFixed(2) > 100.00){
            alert("Your Mechanical Shares exceeds 100%. you should reduce existing Linked Rightholders shares");
            return false;
        }
            _uid = $(".highlight").data('uid');
            _role = $(".highlight").data('urole');
            _name = $('.highlight').data('name');
            _intcode = $('.highlight').data('intcode');

            selectedRole = $('select[name="WorkRightholder[Work_Right_Role]"]:not(.hide) option:selected').val();
            if($("#main_pub").val() == 0){
                _stopContinue = mainPublishervalidate(selectedRole);
                if(_stopContinue)
                    return false;
            }else{
                if(selectedRole != $mainPublisher){
                    alert("You can't change Main publisher to Sub Publisher");
                    return false;
                }
            }

            $("#right_insert").attr("disabled", true);
            $('.loader').show();
            var form_data = form.serializeArray();
            $('#norecord_tr').remove();


            if(_name === 'undefined'){
                _name = $("#linked-holders").find("[data-uid='" + _uid + "']").data('name');
            }
            chk_tr = $("#linked-holders").find("[data-uid='" + _uid + "']");
            if(chk_tr.length == 1){
                var tr = '';
            }else{
                var tr = '<tr data-uid="'+_uid+'" data-urole="'+_role+'" data-name="'+_name+'" data-intcode="'+_intcode+'">';
            }

            $.each(form_data, function (key, value) {
                if(value['name'] != "base_table_search"){
                    var name = value['name'];
                    name = name.replace("[","[" + rowCount + "][");

                    //set hidden form values
                    if(value['name'] == "WorkRightholder[Work_Right_Role]"){
                        tr += '<td class="hide"><input type="hidden" name="' + name + '" value="' + value['value'] + '" class="rightrole" data-wrkrole = "' + value['value'] + '" /></td>';
                    }else{
                        tr += '<td class="hide"><input type="hidden" name="' + name + '" value="' + value['value'] + '" /></td>';
                    }

                    if(value['name'] != "WorkRightholder[Work_Right_Broad_Org_id]" && value['name'] != "WorkRightholder[Work_Right_Mech_Org_Id]" && value['name'] != "WorkRightholder[Work_Member_GUID]"){
                        tr += '<td>';
                    }
                    var td_content = '';
                    if (value['name'] == "WorkRightholder[Work_Right_Broad_Share]") {
                        td_content = '<span class="badge share_value broad_share_value" data-share="' + value['value'] + '">' + parseFloat(value['value']).toFixed(2) + '%</span>';
                    }else if(value['name'] == "WorkRightholder[Work_Right_Mech_Share]"){
                        td_content = '<span class="badge share_value mech_share_value" data-share="' + value['value'] + '">' + parseFloat(value['value']).toFixed(2) + '%</span>';
                    } else if (value['name'] == "WorkRightholder[Work_Right_Broad_Special]" || value['name'] == "WorkRightholder[Work_Right_Mech_Special]"
                    ) {
                        td_content = $('select[name="' + value['name'] + '"] option:selected').text();
                    }else if(value['name'] == "WorkRightholder[Work_Right_Role]"){
                        td_content = $('select[name="' + value['name'] + '"]:not(.hide) option:selected').text();
                    }else if(value['name'] == "WorkRightholder[Work_Id]"){
                        td_content = chk_tr.length == 1 ? $("#linked-holders").find("[data-uid='" + _uid + "']").data('name') : _name;
                    }else if(value['name'] == "WorkRightholder[Work_Member_Internal_Code]"){
                        td_content = chk_tr.length == 1 ? _intcode : value['value'];
                    }
                    tr += td_content;
                    if(value['name'] != "WorkRightholder[Work_Right_Broad_Org_id]" && value['name'] != "WorkRightholder[Work_Right_Mech_Org_Id]"){
                        tr += '</td>';
                    }
                }
            });
            _mcspl = $("#WorkRightholder_Work_Right_Mech_Special").val();
            _mcshare = $("#WorkRightholder_Work_Right_Mech_Share").val();
            _brspl = $("#WorkRightholder_Work_Right_Broad_Special").val();
            _brshare = $("#WorkRightholder_Work_Right_Broad_Share").val();

            tr += '<td>';
            tr += '<a href="#role-foundation" data-mcspl="'+_mcspl+'" data-mcshare="'+_mcshare+'" data-brspl="'+_brspl+'" data-brshare="'+_brshare+'" class="holder-edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;';
            tr += '<a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>';
            tr += '</td>';

            if(chk_tr.length == 1){
                chk_tr.html(tr);
            }else{
                tr += '</tr>';
                $('#linked-holders tbody').append(tr);
            }
            rowCount++;

            $('#work-rightholder-form')[0].reset();
            $('.loader').hide();
            $("#right_insert").removeAttr("disabled");
            $("#right_insert").val('Add');
            $('.user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('.user-role-dropdown select.default-role').removeAttr('disabled').removeClass('hide');

            $("#search_result tr[data-uid='"+_uid+"']").remove();
            $("#main_pub").val(0);
            $("#sub_pub").val(0);
            checkShare();
        }
        return false;
    }

    function checkShare(){
        _val = 0;
        _broad_share = 0;
        _mech_share = 0;
        $('.show_pub_hint').hide();

        ////// Check Total Share is 100% //////
        $('.broad_share_value').each(function(){
            _broad_share += parseFloat($(this).data('share'));
        });
        $('.mech_share_value').each(function(){
            _mech_share += parseFloat($(this).data('share'));
        });
        $(".total_share").removeClass('hide');
        _broad_share_valid = (_broad_share != 100) ? false : true;
        _equal_color = _broad_share_valid ? '#698801' : '#D9534F';
        $("#equal_total").html(_broad_share.toFixed(2)+' %').css({ 'color': _equal_color});

        if(_broad_share_valid){
            $("#valid_broadcasting_share").addClass("hide").html("");
        }else{
            $("#valid_broadcasting_share").removeClass("hide").html("<b style='color: #D9534F'>Broadcasting share not equal 100%</b>");
        }

        _mech_share_valid = (_mech_share != 100) ? false : true;
        _blank_color = _mech_share_valid ? '#698801' : '#D9534F';
        $("#blank_total").html(_mech_share.toFixed(2)+' %').css({ 'color': _blank_color});

        if(_mech_share_valid){
            $("#valid_mechanical_share").addClass("hide").html("");
        }else{
            $("#valid_mechanical_share").removeClass("hide").html("<b style='color: #D9534F'>Mechanical share not equal 100%</b>");
        }

        _val = _broad_share + _mech_share;
        ////// End //////////////

        ////// Publisher share must be 50% Minimum //////
        _publisher_share = 0;
        _pub = $("#linked-holders tbody").find("[data-urole='PU'] .share_value");
        _pub.each(function() {
            _publisher_share = _publisher_share + parseFloat($(this).data("share"));
        });
        _publisher_share = (_publisher_share/2).toFixed(2);
        _pub_color = _publisher_share < 50 ? '#D9534F' : '#698801';
        $("#pub_total").html(_publisher_share+' %').css({ 'color': _pub_color});
        ////// End //////////////

        var not_cent_percent = _val != '200';

        ////// Checking One publisher is added //////
        _isMainPubAdded = false;
        _isSubPubAdded = false;
        rightrole = $('.rightrole');
        if(rightrole.length > 0){
            rightrole.each(function() {
                if(!_isMainPubAdded && $mainPublisher == $(this).val()){
                    _isMainPubAdded = true;
                }
                if(!_isSubPubAdded && $subPublisher == $(this).val()){
                    _isSubPubAdded = true;
                }
            });
        }
        _is_pub_color = !_isMainPubAdded ? '#D9534F' : '#698801';
        _is_pub_text = !_isMainPubAdded ? 'Not Added' : 'Added';
        $("#is_main_added").html(_is_pub_text).css({ 'color': _is_pub_color});
        ////// End //////////////

        ////// Publisher validate /////
        _publisher_validate = true;
        if(_isMainPubAdded || _isSubPubAdded){
            $('.show_pub_hint').show();
            _publisher_validate = _publisher_share >= 50 && _isMainPubAdded;
        }
        ////// End //////////////

        if(not_cent_percent == false && _publisher_validate){
            $("#right_form").submit();
        }
    }

    function mainPublishervalidate(selectedRole){
        _isMainPubAdded = false;
        _isSubPubAdded = false;

        _MainPubCount = 0;
        rightrole = $('.rightrole');
        if(rightrole.length > 0){
            rightrole.each(function() {
                if(!_isMainPubAdded && $mainPublisher == $(this).val()){
                    _isMainPubAdded = true;
                }
                if(!_isSubPubAdded && $subPublisher == $(this).val()){
                    _isSubPubAdded = true;
                }
            });
        }
        _stopContinue = false;
        $.each($subPublisher, function(sub_id,sub_role) {
            if(selectedRole == sub_id){
                if(_isMainPubAdded == false){
                    alert("Please Add Main Publisher. Then add Sub publisher");
                    _stopContinue = true;
                    return false;
                }
            }
        });

        if(selectedRole == $mainPublisher && _isMainPubAdded){
            alert("Main Publisher already Added. You can't Add more than one Main publisher");
            _stopContinue = true;
        }

        if(selectedRole == $subPublisher && _isSubPubAdded && $('#sub_pub').val() == 0){
            alert("Sub-Publisher already Added. You can't Add more than one Sub-publisher");
            _stopContinue = true;
        }

        return _stopContinue;
    }

EOD;
Yii::app()->clientScript->registerScript('_right_form', $js);
?>


