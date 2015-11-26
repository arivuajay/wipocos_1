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
                            <div class="form-group hide">
                                <?php echo CHtml::label('Work', '', array('class' => 'control-label')); ?>&nbsp;
                                <?php echo CHtml::checkBox('is_work', (/* $_REQUEST['is_work'] == 1 */true), array('class' => 'form-control', 'id' => 'is_work')); ?>&nbsp;&nbsp;
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

    <div class="row hide" id="link-author-div">

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
    echo $form->hiddenField($model, 'Sound_Car_Right_Member_Type', array('value' => 'A'));
    $organizations = CHtml::listData(Organization::model()->findAll(), 'Org_Id', 'Org_Abbrevation');
    ?>

    <a name="role-foundation">&nbsp;</a>
    <div class="col-lg-12 hide role_entry_author">
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

    <div class="col-lg-6 hide role_entry_author">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Equitable Remuneration Shares</h3>
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
    <div class="col-lg-6 hide role_entry_author">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Blank Levy Shares</h3>
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
    <div class="box-footer hide role_entry_author">
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
                <div class="form-group pull-right">
                    <?php
                    $this->beginWidget(
                            'booster.widgets.TbModal', array('id' => 'rightHolder')
                    );
                    ?>
                    <div class="modal-header">
                        <a class="close" data-dismiss="modal">&times;</a>
                        <h4>RightHolders</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $this->renderPartial('_work_list', array('model' => $sound_car_model)); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                    <?php
                    if (!empty($exists_model)) {
                        $this->widget(
                                'application.components.MyTbButton', array(
                            'label' => 'View & Export',
                            'context' => 'primary',
                            'htmlOptions' => array(
                                'data-toggle' => 'modal',
                                'data-target' => '#rightHolder',
                            ),
                                )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
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
                            <th>Performance Shares</th>
                            <th>Mechanical Shares</th>
                            <th class="hide">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if (!empty($exists_model)) {
                                    foreach ($exists_model as $key => $member) {
                                        if ($member->Sound_Car_Right_Member_Type == 'A') {
                                            $uid = $member->rightholderAuthor->Auth_GUID;
                                            $name = $member->rightholderAuthor->fullname;
                                            $internal_code = $member->rightholderAuthor->Auth_Internal_Code;
                                        } else if ($member->Sound_Car_Right_Member_Type == 'P') {
                                            $uid = $member->rightholderPerformer->Perf_GUID;
                                            $name = $member->rightholderPerformer->fullname;
                                            $internal_code = $member->rightholderPerformer->Perf_Internal_Code;
                                        }
                                        ?>
                                        <tr data-uid="<?php echo $uid ?>" data-name="<?php echo $name ?>" data-intcode="<?php echo $internal_code ?>" data-work-uid="<?php echo $member->rightholderWork->Work_GUID ?>" data-work-name="<?php echo $member->rightholderWork->Work_Org_Title ?>">
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $internal_code; ?></td>
                                            <td><?php echo $member->rightholderWork->Work_Org_Title; ?></td>
                                            <td><?php echo $member->soundCarRightRole->rolename; ?></td>
                                            <td><span class="share_value mech_share_value" data-share="<?php echo $member->Sound_Car_Right_Equal_Share; ?>">
                                                    <div class="input-group col-sm-6 ">
                                                        <?php echo CHtml::textField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Equal_Share]", $member->Sound_Car_Right_Equal_Share, array("class" => "form-control")); ?>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </span></td>
                                            <td><span class="share_value mech_share_value" data-share="<?php echo $member->Sound_Car_Right_Blank_Share; ?>">
                                                    <div class="input-group col-sm-6 ">
                                                        <?php echo CHtml::textField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Blank_Share]", $member->Sound_Car_Right_Blank_Share, array("class" => "form-control")); ?>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </span></td>
                                            <td class="hide">
                                                <?php
                                                if ($member->Sound_Car_Right_Member_Type == 'P') {
                                                    echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', '#role-foundation', array('class' => "holder-edit", 'data-blk_share' => $member->Sound_Car_Right_Blank_Share, 'data-eql_share' => $member->Sound_Car_Right_Equal_Share, 'data-mem_type' => $member->Sound_Car_Right_Member_Type));
                                                }
                                                ?>&nbsp;&nbsp;
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', 'javascript:void(0)', array('class' => "row-delete")); ?>
                                            </td>
                                            <td class="hide">
                                                <?php
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Id]", $member->Sound_Car_Id);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Member_GUID]", $member->Sound_Car_Right_Member_GUID);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Work_GUID]", $member->Sound_Car_Right_Work_GUID);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Member_Internal_Code]", $member->rightholderAuthor->Auth_Internal_Code);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Role]", $member->Sound_Car_Right_Role, array('data-rcd' => $member->Sound_Car_Right_Role, 'class' => 'rcd'));
//                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Equal_Share]", $member->Sound_Car_Right_Equal_Share);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Equal_Org_Id]", $member->Sound_Car_Right_Equal_Org_Id);
//                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Blank_Share]", $member->Sound_Car_Right_Blank_Share);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Blank_Org_Id]", $member->Sound_Car_Right_Blank_Org_Id);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Work_Type]", $member->Sound_Car_Right_Work_Type);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Member_Type]", $member->Sound_Car_Right_Member_Type);
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
                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary', 'id' => 'right_ajax_submit')) ?>
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
            'application.components.MyTbButton', array(
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
            'application.components.MyTbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'performer-dismiss'),
            )
    );
    ?>
    <a id="temp_click_new_performer" class="hide">Click me !!!!!</a>

</div>

<?php $this->endWidget(); ?>

<!--Artist Modal -->
<?php $this->beginWidget('booster.widgets.TbModal', array('id' => 'rightauthorModal')); ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Authors</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="rightauthortable_base_table_search" class="control-label required">Search</label>
        <div>
            <input type="text" id="rightauthortable_base_table_search" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div style="max-height: 300px; overflow-y: scroll">
            <table class="table table-bordered selectable" id="rightauthortable">
                <thead>
                    <tr>
                        <th>Rightholder Name</th>
                        <th>Internal Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = AuthorAccount::model()->findAll();
                    foreach ($users as $key => $user) {
                        ?>
                        <tr data-uid="<?php echo $user->Auth_GUID ?>" data-name="<?php echo $user->fullname ?>" data-intcode="<?php echo $user->Auth_Internal_Code ?>" data-rcdrole="7" data-rcdrolename = "CA - Composer/Author" data-eqlshare = "0" data-eqlorg = "1" data-blkshare = "0" data-blkorg = "1">                            <td><?php echo $user->fullname ?></td>
                            <td><?php echo $user->Auth_Internal_Code ?></td>
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
    <p class="errorMessage text-center col-sm-5" id="art-modelerror"></p>
    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'context' => 'primary',
        'label' => 'Set Author',
        'url' => '#',
        'htmlOptions' => array(
            'id' => 'new_author_add',
            'onclick' => '{
                    _row = $("#rightauthortable").find(".highlight");
                    if(_row.length == 0){
                        $("#pro-modelerror").html("Select Alteast One Author");
                    }else{
                        $("#temp_click_new_author").trigger("click");
                    }
                }'
        ),
            )
    );
    ?>
    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'author-dismiss'),
            )
    );
    ?>
    <a id="temp_click_new_author" class="">Click me !!!!!</a>

</div>
<?php $this->endWidget(); ?>

<?php
$search_url = Yii::app()->createAbsoluteUrl("site/soundcarrier/searchworks");
$search_author_url = Yii::app()->createAbsoluteUrl("site/soundcarrier/searchworkauthors");
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

        $('body').on('click','#work_search tr, #link-performer tr, #rightperformertable tr,#rightauthortable tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            $('#rght_1 .user-role-dropdown select').attr('disabled','disabled').addClass('hide');
            $('#rght_1 .user-role-dropdown select.performer-role').removeAttr('disabled').removeClass('hide');
        });
        $('body').on('click','#work_search tbody tr', function(){
            $("#link-author-div").removeClass('hide');
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Work_GUID').val($(this).data('uid'));
            $.ajax({
                type: 'GET',
                url: '$search_author_url',
                data:{work_guid: $(this).data('uid')},
                success:function(data){
                    $("#link-author-div").html(data);
                    $("#rightperformertable tbody tr").removeClass('hide highlight');
                    $('.role_entry_author').addClass('hide');
                    $('#rght_2 #SoundCarrierRightholder_Sound_Car_Right_Member_GUID').val('');
                    $('#link-performer tbody tr').each(function( index ) {
                        $(this).removeClass('highlight');
                        if($(this).attr('data-blkorg')){
                            insertRightAuto($(this).data());
                        }
                    });
                },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });


        $('body').on('click','#link-performer tbody tr', function(){
            if($(this).hasClass('new_perf_tr')){
                $('.role_entry_author').removeClass('hide');
            }else{
                $('.role_entry_author').addClass('hide');
            }
            $("#add-performer").attr('disabled', false);
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Member_GUID').val($(this).data('uid'));
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Member_Internal_Code').val($(this).data('intcode'));
            console.log($(this));
            $('#rght_1 .user-role-dropdown select.performer-role').val($(this).data('rcdrole'));
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Equal_Share').val($(this).data('eqlshare'));
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Blank_Share').val($(this).data('blkshare'));
            $(this).attr('data-eqlorg') ? $('#rght_2 #SoundCarrierRightholder_Sound_Car_Right_Equal_Org_Id').val($(this).data('eqlorg')) : '';
            $(this).attr('data-blkorg') ? $('#rght_2 #SoundCarrierRightholder_Sound_Car_Right_Blank_Org_Id').val($(this).data('blkorg')) : '';
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
            _eql_share = $(this).data('eql_share');
            _blk_share =  $(this).data('blk_share');

            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Equal_Share').val(_eql_share);
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Blank_Share').val(_blk_share);
            $('#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Member_Type').val($(this).data('mem_type'));

            $("#work_search tr, #link-performer tr").removeClass('highlight');

            _tr = $(this).closest('tr');
            _role = _tr.find('.rcd').data('rcd');
            _role !== null ? $('#rght_1 .user-role-dropdown select.performer-role').val(_role) : '';
            $('.role_entry_author').removeClass('hide');
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

        $('body').on('click','#temp_click_new_performer', function(){
            _table = $('#rightperformertable tbody').find('.highlight');
            _uid = _table.data('uid');
            _intcode = _table.data('intcode');
            _name = _table.data('name');
            var tr = '<tr data-intcode="'+_intcode+'" data-name="'+_name+'" data-uid="'+_uid+'" class="new_perf_tr">';
            tr += '<td>'+_name+'</td>';
            tr += '<td>'+_intcode+'</td>';
            tr += '</tr>';
            chk_tr = $("#rightperformertable tbody").find("[data-uid='" + _uid + "']");
            if(chk_tr.length > 0){
                chk_tr.addClass('hide');
            }
            _insert_table = $('#link-performer tbody');
            _insert_table.append(tr);
            _insert_table.find('tr:last').trigger('click');
            $('#performer-dismiss').trigger('click');
            $('#SoundCarrierRightholder_Sound_Car_Right_Member_Type').val('P');
        });

        $('body').on('click','#temp_click_new_author', function(){
            _row = $('#rightauthortable tbody tr.highlight');
            _insert_table = $('#link-performer tbody');
            _insert_table.append(_row);
            $('#link-performer tbody tr#norecord_tr_rec').remove();
            _appendedRow = $('#link-performer tbody tr:last').removeClass('highlight');
            insertRightAuto(_appendedRow.data());
            $('#author-dismiss').trigger('click');
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

                    if(value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Equal_Org_Id]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Blank_Org_Id]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Member_GUID]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Work_Type]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Member_Type]"){
                        tr += '<td>';
                    }
                    var td_content = '';
                    if (value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Equal_Share]" || value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Blank_Share]") {
                        td_content = parseFloat(value['value']).toFixed(2);
                    }else if(value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Role]"){
                        td_content = $('select[name="' + value['name'] + '"] option:selected').text();
//                        td_content = $('select[name="' + value['name'] + '"] option:selected').filter(':visible:first').text();
                    }else if(value['name'] == "SoundCarrierRightholder[Sound_Car_Id]"){
                        td_content = chk_tr.length == 1 ? chk_tr.data('name') : _name;
                    }else if(value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Member_Internal_Code]"){
                        td_content = chk_tr.length == 1 ? _intcode : value['value'];
                    }else if(value['name'] == "SoundCarrierRightholder[Sound_Car_Right_Work_GUID]"){
                        td_content = chk_tr.length == 1 ? chk_tr.data('work-name') : _work_name;
                    }
                    tr += td_content;
                    if(value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Equal_Org_id]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Blank_Org_Id]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Member_GUID]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Work_Type]" && value['name'] != "SoundCarrierRightholder[Sound_Car_Right_Member_Type]"){
                        tr += '</td>';
                    }
                }
            });
            _blk_share = $("#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Blank_Share").val();
            _eql_share = $("#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Equal_Share").val();
            _mem_type = $("#rght_1 #SoundCarrierRightholder_Sound_Car_Right_Member_Type").val();

            tr += '<td class="hide">';
            tr += '<a href="#role-foundation" data-blk_share="'+_blk_share+'" data-eql_share="'+_eql_share+'" data-mem_type="'+_mem_type+'" class="holder-edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;';
            tr += '<a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>';
            tr += '</td>';

            if(chk_tr.length > 0){
                chk_tr.html(tr);
            }else{
                tr += '</tr>';
                $('#rght_1 #linked-holders tbody').append(tr);
            }
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

    function insertRightAuto(data){
        $('#rght_1 #norecord_tr').remove();
        _work = $('#work_search tbody tr.highlight');
        chk_tr = $("#rght_1 #linked-holders").find("[data-uid='" + data.uid + "'][data-work-uid='" + _work.data("work-uid") + "']");
        if(chk_tr.length > 0){
            var tr = '';
        }else{
            var tr = '<tr data-work-name="'+_work.data("work-name")+'" data-work-uid="'+_work.data("work-uid")+'" data-intcode="'+data.intcode+'" data-name="'+data.name+'" data-uid="'+data.uid+'">';
        }

        tr += '<td>'+data.name+'</td>';
        tr += '<td>'+data.intcode+'</td>';
        tr += '<td>'+_work.data("work-name")+'</td>';
        tr += '<td>'+data.rcdrolename+'</td>';
        tr += '<td><span class="share_value" data-share="'+data.eqlshare+'"><div class="input-group col-sm-6"><input type="text" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Equal_Share]" value="'+data.eqlshare+'" class="form-control"><span class="input-group-addon">%</span></div></span></td>';
        tr += '<td><span class="share_value" data-share="'+data.blkshare+'"><div class="input-group col-sm-6 "><input type="text" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Blank_Share]" value="'+data.blkshare+'" class="form-control"><span class="input-group-addon">%</span></div></span></td>';
//        tr += '<td><a href="#role-foundation" data-eql_share="'+data.eqlshare+'" data-blk_share="'+data.blkshare+'" class="holder-edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;';
        tr += '<td class="hide">';
        tr += '<a href="javascript:void(0)" class="row-delete"><i class="glyphicon glyphicon-trash"></i></a></td>';

        //hidden fields//
        tr += '<td class="hide">'
        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Id]" value="$sound_car_id">';
        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Member_GUID]" value="'+data.uid+'">';
        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Work_GUID]" value="'+_work.data("work-uid")+'">';
        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Member_Internal_Code]" value="'+data.intcode+'">';
        tr += '<input class="rcd" data-rcd = "'+data.rcdrole+'" type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Role]" value="'+data.rcdrole+'">';
//        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Equal_Share]" value="'+data.eqlshare+'">';
        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Equal_Org_Id]" value="'+data.eqlorg+'">';
//        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Blank_Share]" value="'+data.blkshare+'">';
        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Blank_Org_Id]" value="'+data.blkorg+'">';
        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Work_Type]" value="W">';
        tr += '<input type="hidden" name="SoundCarrierRightholder['+rowCount+'][Sound_Car_Right_Member_Type]" value="A">';
        tr += '</td>';
        //End //

        if(chk_tr.length > 0){
            chk_tr.html(tr);
        }else{
            tr += '</tr>';
            $('#rght_1 #linked-holders tbody').append(tr);
        }
        rowCount++;
        checkShare();
    }


EOD;
Yii::app()->clientScript->registerScript('_right_form', $js);
?>