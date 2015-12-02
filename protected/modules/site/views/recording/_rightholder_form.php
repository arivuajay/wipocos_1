<div class="box box-primary">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'recording-rightholder-search-form',
        'action' => $this->createUrl('/site/recording/update', array('id' => $recording_model->Rcd_Id, 'tab' => '7')),
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

                                $is_perf = $_REQUEST['is_perf'] == 1;
                                $is_prod = $_REQUEST['is_prod'] == 1;
                                if (!$view_performer)
                                    $is_prod = true;
                                if (!$view_producer)
                                    $is_perf = true;

                                if ($view_performer) {
                                    echo CHtml::label('Performer', '', array('class' => 'control-label'));
                                    echo '&nbsp;';
                                    echo CHtml::checkBox('is_perf', $is_perf, array('class' => 'form-control', 'id' => 'is_perf'));
                                    echo '&nbsp;&nbsp;';
                                }
                                if ($view_producer) {
                                    echo CHtml::label('Producer', '', array('class' => 'control-label'));
                                    echo '&nbsp;';
                                    echo CHtml::checkBox('is_prod', $is_prod, array('class' => 'form-control', 'id' => 'is_prod'));
                                    echo '&nbsp;&nbsp;';
                                }
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
                                ?>
                                <div id="chkbox_err" class="errorMessage hide">Select Performer or Producer</div>
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
        'id' => 'recording-rightholder-form',
        'action' => $this->createUrl('/site/recording/update', array('id' => $recording_model->Rcd_Id, 'tab' => '7')),
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:InsertRightHolder'
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Rcd_Id', array('value' => $recording_model->Rcd_Id));
    echo $form->hiddenField($model, 'Rcd_Member_Internal_Code');
    echo $form->hiddenField($model, 'Rcd_Member_GUID');
    $organizations = CHtml::listData(Organization::model()->findAll(), 'Org_Id', 'Org_Abbrevation');
    ?>

    <div id="search_right_result">
    </div>

    <a name="role-foundation">&nbsp;</a>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Rcd_Right_Role', array('class' => 'col-lg-2 control-label')); ?>
                            <div class="col-lg-8 user-role-dropdown">
                                <?php
                                $authRole = CHtml::listData(MasterTypeRights::model()->isActive()->AuthException()->isAuthor()->findAll(), 'Master_Type_Rights_Id', 'rolename');
                                $pubRole = CHtml::listData(MasterTypeRights::model()->isActive()->PubException()->isPublisher()->findAll(), 'Master_Type_Rights_Id', 'rolename');
                                $perfRole = CHtml::listData(MasterTypeRights::model()->isActive()->PerfException()->isPerformer()->findAll(), 'Master_Type_Rights_Id', 'rolename');
                                $proRole = CHtml::listData(MasterTypeRights::model()->isActive()->ProException()->isProducer()->findAll(), 'Master_Type_Rights_Id', 'rolename');
                                echo $form->dropDownList($model, 'Rcd_Right_Role', array(), array('class' => 'form-control default-role'));
                                echo $form->dropDownList($model, 'Rcd_Right_Role', $authRole, array('class' => 'form-control hide author-role', 'disabled' => 'disabled'));
                                echo $form->dropDownList($model, 'Rcd_Right_Role', $pubRole, array('class' => 'form-control hide publisher-role', 'disabled' => 'disabled'));
                                echo $form->dropDownList($model, 'Rcd_Right_Role', $perfRole, array('class' => 'form-control hide performer-role roles_dd', 'disabled' => 'disabled', 'prompt' => ''));
                                echo $form->dropDownList($model, 'Rcd_Right_Role', $proRole, array('class' => 'form-control hide producer-role roles_dd', 'disabled' => 'disabled', 'prompt' => ''));
                                ?>
                                <?php echo $form->error($model, 'Rcd_Right_Role'); ?>
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
                    <h3 class="box-title">Equitable Remuneration Points</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Rcd_Right_Equal_Share', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Rcd_Right_Equal_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Rcd_Right_Equal_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Rcd_Right_Equal_Org_id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Rcd_Right_Equal_Org_id', $organizations, array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                            <?php echo $form->error($model, 'Rcd_Right_Equal_Org_id'); ?>
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
                    <h3 class="box-title">Blank Levy Points</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Rcd_Right_Blank_Share', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Rcd_Right_Blank_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Rcd_Right_Blank_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Rcd_Right_Blank_Org_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Rcd_Right_Blank_Org_Id', $organizations, array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                            <?php echo $form->error($model, 'Rcd_Right_Blank_Org_Id'); ?>
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
                    <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-primary', 'id' => 'right_insert')); ?>
                </div>
                <div class="col-lg-11 help-block">
                    <?php echo $form->error($model, 'Rcd_Member_GUID'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="text-right help-block"><span>Note: Save button will be enabled after atleast one producer & performer added </span></div>
                <div class="form-group foundation">
                    <?php echo CHtml::form(array('/site/recording/insertright'), 'post', array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'right_form')) ?>
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
                                    <th>Equitable Remuneration Points</th>
                                    <th>Blank Levy Points</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($recording_model->recordingRightholders) {
                                    foreach ($recording_model->recordingRightholders as $key => $member) {
                                        if ($member->recordingPerformer) {
                                            $name = $member->recordingPerformer->fullname;
                                            $url = array('/site/performeraccount/view', 'id' => $member->recordingPerformer->Perf_Acc_Id);
                                            $role = 'PE';
                                            $internal_code = $member->recordingPerformer->Perf_Internal_Code;
                                        } elseif ($member->recordingProducer) {
                                            $name = $member->recordingProducer->Pro_Corporate_Name;
                                            $url = array('/site/produceraccount/view', 'id' => $member->recordingProducer->Pro_Acc_Id);
                                            $role = 'PR';
                                            $internal_code = $member->recordingProducer->Pro_Internal_Code;
                                        } elseif ($member->recordingAuthor) {
                                            $name = $member->recordingAuthor->fullname;
                                            $url = array('/site/authoraccount/view', 'id' => $member->recordingAuthor->Auth_Acc_Id);
                                            $role = MasterTypeRights::OCCUPATION_AUTHOR;
                                            $internal_code = $member->recordingAuthor->Auth_Internal_Code;
                                        } elseif ($member->recordingPublisher) {
                                            $name = $member->recordingPublisher->Pub_Corporate_Name;
                                            $url = array('/site/publisheraccount/view', 'id' => $member->recordingPublisher->Pub_Acc_Id);
                                            $role = MasterTypeRights::OCCUPATION_PUBLISHER;
                                            $internal_code = $member->recordingPublisher->Pub_Internal_Code;
                                        }
                                        ?>
                                        <tr data-urole="<?php echo $role; ?>" data-uid="<?php echo $member->Rcd_Member_GUID ?>" data-name="<?php echo $name ?>" data-intcode = "<?php echo $internal_code ?>">
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $internal_code; ?></td>
                                            <td><?php echo $member->rcdRightRole->Type_Rights_Name; ?></td>
                                            <td><?php echo $member->Rcd_Right_Equal_Share; ?></td>
                                            <td><?php echo $member->Rcd_Right_Blank_Share; ?></td>
                                            <td>
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', '#role-foundation', array('class' => 'holder-edit', 'data-brshare' => $member->Rcd_Right_Equal_Share, 'data-mcshare' => $member->Rcd_Right_Blank_Share)); ?>&nbsp;&nbsp;
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', 'javascript:void(0)', array('class' => "row-delete")); ?>
                                            </td>
                                            <td class="hide">
                                                <input type="hidden" value="<?php echo $member->Rcd_Member_GUID ?>" name="RecordingRightholder[<?php echo $key ?>][Rcd_Member_GUID]">
                                                <?php
                                                echo CHtml::hiddenField("RecordingRightholder[{$key}][Rcd_Id]", $member->Rcd_Id);
                                                echo CHtml::hiddenField("RecordingRightholder[{$key}][Rcd_Member_GUID]", $member->Rcd_Member_GUID);
                                                echo CHtml::hiddenField("RecordingRightholder[{$key}][Rcd_Member_Internal_Code]", $internal_code);
                                                echo CHtml::hiddenField("RecordingRightholder[{$key}][Rcd_Right_Role]", $member->Rcd_Right_Role, array('data-rcd' => $member->Rcd_Right_Role, 'class' => 'rcd'));
                                                echo CHtml::hiddenField("RecordingRightholder[{$key}][Rcd_Right_Equal_Share]", $member->Rcd_Right_Equal_Share);
                                                echo CHtml::hiddenField("RecordingRightholder[{$key}][Rcd_Right_Equal_Org_id]", $member->Rcd_Right_Equal_Org_id);
                                                echo CHtml::hiddenField("RecordingRightholder[{$key}][Rcd_Right_Blank_Share]", $member->Rcd_Right_Blank_Share);
                                                echo CHtml::hiddenField("RecordingRightholder[{$key}][Rcd_Right_Blank_Org_Id]", $member->Rcd_Right_Blank_Org_Id);
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
            </div>
        </div>
    </div>
</div>


<?php
$search_url = Yii::app()->createAbsoluteUrl("site/recording/searchright");
$get_roles_point_url = Yii::app()->createAbsoluteUrl("site/sharedefinitionperrole/getpoint");

$js = <<< EOD
    var rowCount = $('#linked-holders tbody tr').length;
    $(document).ready(function() {
        checkShare();
        $('body').on('click','.holder-edit', function(){
            $("#right_insert").val('Edit');
            $(this).closest('tr').trigger('click');
            _brshare = $(this).data('brshare');
            _mcshare =  $(this).data('mcshare');

            $('#RecordingRightholder_Rcd_Right_Equal_Share').val(_brshare);
            $('#RecordingRightholder_Rcd_Right_Blank_Share').val(_mcshare);

            $("#search_result tr").removeClass('highlight');

            _tr = $(this).closest('tr');
            _urole = _tr.data('urole');
            _role = _tr.find('.rcd').data('rcd');
            if(_urole == 'PE'){
                _role !== null ? $('.user-role-dropdown select.performer-role').val(_role) : '';
            }else if(_urole == 'PR'){
                _role !== null ? $('.user-role-dropdown select.producer-role').val(_role) : '';
            }
        });

        $('body').on('click','#search_result tr,#linked-holders tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            _uid = $(this).data('uid');
            _urole =  $(this).data('urole');
            _intcode =  $(this).data('intcode');

            $('#RecordingRightholder_Rcd_Member_GUID').val(_uid);
            $('#RecordingRightholder_Rcd_Member_Internal_Code').val(_intcode);

            $('.user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            if(_urole == 'PE'){
                $('.user-role-dropdown select.performer-role').removeAttr('disabled').removeClass('hide');
                $('#RecordingRightholder_Rcd_Right_Equal_Share,#RecordingRightholder_Rcd_Right_Blank_Share').removeAttr('readonly');
            }else if(_urole == 'PR'){
                $('.user-role-dropdown select.producer-role').removeAttr('disabled').removeClass('hide');
                $('#RecordingRightholder_Rcd_Right_Equal_Share,#RecordingRightholder_Rcd_Right_Blank_Share').removeAttr('readonly');
            }else if(_urole == 'AU'){
                $('.user-role-dropdown select.author-role').removeAttr('disabled').removeClass('hide');
                $('#RecordingRightholder_Rcd_Right_Equal_Share,#RecordingRightholder_Rcd_Right_Blank_Share').val(0).attr('readonly','readonly');
            }else if(_urole == 'PU'){
                $('.user-role-dropdown select.publisher-role').removeAttr('disabled').removeClass('hide');
                $('#RecordingRightholder_Rcd_Right_Equal_Share,#RecordingRightholder_Rcd_Right_Blank_Share').val(0).attr('readonly','readonly');
            }else{
                $('.user-role-dropdown select.default-role').removeAttr('disabled').removeClass('hide');
            }
        });

        $('body').on('click','.row-delete', function(){
            $(this).closest('tr').remove();
            rowCount++;
            checkShare();
            $('#recording-rightholder-form')[0].reset();
            $("#right_insert").val('Add');
            $('#RecordingRightholder_Rcd_Member_GUID').val("");
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
            var data=$("#recording-rightholder-search-form").serialize();
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:data,
                success:function(data){
                    $('#RecordingRightholder_Rcd_Member_GUID').val('');
                    $("#search_right_result").html(data);
                    $('.user-role-dropdown select.performer-role').val('');
                    $('.user-role-dropdown select.producer-role').val('');
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });

        $(".roles_dd").on("change", function(){
            getPoint($(this).val());
        });

    });
    function InsertRightHolder(form, data, hasError) {
        if (hasError == false) {
            $("#right_insert").attr("disabled", true);
            $('.loader').show();
            var form_data = form.serializeArray();
            $('#norecord_tr').remove();

            _uid = $(".highlight").data('uid');
            _intcode = $(".highlight").data('intcode');
            _role = $(".highlight").data('urole');
            _name = $('.highlight').data('name');

            if(_name === 'undefined'){
                _name = $("#linked-holders").find("[data-uid='" + _uid + "']").data('name');
            }
            chk_tr = $("#linked-holders").find("[data-uid='" + _uid + "']");
            if(chk_tr.length == 1){
                var tr = '';
            }else{
                var tr = '<tr data-uid="'+_uid+'" data-urole="'+_role+'" data-urole-id="'+_role+'" data-name="'+_name+'" >';
            }

            $.each(form_data, function (key, value) {
                if(value['name'] != "base_table_search"){
                    var name = value['name'];
                    name = name.replace("[","[" + rowCount + "][");
                    //set hidden form values

                    if(value['name'] == "RecordingRightholder[Rcd_Right_Role]"){
                        tr += '<td class="hide"><input class="rcd" data-rcd = "' + value['value'] + '" type="hidden" name="' + name + '" value="' + value['value'] + '"/></td>';
                    }else{
                        tr += '<td class="hide"><input type="hidden" name="' + name + '" value="' + value['value'] + '"/></td>';
                    }

                    if(value['name'] != "RecordingRightholder[Rcd_Right_Equal_Org_id]" && value['name'] != "RecordingRightholder[Rcd_Right_Blank_Org_Id]" && value['name'] != "RecordingRightholder[Rcd_Member_GUID]"){
                        tr += '<td>';
                    }
                    var td_content = '';
                    if (value['name'] == "RecordingRightholder[Rcd_Right_Equal_Share]" || value['name'] == "RecordingRightholder[Rcd_Right_Blank_Share]") {
                        td_content = parseFloat(value['value']).toFixed(2);
                    }else if(value['name'] == "RecordingRightholder[Rcd_Right_Role]"){
                        td_content = $('select[name="' + value['name'] + '"]:not(.hide) option:selected').text();
                    }else if(value['name'] == "RecordingRightholder[Rcd_Id]"){
                        td_content = chk_tr.length == 1 ? $("#linked-holders").find("[data-uid='" + _uid + "']").data('name') : _name;
                    }else if(value['name'] == "RecordingRightholder[Rcd_Member_Internal_Code]"){
                        td_content = chk_tr.length == 1 ? _intcode : value['value'];
                    }
                    tr += td_content;
                    if(value['name'] != "RecordingRightholder[Rcd_Right_Equal_Org_id]" && value['name'] != "RecordingRightholder[Rcd_Right_Blank_Org_Id]"){
                        tr += '</td>';
                    }
                }
            });
            _mcshare = $("#RecordingRightholder_Rcd_Right_Blank_Share").val();
            _brshare = $("#RecordingRightholder_Rcd_Right_Equal_Share").val();

            tr += '<td>';
            tr += '<a href="#role-foundation" data-mcshare="'+_mcshare+'" data-brshare="'+_brshare+'" class="holder-edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;';
            tr += '<a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>';
            tr += '</td>';

            if(chk_tr.length == 1){
                chk_tr.html(tr);
            }else{
                tr += '</tr>';
                $('#linked-holders tbody').append(tr);
            }
            rowCount++;

            $('#recording-rightholder-form')[0].reset();
            $('.loader').hide();
            $("#right_insert").removeAttr("disabled");
            $("#right_insert").val('Add');
            $('.user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('.user-role-dropdown select.default-role').removeAttr('disabled').removeClass('hide');
            checkShare();
        }
        return false;
    }

    function checkShare(){
        _tr = $("#linked-holders tbody tr");
        var perf_inst = prod_inst = 0;
        _tr.each(function(){
            if($(this).data('urole') == 'PE'){
                perf_inst = 1;
            }else if($(this).data('urole') == 'PR'){
                prod_inst = 1;
            }
        });
        $("#right_ajax_submit").attr("disabled", !(perf_inst == 1 && prod_inst == 1));
    }

    function getPoint(_id){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '$get_roles_point_url',
            data:{id: _id},
            success:function(data){
                $("#RecordingRightholder_Rcd_Right_Equal_Share").val(data.equ_remn);
                $("#RecordingRightholder_Rcd_Right_Blank_Share").val(data.blk_tp);
           },
            error: function(data) {
                alert("Something went wrong. Try again");
            },
        });
    }

EOD;
Yii::app()->clientScript->registerScript('_right_form', $js);
?>