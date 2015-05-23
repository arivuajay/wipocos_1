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
                                <?php echo CHtml::button('Search', array('class' => 'btn btn-success', 'name' => 'rght_holder', 'id' => 'search_button')); ?>
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
            'afterValidate' => 'js:InsertRightHolder'
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Work_Id', array('value' => $work_model->Work_Id));
    echo $form->hiddenField($model, 'Work_Member_Internal_Code');

    $organizations = CHtml::listData(Organization::model()->findAll(), 'Org_Id', 'Org_Abbrevation');
    ?>

    <div class="col-lg-12" id="search_right_result"></div>

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
                    <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-primary', 'id' => 'right_insert')); ?>
                </div>
                <div class="col-lg-11 help-block">
                    <?php echo $form->error($model, 'Work_Member_Internal_Code'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="text-right"><span>Note: Save button will be enabled after Broadcasting Share & Mechanical Share is 100 % </span></div>
                <div class="form-group foundation">
                    <?php echo CHtml::form(array('/site/work/insertright'), 'post', array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'right_form')) ?>
                    <div class="box-header">
                        <h3 class="box-title">Linked Rightholders</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed" id="linked-holders">
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
                                        if ($member->workAuthor) {
                                            $name = $member->workAuthor->Auth_First_Name;
                                            $url = array('/site/authoraccount/view', 'id' => $member->workAuthor->Auth_Acc_Id);
                                            $role = 'AU';
                                        } elseif ($member->workPublisher) {
                                            $name = $member->workPublisher->Pub_Corporate_Name;
                                            $url = array('/site/publisheraccount/view', 'id' => $member->workPublisher->Pub_Acc_Id);
                                            $role = 'PU';
                                        }
                                        ?>
                                        <tr data-urole="<?php echo $role; ?>" data-uid="<?php echo $member->Work_Member_Internal_Code ?>" data-name="<?php echo $name ?>">
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $member->Work_Member_Internal_Code; ?></td>
                                            <td><?php echo $member->workRightRole->Type_Rights_Name; ?></td>
                                            <td><span class="badge share_value" data-share="<?php echo $member->Work_Right_Broad_Share; ?>"><?php echo $member->Work_Right_Broad_Share; ?>%</span></td>
                                            <td><?php echo $member->getSpecialStatus($member->Work_Right_Broad_Special); ?></td>
                                            <!--<td><?php // echo $member->workRightBroadOrg->Org_Abbrevation;            ?></td>-->
                                            <td><span class="badge share_value" data-share="<?php echo $member->Work_Right_Mech_Share; ?>"><?php echo $member->Work_Right_Mech_Share; ?>%</span></td>
                                            <td><?php echo $member->getSpecialStatus($member->Work_Right_Mech_Special); ?></td>
                                            <!--<td><?php // echo $member->workRightMechOrg->Org_Abbrevation;            ?></td>-->
                                            <td>
                                                <?php // echo CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $url); ?>&nbsp;&nbsp;
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', '#role-foundation', array('class' => 'holder-edit', 'data-brshare' => $member->Work_Right_Broad_Share, 'data-brspl' => $member->Work_Right_Broad_Special, 'data-mcshare' => $member->Work_Right_Mech_Share, 'data-mcspl' => $member->Work_Right_Mech_Special)); ?>&nbsp;&nbsp;
                                                <?php // echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', array('/site/work/holderremove', 'id' => $member->Work_Right_Id), array('onclick' => 'return confirm("Are you sure to delete this Rightholder?")')); ?>
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', 'javascript:void(0)', array('class' => "row-delete")); ?>
                                            </td>
                                        </tr>
                                        <input type="hidden" value="<?php echo $member->Work_Member_Internal_Code?>" name="WorkRightholder[<?php echo $key?>][Work_Member_Internal_Code]">
                                        <?php
                                        echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Id]", $member->Work_Id);
                                        echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Member_Internal_Code]", $member->Work_Member_Internal_Code);
                                        echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Role]", $member->Work_Right_Role);
                                        echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Broad_Share]", $member->Work_Right_Broad_Share);
                                        echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Broad_Special]", $member->Work_Right_Broad_Special);
                                        echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Broad_Org_id]", $member->Work_Right_Broad_Org_id);
                                        echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Mech_Share]", $member->Work_Right_Mech_Share);
                                        echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Mech_Special]", $member->Work_Right_Mech_Special);
                                        echo CHtml::hiddenField("WorkRightholder[{$key}][Work_Right_Mech_Org_Id]", $member->Work_Right_Mech_Org_Id);
                                    }
                                } else {
                                    echo "<tr id='norecord_tr'><td colspan='8'>No records found</td></tr>";
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
$search_url = Yii::app()->createAbsoluteUrl("site/work/searchright");

$js = <<< EOD
    $(document).ready(function() {
        checkShare();
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
        });
        
        $('body').on('click','#search_result tr,#linked-holders tr', function(){
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
        
        $('body').on('click','.row-delete', function(){
            $(this).closest('tr').remove();
            checkShare();
        });
        
        $('#search_button').on("click", function(){
            var data=$("#work-rightholder-search-form").serialize();
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:data,
                success:function(data){
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
            $("#right_insert").attr("disabled", true);
            $('.loader').show();
            var form_data = form.serializeArray();
            $('#norecord_tr').remove();
            var rowCount = $('#linked-holders tbody tr').length;
        
            _uid = $(".highlight").data('uid');
            _role = $(".highlight").data('urole');
            _name = $('.highlight').data('name');

            if(_name === 'undefined'){
                _name = $("#linked-holders").find("[data-uid='" + _uid + "']").data('name');
            }
            chk_tr = $("#linked-holders").find("[data-uid='" + _uid + "']");
            if(chk_tr.length == 1){
                var tr = '';
            }else{
                var tr = '<tr data-uid="'+_uid+'" data-urole="'+_role+'" data-name="'+_name+'">';
            }
        
            $.each(form_data, function (key, value) {
                var name = value['name'];
                name = name.replace("[","[" + rowCount + "][");
                //set hidden form values
                tr += '<input type="hidden" name="' + name + '" value="' + value['value'] + '"/>';

                if(value['name'] != "WorkRightholder[Work_Right_Broad_Org_id]" && value['name'] != "WorkRightholder[Work_Right_Mech_Org_Id]"){
                    tr += '<td>';
                }
                var td_content = '';
                if (value['name'] == "WorkRightholder[Work_Right_Broad_Share]"  || value['name'] == "WorkRightholder[Work_Right_Mech_Share]") {
                    td_content = '<span class="badge share_value" data-share="' + value['value'] + '">' + parseFloat(value['value']).toFixed(2) + '%</span>';
                } else if (value['name'] == "WorkRightholder[Work_Right_Broad_Special]" || value['name'] == "WorkRightholder[Work_Right_Mech_Special]"
                ) {
                    td_content = $('select[name="' + value['name'] + '"] option:selected').text();
                }else if(value['name'] == "WorkRightholder[Work_Right_Role]"){
                    td_content = $('select[name="' + value['name'] + '"] option:selected').filter(':visible:first').text();
                }else if(value['name'] == "WorkRightholder[Work_Id]"){
                    td_content = chk_tr.length == 1 ? $("#linked-holders").find("[data-uid='" + _uid + "']").data('name') : _name;
                }else if(value['name'] == "WorkRightholder[Work_Member_Internal_Code]"){
                    td_content = chk_tr.length == 1 ? _uid : value['value'];
                }
                tr += td_content;
                if(value['name'] != "WorkRightholder[Work_Right_Broad_Org_id]" && value['name'] != "WorkRightholder[Work_Right_Mech_Org_Id]"){
                    tr += '</td>';
                }
            });
            _mcspl = $("#WorkRightholder_Work_Right_Mech_Special").val();
            _mcshare = $("#WorkRightholder_Work_Right_Mech_Share").val();
            _brspl = $("#WorkRightholder_Work_Right_Broad_Special").val();
            _brshare = $("#WorkRightholder_Work_Right_Broad_Share").val();
        
            tr += '<td>&nbsp;&nbsp;&nbsp;';
            tr += '<a href="#role-foundation" data-mcspl="'+_mcspl+'" data-mcshare="'+_mcshare+'" data-brspl="'+_brspl+'" data-brshare="'+_brshare+'" class="holder-edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;';
            tr += '<a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>';
            tr += '</td>';
        
            if(chk_tr.length == 1){
                chk_tr.html(tr);
            }else{
                tr += '</tr>';
                $('#linked-holders tbody').append(tr);
            }
        
            checkShare();
            $('#work-rightholder-form')[0].reset();
            $('.loader').hide();
            $("#right_insert").removeAttr("disabled");
            $("#right_insert").val('Add');
        }
        return false;
    }
        
    function checkShare(){
        _val = 0;
        $('.share_value').each(function(){
            _val += parseFloat($(this).data('share'));
        });
        $("#right_ajax_submit").attr("disabled", _val != '200');
    }
        
EOD;
Yii::app()->clientScript->registerScript('_right_form', $js);
?>