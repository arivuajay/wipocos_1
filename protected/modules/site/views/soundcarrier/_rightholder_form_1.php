<div class="box box-primary" id="rght_1">
    <?php
    $sound_car_id = $sound_car_model->Sound_Car_Id;
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-rightholder-search-form',
        'action' => $this->createUrl('/site/soundcarrier/update', array('id' => $sound_car_model->Sound_Car_Id, 'tab' => '7')),
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
                                <?php echo CHtml::label('Work', '', array('class' => 'control-label')); ?>&nbsp;
                                <?php echo CHtml::checkBox('is_work', ($_REQUEST['is_work'] == 1), array('class' => 'form-control', 'id' => 'is_work')); ?>&nbsp;&nbsp;
                                <div id="chkbox_err" class="errorMessage hide">Select Work</div>
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
        'id' => 'work-rightholder-search-form',
        'action' => $this->createUrl('/site/soundcarrier/update', array('id' => $sound_car_model->Sound_Car_Id, 'tab' => '7')),
        'method' => 'get',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'onsubmit' => "return false;"),
    ));
    ?>
    <div id="search_right_result">
    </div>
    <?php $this->endWidget(); ?>

    <div class="row hide" id="link-performer-div">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <div class="box-header">
                        <h3 class="box-title">Performers</h3>
                    </div>
                    <?php
                    $members = PerformerAccount::model()->findAll();
                    ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="base_table_search" class="control-label required">Search</label>
                            <div>
                                <input type="text" id="base_table_search" class="form-control" style="width: 50%">
                            </div>
                        </div>
                    </div>

                    <div class="box-body" style="max-height: 300px; overflow-y: scroll">
                        <div class="form-group">
                            <table class="table table-striped table-bordered table-datatable selectable" id="link-performer">
                                <thead>
                                    <th>Rightholder Name</th>
                                    <th>Internal Code</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($members)) {
                                        foreach ($members as $key => $member) {
                                            ?>
                                            <tr data-uid="<?php echo $member->Perf_GUID ?>" data-name="<?php echo $member->fullname ?>" data-intcode = "<?php echo $member->Perf_Internal_Code ?>">
                                                <td><?php echo $member->fullname; ?></td>
                                                <td><?php echo $member->Perf_Internal_Code; ?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sound-carrier-rightholder-form-1',
        'action' => $this->createUrl('/site/soundcarrier/update', array('id' => $sound_car_model->Sound_Car_Id, 'tab' => '7')),
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:InsertRightHolder'
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Sound_Car_Id', array('value' => $sound_car_model->Sound_Car_Id));
    echo $form->hiddenField($model, 'Sound_Car_Right_Member_Internal_Code');
    echo $form->hiddenField($model, 'Sound_Car_Right_Member_GUID');
    echo $form->hiddenField($model, 'Sound_Car_Right_Work_GUID');
    echo $form->hiddenField($model, 'Sound_Car_Right_Work_Type', array('value' => 'W'));
    $organizations = CHtml::listData(Organization::model()->findAll(), 'Org_Id', 'Org_Abbrevation');
    ?>
    
    <a name="role-foundation">&nbsp;</a>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Sound_Car_Right_Role', array('class' => 'col-lg-2 control-label')); ?>
                            <div class="col-lg-8 user-role-dropdown">
                                <?php
                                $perfRole = CHtml::listData(MasterTypeRights::model()->isActive()->PerfException()->isPerformer()->findAll(), 'Master_Type_Rights_Id', 'rolename');
                                echo $form->dropDownList($model, 'Sound_Car_Right_Role', array(), array('class' => 'form-control default-role'));
                                echo $form->dropDownList($model, 'Sound_Car_Right_Role', $perfRole, array('class' => 'form-control hide performer-role roles_dd', 'disabled' => 'disabled', 'prompt' => ''));
                                ?>
                                <?php echo $form->error($model, 'Sound_Car_Right_Role'); ?>
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
                            <?php echo $form->labelEx($model, 'Sound_Car_Right_Equal_Share', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Sound_Car_Right_Equal_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Sound_Car_Right_Equal_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Sound_Car_Right_Equal_Org_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Sound_Car_Right_Equal_Org_Id', $organizations, array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                            <?php echo $form->error($model, 'Sound_Car_Right_Equal_Org_Id'); ?>
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
                            <?php echo $form->labelEx($model, 'Sound_Car_Right_Blank_Share', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Sound_Car_Right_Blank_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Sound_Car_Right_Blank_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Sound_Car_Right_Blank_Org_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Sound_Car_Right_Blank_Org_Id', $organizations, array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                            <?php echo $form->error($model, 'Sound_Car_Right_Blank_Org_Id'); ?>
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
                    <?php echo $form->error($model, 'Sound_Car_Right_Member_GUID'); ?>
                    <?php echo $form->error($model, 'Sound_Car_Right_Work_GUID'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <?php echo CHtml::form(array('/site/soundcarrier/insertright'), 'post', array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'right_form')) ?>
                    <div class="box-header">
                        <h3 class="box-title">Linked Rightholders</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered" id="linked-holders">
                            <thead>
                            <th>Rightholder Name</th>
                            <th>Internal Code</th>
                            <th>Work</th>
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
                                        <tr data-uid="<?php echo $member->rightholderPerformer->Perf_GUID ?>" data-name="<?php echo $member->rightholderPerformer->fullname ?>" data-intcode="<?php echo $member->rightholderPerformer->Perf_Internal_Code ?>" data-work-uid="<?php echo $member->rightholderWork->Work_GUID ?>" data-work-name="<?php echo $member->rightholderWork->Work_Org_Title ?>">
                                            <td><?php echo $member->rightholderPerformer->fullname; ?></td>
                                            <td><?php echo $member->rightholderPerformer->Perf_Internal_Code; ?></td>
                                            <td><?php echo $member->rightholderWork->Work_Org_Title; ?></td>
                                            <td><?php echo $member->soundCarRightRole->rolename; ?></td>
                                            <td><?php echo $member->Sound_Car_Right_Equal_Share; ?></td>
                                            <td><?php echo $member->Sound_Car_Right_Blank_Share; ?></td>
                                            <td>
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', '#role-foundation', array('class' => "holder-edit", 'data-mcshare' => $member->Sound_Car_Right_Equal_Share, 'data-brshare' => $member->Sound_Car_Right_Blank_Share)); ?>&nbsp;&nbsp;
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', 'javascript:void(0)', array('class' => "row-delete")); ?>
                                            </td>
                                            <td class="hide">
                                                <?php
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Id]", $member->Sound_Car_Id);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Member_GUID]", $member->Sound_Car_Right_Member_GUID);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Work_GUID]", $member->Sound_Car_Right_Work_GUID);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Member_Internal_Code]", $member->rightholderPerformer->Perf_Internal_Code);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Role]", $member->Sound_Car_Right_Role, array('data-rcd' => $member->Sound_Car_Right_Role, 'class' => 'rcd'));
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Equal_Share]", $member->Sound_Car_Right_Equal_Share);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Equal_Org_Id]", $member->Sound_Car_Right_Equal_Org_Id);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Blank_Share]", $member->Sound_Car_Right_Blank_Share);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Blank_Org_Id]", $member->Sound_Car_Right_Blank_Org_Id);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Work_Type]", $member->Sound_Car_Right_Work_Type);
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    $i++;
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
$search_url = Yii::app()->createAbsoluteUrl("site/soundcarrier/searchworks");
$get_roles_point_url = Yii::app()->createAbsoluteUrl("site/sharedefinitionperrole/getpoint");

$js = <<< EOD
    var rowCount = $('#linked-holders tbody tr').length;
    $(document).ready(function() {
        $('#search_button').on("click", function(){
            if($("#is_work").is(':checked') == false && $("#is_publ").is(':checked') == false){
                $("#chkbox_err").removeClass("hide");
                return false;
            }
            var data=$("#work-rightholder-search-form").serialize();
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:data,
                success:function(data){
                    $("#search_right_result").html(data);
                    $('#rght_1 .user-role-dropdown select.performer-role').val('');
                    $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Member_GUID').val('');
                    $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Work_GUID').val('');
                    $("#work_search tr, #link-performer tr").removeClass('highlight');
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });
        
        $('body').on('click','#work_search tr, #link-performer tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            $('#rght_1 .user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('#rght_1 .user-role-dropdown select.performer-role').removeAttr('disabled').removeClass('hide');
        });
        $('body').on('click','#work_search tr', function(){
            $("#link-performer-div").removeClass('hide');
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Work_GUID').val($(this).data('uid'));
        });
        $('body').on('click','#link-performer tr', function(){
            $("#add-performer").attr('disabled', false);
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Member_GUID').val($(this).data('uid'));
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Member_Internal_Code').val($(this).data('intcode'));
        });
        
        $('body').on('click','#linked-holders .row-delete', function(){
            _tr = $(this).closest('tr');
            $('#link-performer tr[data-intcode="'+_tr.data('intcode')+'"]').removeClass('hide');
            _tr.remove();
            checkShare();
        });
        
        $("#rght_1 .roles_dd").on("change", function(){
            getPoint($(this).val(), 1);
        });
        
        $('body').on('click','#rght_1 .holder-edit', function(){
            $("#rght_1 #right_insert").val('Edit');
            $(this).closest('tr').trigger('click');
            _brshare = $(this).data('brshare');
            _mcshare =  $(this).data('mcshare');

            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Equal_Share').val(_brshare);
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Blank_Share').val(_mcshare);
        
            $("#work_search tr, #link-performer tr").removeClass('highlight');
        
            _tr = $(this).closest('tr');
            _role = _tr.find('.rcd').data('rcd');
            _role !== null ? $('#rght_1 .user-role-dropdown select.performer-role').val(_role) : '';
        });
        
        $('body').on('click','#linked-holders tr', function(){
            _work_uid =  $(this).data('work-uid');
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Work_GUID').val(_work_uid);
        });
        
        $('body').on('click','#linked-holders tr, #link-performer tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            _uid = $(this).data('uid');
            _intcode =  $(this).data('intcode');
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Member_GUID').val(_uid);
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Member_Internal_Code').val(_intcode);
            $('#rght_1 .user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('#rght_1 .user-role-dropdown select.performer-role').removeAttr('disabled').removeClass('hide');
        });
    });

    function InsertRightHolder(form, data, hasError) {
        if (hasError == false) {
            $("#rght_1 #right_insert").attr("disabled", true);
            $('#rght_1 .loader').show();
            var form_data = form.serializeArray();
            $('#rght_1 #norecord_tr').remove();
        
            _performer = $("#rght_1 #link-performer tbody").find('.highlight');
            if(_performer.length == 0){
                _performer = $("#rght_1 #linked-holders tbody").find('.highlight');
            }
            _uid = _performer.data('uid');
            _intcode = _performer.data('intcode');
            _name = _performer.data('name');
        
        
            _work = $("#rght_1 #work_search tbody").find('.highlight');
            if(_work.length == 0){
                _work = $("#rght_1 #linked-holders tbody").find('.highlight');
            }
            _work_uid = _work.data('work-uid');
            _work_name = _work.data('work-name');

            if(_name === 'undefined'){
                _name = $("#rght_1 #linked-holders").find("[data-uid='" + _uid + "'][data-work-uid='" + _work_uid + "']").data('name');
            }
            if(_work_name === 'undefined'){
                _work_name = $("#rght_1 #linked-holders").find("[data-uid='" + _uid + "'][data-work-uid='" + _work_uid + "']").data('work-name');
            }
            chk_tr = $("#rght_1 #linked-holders").find("[data-uid='" + _uid + "'][data-work-uid='" + _work_uid + "']");
            if(chk_tr.length > 0){
                var tr = '';
            }else{
                var tr = '<tr data-uid="'+_uid+'" data-name="'+_name+'" data-intcode="'+_intcode+'" data-work-uid="'+_work_uid+'" data-work-name="'+_work_name+'" >';
            }
            
            $.each(form_data, function (key, value) {
                if(value['name'] != "base_table_search"){
                    var name = value['name'];
                    name = name.replace("[","[" + rowCount + "][");
                    //set hidden form values
                    
                    if(value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Role]"){
                        tr += '<td class="hide"><input class="rcd" data-rcd = "' + value['value'] + '" type="hidden" name="' + name + '" value="' + value['value'] + '"/></td>';
                    }else{
                        tr += '<td class="hide"><input type="hidden" name="' + name + '" value="' + value['value'] + '"/></td>';
                    }

                    if(value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Equal_Org_Id]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Blank_Org_Id]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Member_GUID]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Work_Type]"){
                        tr += '<td>';
                    }
                    var td_content = '';
                    if (value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Equal_Share]" || value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Blank_Share]") {
                        td_content = parseFloat(value['value']).toFixed(2);
                    }else if(value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Role]"){
                        td_content = $('select[name="' + value['name'] + '"] option:selected').filter(':visible:first').text();
                    }else if(value['name'] == "SoundCarrierRightholder[Sound_Car_Id]"){
                        td_content = chk_tr.length == 1 ? chk_tr.data('name') : _name;
                    }else if(value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Member_Internal_Code]"){
                        td_content = chk_tr.length == 1 ? _intcode : value['value'];
                    }else if(value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Work_GUID]"){
                        td_content = chk_tr.length == 1 ? chk_tr.data('work-name') : _work_name;
                    }
                    tr += td_content;
                    if(value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Equal_Org_id]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Blank_Org_Id]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Member_GUID]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Work_Type]"){
                        tr += '</td>';
                    }
                }
            });
            _mcshare = $("#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Blank_Share").val();
            _brshare = $("#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Equal_Share").val();
        
            tr += '<td>';
            tr += '<a href="#role-foundation" data-mcshare="'+_mcshare+'" data-brshare="'+_brshare+'" class="holder-edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;';
            tr += '<a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>';
            tr += '</td>';
        
            if(chk_tr.length > 0){
                chk_tr.html(tr);
//                chk_tr.html(tr).addClass('highlight_tr');
            }else{
                tr += '</tr>';
                $('#rght_1 #linked-holders tbody').append(tr);
//                $('#linked-holders tbody').find("tr:last").addClass('highlight_tr');
            }
            setTimeout(function(){ 
//                $('#linked-holders tbody').find(".highlight_tr").removeClass('highlight_tr');
            }, 3000);
            rowCount++;
        
            $('#sound-carrier-rightholder-form-1')[0].reset();
            $('#rght_1 .loader').hide();
            $("#rght_1 #right_insert").removeAttr("disabled");
            $("#rght_1 #right_insert").val('Add');
            $('#rght_1 .user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('#rght_1 .user-role-dropdown select.default-role').removeAttr('disabled').removeClass('hide');
            checkShare();
        }
        return false;
    }
        
    function checkShare(){
        _count = $("#linked-holders tbody tr").length;
        $("#right_ajax_submit").attr("disabled", _count == 0);
    }
        
    function getPoint(_id, _form_id){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '$get_roles_point_url',
            data:{id: _id},
            success:function(data){
                $("#rght_"+_form_id+" #SoundCarrierRightholder_Sound_Car_Right_Equal_Share").val(data.equ_remn);
                $("#rght_"+_form_id+" #SoundCarrierRightholder_Sound_Car_Right_Blank_Share").val(data.blk_tp);
           },
            error: function(data) {
                alert("Something went wrong. Try again");
            },
        });
    }
        
EOD;
Yii::app()->clientScript->registerScript('_right_form', $js);
?>