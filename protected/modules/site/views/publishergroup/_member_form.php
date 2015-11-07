<?php
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;



$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
?>
<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'publisher-group-member-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));

    if ($group_model->Pub_Group_Is_Publisher == '1') {
        $users = PublisherAccount::model()->with('publisherManageRights')->isStatusActive()->findAll();
    } elseif ($group_model->Pub_Group_Is_Producer == '1') {
        $users = ProducerAccount::model()->with('producerRelatedRights')->isStatusActive()->findAll();
    }

    $user_ids = CHtml::listData($group_model->publisherGroupMembers, 'Pub_Group_Member_Id', 'Pub_Group_Member_GUID');
    $group_publishers = PublisherAccount::model()->findAllByAttributes(array('Pub_GUID' => $user_ids));
    $group_producers = ProducerAccount::model()->findAllByAttributes(array('Pro_GUID' => $user_ids));
    ?>
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Members </label>
            <div class="col-sm-10">
                <table class="table table-bordered table-striped" id="usergroup">
                    <thead>
                        <tr>
                            <th>Corporate Name</th>
                            <th>Internal Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($group_publishers as $key => $user) {
                            ?>
                            <tr id="grp_ids_<?php echo $user->Pub_GUID ?>" data-guid = "<?php echo $user->Pub_GUID ?>">
                        <input type="hidden" name="user_ids[<?php echo $user->Pub_GUID ?>]" />
                        <td><?php echo $user->Pub_Corporate_Name ?></td>
                        <td><?php echo $user->Pub_Internal_Code ?></td>
                        <td><a href="javascript:void(0)" class="row-delete"><i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <?php
                    foreach ($group_producers as $key => $user) {
                        ?>
                            <tr id="grp_ids_<?php echo $user->Pro_GUID ?>" data-guid = "<?php echo $user->Pro_GUID ?>">
                        <input type="hidden" name="user_ids[<?php echo $user->Pro_GUID ?>]" />
                        <td><?php echo $user->Pro_Corporate_Name ?></td>
                        <td><?php echo $user->Pro_Internal_Code ?></td>
                        <td><a href="javascript:void(0)" class="row-delete"><i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                    <?php
                    if (empty($group_publishers) && empty($group_producers)) {
                        echo '<tr id="no_data"><td colspan="3">No data found</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
                <br />
                <?php
                $this->widget(
                        'application.components.MyTbButton', array(
                    'label' => 'Search & Add Members',
                    'context' => 'warning',
                    'htmlOptions' => array(
                        'id' => 'newgroupbutton',
                        'data-toggle' => 'modal',
                        'data-target' => '#memberModal',
                        'onclick' => '{$("#group-dismiss").trigger("click");}'
                    ),
                        )
                );
                ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($group_model->isNewRecord ? 'Save' : 'Update', array('id' => 'member-submit', 'class' => $group_model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'GroupMembers[submit]')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
<!--Member Modal -->
<?php
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'memberModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Search & Add Members</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="base_table_search" class="control-label required">Search</label>                    
        <div>
            <input type="text" id="base_table_search" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="GroupMembers_User_Id" class="control-label">Groups </label>
        <div style="max-height: 300px; overflow-y: scroll">
            <table class="table table-bordered table-datatable">
                <thead>
                    <tr>
                        <th style="width: 10px"><?php echo CHtml::checkBox('user_id', false, array('id' => 'user_id')) ?></th>
                        <th>Corporate Name</th>
                        <th>Internal Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($group_model->Pub_Group_Is_Publisher == '1') {
                        foreach ($users as $key => $user) {
                            ?>
                            <tr id="tr_group_<?php echo $user->Pub_GUID ?>" data-corpname="<?php echo $user->Pub_Corporate_Name ?>" data-intcode="<?php echo $user->Pub_Internal_Code ?>">
                                <td><input type="checkbox" value="<?php echo $user->Pub_GUID ?>" class="user_ids" name="grpchk"/></td>
                                <td><?php echo $user->Pub_Corporate_Name ?></td>
                                <td><?php echo $user->Pub_Internal_Code ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    <?php
                    if ($group_model->Pub_Group_Is_Producer == '1') {
                        foreach ($users as $key => $user) {
                            ?>
                            <tr id="tr_group_<?php echo $user->Pro_GUID ?>" data-corpname="<?php echo $user->Pro_Corporate_Name ?>" data-intcode="<?php echo $user->Pro_Internal_Code ?>">
                                <td><input type="checkbox" value="<?php echo $user->Pro_GUID ?>" class="user_ids" name="grpchk"/></td>
                                <td><?php echo $user->Pro_Corporate_Name ?></td>
                                <td><?php echo $user->Pro_Internal_Code ?></td>
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

<div class="modal-footer">
    <p class="errorMessage text-center col-sm-5" id="art-modelerror"></p>
    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'context' => 'primary',
        'label' => 'Add Member',
        'url' => '#',
        'htmlOptions' => array(
            'onclick' => '{
                    var _row = [];
                    $("input[name=grpchk]:checked").map(function() {
                        _row.push(this.value);
                    });
                    if(_row.length == 0){
                        $("#art-modelerror").html("Select Alteast one Member");
                    }else{
                        $("#art-modelerror").html("");
                        $("#no_data").remove();
                        $(_row).each(function(index, val) {
                            tr = $("#tr_group_"+val);
                            if($("#grp_ids_"+val).length == 0){
                                insert = \'<tr id="grp_ids_\'+val+\'" data-guid = "\'+val+\'">\';
                                insert += \'<input type="hidden" name="user_ids[\'+val+\']" />\';
                                insert += \'<td>\'+tr.data("corpname")+\'</td>\';
                                insert += \'<td>\'+tr.data("intcode")+\'</td>\';
                                insert += \'<td><a href="javascript:void(0)" class="row-delete"><i class="glyphicon glyphicon-trash"></i></a></td>\';
                                insert += \'</tr>\';
                                $("#usergroup tbody").append(insert);
                            }
                        });
                        $("#user_id").iCheck("uncheck");
                        $(".user_ids").iCheck("uncheck");
                        $("#group-dismiss").trigger("click");
                    }
                }',
            'id' => 'set_group_btn'
        ),
            )
    );
    $this->widget(
            'application.components.MyTbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'group-dismiss'),
            )
    );
    ?>
</div>
<?php $this->endWidget(); ?>
<!---End -->

<?php
$delete_url = Yii::app()->createAbsoluteUrl('/site/publishergroup/memberdelete');
$groupid = $group_model->Pub_Group_Id;

$js = <<< EOD
    $(document).ready(function() {
        $('#user_id').on('ifChecked', function(event){
            $('.user_ids').iCheck('check');
        });
        $('#user_id').on('ifUnchecked', function(event){
            $('.user_ids').iCheck('uncheck');
        });

        $('#member-submit').click(function(ev) {
            $("#base_table_search").val('').trigger("keyup");
            return true;
        });

        $('body').on('click','.row-delete', function(){
            if(confirm('Are you sure you want to delete this record?')){
                tr = $(this).closest('tr');
                 $.ajax({
                    type: "POST",
                    url: "$delete_url",
                    data: {group_id: "$groupid", guid: tr.data('guid')},
                    success: function(result){
                        tr.remove();
                        if($('#usergroup tbody tr').length == 0)
                            $('#usergroup tbody').append('<tr id="no_data"><td colspan="4">No data found</td></tr>');
                    }
                });
            }
            return false;
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_bio_form', $js);
?>