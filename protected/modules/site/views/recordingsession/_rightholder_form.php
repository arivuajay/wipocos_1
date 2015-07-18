<div class="box box-primary" id="rght_2">
    <?php
    $sound_car_id = $record_ses_model->Rcd_Ses_Id;
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'record-rightholder-search-form-rec-2',
        'action' => $this->createUrl('/site/recordingsession/update', array('id' => $record_ses_model->Rcd_Ses_Id, 'tab' => '7')),
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
                            <div class="form-group hide">
                                <?php echo CHtml::label('Record', '', array('class' => 'control-label')); ?>&nbsp;
                                <?php echo CHtml::checkBox('is_record', (/*$_REQUEST['is_record'] == 1*/true), array('class' => 'form-control', 'id' => 'is_record')); ?>&nbsp;&nbsp;
                                <div id="chkbox_err_rec" class="errorMessage hide">Select Record</div>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::label('Search', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('searach_text', $_REQUEST['fn'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::button('Search', array('class' => 'btn btn-success', 'name' => 'rght_holder', 'id' => 'search_button_rec')); ?>
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
        'id' => 'record-rightholder-search-form-rec',
        'action' => $this->createUrl('/site/recordingsession/update', array('id' => $record_ses_model->Rcd_Ses_Id, 'tab' => '7')),
        'method' => 'get',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'onsubmit' => "return false;"),
    ));
    ?>
    <div id="search_right_result_rec">
        <?php // $this->renderPartial('_search_right', compact('authusers', 'publusers')); ?>
    </div>
    <?php $this->endWidget(); ?>

    <div class="row hide" id="link-performer-rec-div">

    </div>
    
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'session-rightholder-form-2',
        'action' => $this->createUrl('/site/recordingsession/update', array('id' => $record_ses_model->Rcd_Ses_Id, 'tab' => '8')),
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:InsertRightHolder2'
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Rcd_Ses_Id', array('value' => $record_ses_model->Rcd_Ses_Id));
    echo $form->hiddenField($model, 'Rcd_Ses_Right_Member_Internal_Code');
    echo $form->hiddenField($model, 'Rcd_Ses_Right_Member_GUID');
    echo $form->hiddenField($model, 'Rcd_Ses_Right_Work_GUID');
    echo $form->hiddenField($model, 'Rcd_Ses_Right_Work_Type', array('value' => 'R'));
    $organizations = CHtml::listData(Organization::model()->findAll(), 'Org_Id', 'Org_Abbrevation');
    ?>
    
    <a name="role-foundation">&nbsp;</a>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Rcd_Ses_Right_Role', array('class' => 'col-lg-2 control-label')); ?>
                            <div class="col-lg-8 user-role-dropdown">
                                <?php
                                $perfRole = CHtml::listData(MasterTypeRights::model()->isActive()->PerfException()->isPerformer()->findAll(), 'Master_Type_Rights_Id', 'rolename');
                                echo $form->dropDownList($model, 'Rcd_Ses_Right_Role', array(), array('class' => 'form-control default-role'));
                                echo $form->dropDownList($model, 'Rcd_Ses_Right_Role', $perfRole, array('class' => 'form-control hide performer-role roles_dd', 'disabled' => 'disabled', 'prompt' => ''));
                                ?>
                                <?php echo $form->error($model, 'Rcd_Ses_Right_Role'); ?>
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
                    <h3 class="box-title">Equal Remuneration Points</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Rcd_Ses_Right_Equal_Share', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Rcd_Ses_Right_Equal_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Rcd_Ses_Right_Equal_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Rcd_Ses_Right_Equal_Org_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Rcd_Ses_Right_Equal_Org_Id', $organizations, array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                            <?php echo $form->error($model, 'Rcd_Ses_Right_Equal_Org_Id'); ?>
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
                            <?php echo $form->labelEx($model, 'Rcd_Ses_Right_Blank_Share', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Rcd_Ses_Right_Blank_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Rcd_Ses_Right_Blank_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Rcd_Ses_Right_Blank_Org_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Rcd_Ses_Right_Blank_Org_Id', $organizations, array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                            <?php echo $form->error($model, 'Rcd_Ses_Right_Blank_Org_Id'); ?>
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
                    <?php echo $form->error($model, 'Rcd_Ses_Right_Member_GUID'); ?>
                    <?php echo $form->error($model, 'Rcd_Ses_Right_Work_GUID'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <?php echo CHtml::form(array('/site/recordingsession/insertright'), 'post', array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'right_form')) ?>
                    <div class="box-header">
                        <h3 class="box-title">Linked Rightholders</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered" id="linked-holders-rec">
                            <thead>
                            <th>Rightholder Name</th>
                            <th>Internal Code</th>
                            <th>Recording</th>
                            <th>Role</th>
                            <th>Equal Remuneration Points</th>
                            <th>Blank Levy Points</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if (!empty($exists_model)) {
                                    foreach ($exists_model as $key => $member) {
                                        ?>
                                        <tr data-uid="<?php echo $member->rightholderPerformer->Perf_GUID ?>" data-name="<?php echo $member->rightholderPerformer->fullname ?>" data-intcode="<?php echo $member->rightholderPerformer->Perf_Internal_Code ?>" data-work-uid="<?php echo $member->rightholderRecord->Rcd_GUID ?>" data-work-name="<?php echo $member->rightholderRecord->Rcd_Title ?>">
                                            <td><?php echo $member->rightholderPerformer->fullname; ?></td>
                                            <td><?php echo $member->rightholderPerformer->Perf_Internal_Code; ?></td>
                                            <td><?php echo $member->rightholderRecord->Rcd_Title; ?></td>
                                            <td><?php echo $member->rcdSesRightRole->rolename; ?></td>
                                            <td><?php echo $member->Rcd_Ses_Right_Equal_Share; ?></td>
                                            <td><?php echo $member->Rcd_Ses_Right_Blank_Share; ?></td>
                                            <td>
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', '#role-foundation', array('class' => "holder-edit", 'data-mcshare' => $member->Rcd_Ses_Right_Equal_Share, 'data-brshare' => $member->Rcd_Ses_Right_Blank_Share)); ?>&nbsp;&nbsp;
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', 'javascript:void(0)', array('class' => "row-delete")); ?>
                                            </td>
                                            <td class="hide">
                                                <?php
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Id]", $member->Rcd_Ses_Id);
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Right_Member_GUID]", $member->Rcd_Ses_Right_Member_GUID);
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Right_Work_GUID]", $member->Rcd_Ses_Right_Work_GUID);
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Member_Internal_Code]", $member->rightholderPerformer->Perf_Internal_Code);
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Right_Role]", $member->Rcd_Ses_Right_Role, array('data-rcd' => $member->Rcd_Ses_Right_Role, 'class' => 'rcd'));
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Right_Equal_Share]", $member->Rcd_Ses_Right_Equal_Share);
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Right_Equal_Org_Id]", $member->Rcd_Ses_Right_Equal_Org_Id);
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Right_Blank_Share]", $member->Rcd_Ses_Right_Blank_Share);
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Right_Blank_Org_Id]", $member->Rcd_Ses_Right_Blank_Org_Id);
                                                echo CHtml::hiddenField("RecordingSessionRightholder[{$key}][Rcd_Ses_Right_Work_Type]", $member->Rcd_Ses_Right_Work_Type);
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                } else {
                                    echo "<tr id='norecord_tr_rec'><td colspan='8'>No data created</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary', 'id' => 'right_ajax_submit_rec', 'disabled' => true)) ?>
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
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'rightperformerModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Performer</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="rightperformertable_base_table_search" class="control-label required">Search</label>
        <div>
            <input type="text" id="rightperformertable_base_table_search" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div style="max-height: 300px; overflow-y: scroll">
            <table class="table table-bordered selectable" id="rightperformertable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Internal Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = PerformerAccount::model()->findAll();
                    foreach ($users as $key => $user) {
                        ?>
                        <tr data-uid="<?php echo $user->Perf_GUID ?>" data-name="<?php echo $user->fullname ?>" data-intcode = "<?php echo $user->Perf_Internal_Code ?>">
                            <td><?php echo $user->fullname; ?></td>
                            <td><?php echo $user->Perf_Internal_Code; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>

<div class="modal-footer">
    <p class="errorMessage text-center col-sm-8" id="pro-modelerror"></p>
    <?php
    $this->widget(
            'booster.widgets.TbButton', array(
        'context' => 'primary',
        'label' => 'Set Performer',
        'url' => '#',
        'htmlOptions' => array(
            'id' => 'new_performer_add',
            'onclick' => '{    
                    _row = $("#rightperformertable").find(".highlight");
                    if(_row.length == 0){
                        $("#pro-modelerror").html("Select Alteast one Performer");
                    }else{
                        $("#temp_click_new_performer").trigger("click");
                    }
                }'
        ),
            )
    );
    ?>
    <?php
    $this->widget(
            'booster.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'performer-dismiss'),
            )
    );
    ?>
    <a id="temp_click_new_performer" class="hide">Click me !!!!!</a>
</div>

<?php $this->endWidget(); ?>


<?php
$search_url = Yii::app()->createAbsoluteUrl("site/soundcarrier/searchrecords");
$search_performer_url = Yii::app()->createAbsoluteUrl("site/soundcarrier/searchrecordperformers");
$get_roles_point_url = Yii::app()->createAbsoluteUrl("site/sharedefinitionperrole/getpoint");

$js = <<< EOD
    var rowCount2 = $('#linked-holders-rec tbody tr').length;
    $(document).ready(function() {
        key2 = $i;
        $('#search_button_rec').on("click", function(){
            if($("#is_record").is(':checked') == false && $("#is_publ").is(':checked') == false){
                $("#chkbox_err_rec").removeClass("hide");
                return false;
            }
            var data=$("#record-rightholder-search-form-rec-2").serialize();
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:data,
                success:function(data){
                    $("#search_right_result_rec").html(data);
                    $('#rght_2 .user-role-dropdown select.performer-role').val('');
                    $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Member_GUID').val('');
                    $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Work_GUID').val('');
                    $("#record_search tr, #link-performer-rec tr").removeClass('highlight');
                    $("#link-performer-rec-div").addClass('hide');
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });
        
        $('body').on('click','#record_search tr, #link-performer-rec tr, #rightperformertable tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            $('#rght_2 .user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('#rght_2 .user-role-dropdown select.performer-role').removeAttr('disabled').removeClass('hide');
        });
        $('body').on('click','#record_search tbody tr', function(){
            $("#link-performer-rec-div").removeClass('hide');
            $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Work_GUID').val($(this).data('uid'));
            $.ajax({
                type: 'GET',
                url: '$search_performer_url',
                data:{rcd_guid: $(this).data('uid')},
                success:function(data){
                    $("#link-performer-rec-div").html(data);
                    $("#rightperformertable tbody tr").removeClass('hide highlight');
                    $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Member_GUID').val('');
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });
        $('body').on('click','#link-performer-rec tr', function(){
            $("#add-performer-rec").attr('disabled', false);
            $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Member_GUID').val($(this).data('uid'));
            $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Member_Internal_Code').val($(this).data('intcode'));
        });
        
        $('body').on('click','#temp_click_new_performer', function(){
            _table = $('#rightperformertable tbody').find('.highlight');
            _uid = _table.data('uid');
            _intcode = _table.data('intcode');
            _name = _table.data('name');
            var tr = '<tr data-intcode="'+_intcode+'" data-name="'+_name+'" data-uid="'+_uid+'">';
            tr += '<td>'+_name+'</td>';
            tr += '<td>'+_intcode+'</td>';
            tr += '</tr>';
            chk_tr = $("#rightperformertable tbody").find("[data-uid='" + _uid + "']");
            if(chk_tr.length > 0){
                chk_tr.addClass('hide');
            }
            _insert_table = $('#link-performer-rec tbody');
            _insert_table.append(tr);
            _insert_table.find('tr:last').trigger('click');
            $('#performer-dismiss').trigger('click');
        });
        
        $('body').on('click','#linked-holders-rec .row-delete', function(){
            _tr = $(this).closest('tr');
            $('#link-performer-rec tr[data-intcode="'+_tr.data('intcode')+'"]').removeClass('hide');
            _tr.remove();
            checkShare2();
        });
        
        $("#rght_2 .roles_dd").on("change", function(){
            getPoint($(this).val(), 2);
        });
        
        $('body').on('click','#rght_2 .holder-edit', function(){
            $("#rght_2 #right_insert").val('Edit');
            $(this).closest('tr').trigger('click');
            _brshare = $(this).data('brshare');
            _mcshare =  $(this).data('mcshare');

            $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Equal_Share').val(_brshare);
            $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Blank_Share').val(_mcshare);
            console.log($('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Equal_Share'));
        
            $("#record_search tr, #link-performer-rec tr").removeClass('highlight');
        
            _tr = $(this).closest('tr');
            _role = _tr.find('.rcd').data('rcd');
            _role !== null ? $('#rght_2 .user-role-dropdown select.performer-role').val(_role) : '';
        });
        
        $('body').on('click','#linked-holders-rec tr', function(){
            _work_uid =  $(this).data('work-uid');
            $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Work_GUID').val(_work_uid);
        });
        
        $('body').on('click','#linked-holders-rec tr, #link-performer-rec tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            _uid = $(this).data('uid');
            _intcode =  $(this).data('intcode');
            $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Member_GUID').val(_uid);
            $('#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Member_Internal_Code').val(_intcode);
            $('#rght_2 .user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('#rght_2 .user-role-dropdown select.performer-role').removeAttr('disabled').removeClass('hide');
        });
    });
        
    function checkShare2(){
        _count = $("#linked-holders-rec tbody tr").length;
        $("#right_ajax_submit_rec").attr("disabled", _count == 0);
    }
        
    if($('#rightperformertable').length > 0){
        var probaseTable;
        probaseTable = $("#rightperformertable").dataTable({
            sDom: '<"search-box"r>ltip',
            "bPaginate": false,
            "bLengthChange": false,
            "bSort": true,
            "bInfo": false,
            "iDisplayLength": 100
        });

        $('#rightperformertable_base_table_search').keyup(function(){
             probaseTable.fnFilter( $(this).val() );
        });
    }
        
    function InsertRightHolder2(form, data, hasError) {
        if (hasError == false) {
            $("#rght_2 #right_insert").attr("disabled", true);
            $('.loader').show();
            var form_data = form.serializeArray();
            $('#rght_2 #norecord_tr_rec').remove();
        
            _performer = $("#rght_2 #link-performer-rec tbody").find('.highlight');
            if(_performer.length == 0){
                _performer = $("#rght_2 #linked-holders-rec tbody").find('.highlight');
            }
            _uid = _performer.data('uid');
            _intcode = _performer.data('intcode');
            _name = _performer.data('name');
        
        
            _work = $("#rght_2 #record_search tbody").find('.highlight');
            if(_work.length == 0){
                _work = $("#rght_2 #linked-holders-rec tbody").find('.highlight');
            }
            _work_uid = _work.data('work-uid');
            _work_name = _work.data('work-name');

            if(_name === 'undefined'){
                _name = $("#rght_2 #linked-holders-rec").find("[data-uid='" + _uid + "'][data-work-uid='" + _work_uid + "']").data('name');
            }
            if(_work_name === 'undefined'){
                _work_name = $("#rght_2 #linked-holders-rec").find("[data-uid='" + _uid + "'][data-work-uid='" + _work_uid + "']").data('work-name');
            }
            chk_tr = $("#rght_2 #linked-holders-rec").find("[data-uid='" + _uid + "'][data-work-uid='" + _work_uid + "']");
            if(chk_tr.length > 0){
                var tr = '';
            }else{
                var tr = '<tr data-uid="'+_uid+'" data-name="'+_name+'" data-intcode="'+_intcode+'" data-work-uid="'+_work_uid+'" data-work-name="'+_work_name+'" >';
            }
            
            $.each(form_data, function (key, value) {
                if(value['name'] != "base_table_search"){
                    var name = value['name'];
                    name = name.replace("[","[" + rowCount2 + "][");
                    //set hidden form values
                    
                    if(value['name'] == "RecordingSessionRightholder[Rcd_Ses_Right_Role]"){
                        tr += '<td class="hide"><input class="rcd" data-rcd = "' + value['value'] + '" type="hidden" name="' + name + '" value="' + value['value'] + '"/></td>';
                    }else{
                        tr += '<td class="hide"><input type="hidden" name="' + name + '" value="' + value['value'] + '"/></td>';
                    }

                    if(value['name'] != "RecordingSessionRightholder[Rcd_Ses_Right_Equal_Org_Id]" && value['name'] != "RecordingSessionRightholder[Rcd_Ses_Right_Blank_Org_Id]" && value['name'] != "RecordingSessionRightholder[Rcd_Ses_Right_Member_GUID]" && value['name'] != "RecordingSessionRightholder[Rcd_Ses_Right_Work_Type]"){
                        tr += '<td>';
                    }
                    var td_content = '';
                    if (value['name'] == "RecordingSessionRightholder[Rcd_Ses_Right_Equal_Share]" || value['name'] == "RecordingSessionRightholder[Rcd_Ses_Right_Blank_Share]") {
                        td_content = parseFloat(value['value']).toFixed(2);
                    }else if(value['name'] == "RecordingSessionRightholder[Rcd_Ses_Right_Role]"){
                        td_content = $('select[name="' + value['name'] + '"] option:selected').filter(':visible:first').text();
                    }else if(value['name'] == "RecordingSessionRightholder[Rcd_Ses_Id]"){
                        td_content = chk_tr.length == 1 ? chk_tr.data('name') : _name;
                    }else if(value['name'] == "RecordingSessionRightholder[Rcd_Ses_Right_Member_Internal_Code]"){
                        td_content = chk_tr.length == 1 ? _intcode : value['value'];
                    }else if(value['name'] == "RecordingSessionRightholder[Rcd_Ses_Right_Work_GUID]"){
                        td_content = chk_tr.length == 1 ? chk_tr.data('work-name') : _work_name;
                    }
                    tr += td_content;
                    if(value['name'] != "RecordingSessionRightholder[Rcd_Ses_Right_Equal_Org_id]" && value['name'] != "RecordingSessionRightholder[Rcd_Ses_Right_Blank_Org_Id]" && value['name'] != "RecordingSessionRightholder[Rcd_Ses_Right_Member_GUID]" && value['name'] != "RecordingSessionRightholder[Rcd_Ses_Right_Work_Type]"){
                        tr += '</td>';
                    }
                }
            });
            _mcshare = $("#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Blank_Share").val();
            _brshare = $("#rght_2 #RecordingSessionRightholder_Rcd_Ses_Right_Equal_Share").val();
        
            tr += '<td>';
            tr += '<a href="#role-foundation" data-mcshare="'+_mcshare+'" data-brshare="'+_brshare+'" class="holder-edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;';
            tr += '<a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>';
            tr += '</td>';
        
            if(chk_tr.length > 0){
                chk_tr.html(tr);
            }else{
                tr += '</tr>';
                $('#rght_2 #linked-holders-rec tbody').append(tr);
            }
            rowCount2++;
        
            $('#session-rightholder-form-2')[0].reset();
            $('#rght_2 .loader').hide();
            $("#rght_2 #right_insert").removeAttr("disabled");
            $("#rght_2 #right_insert").val('Add');
            $('#rght_2 .user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('#rght_2 .user-role-dropdown select.default-role').removeAttr('disabled').removeClass('hide');
            checkShare2();
        }
        return false;
    }
        
    function getPoint(_id, _form_id){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '$get_roles_point_url',
            data:{id: _id},
            success:function(data){
                $("#rght_"+_form_id+" #RecordingSessionRightholder_Rcd_Ses_Right_Equal_Share").val(data.equ_remn);
                $("#rght_"+_form_id+" #RecordingSessionRightholder_Rcd_Ses_Right_Blank_Share").val(data.blk_tp);
           },
            error: function(data) {
                alert("Something went wrong. Try again");
            },
        });
    }
        
EOD;
Yii::app()->clientScript->registerScript('_right_form_2', $js);
?>