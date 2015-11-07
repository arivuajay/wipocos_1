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
        'id' => 'producer-biography-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pro_Acc_Id', array('value' => $producer_model->Pro_Acc_Id));
    $groups = PublisherGroup::model()->with('publisherGroupManageRights')->isStatusActive()->findAll('Pub_Group_Is_Producer = :producer', array(':producer' => '1'));
    $group_ids = $producer_model->producerGroupMembers ? CHtml::listData($producer_model->producerGroupMembers, 'Pub_Group_Member_Id', 'Pub_Group_Id') : array();
    $user_groups = PublisherGroup::model()->findAllByAttributes(array('Pub_Group_Id' => $group_ids));
    ?>
    <div class="box-body">
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Affiliated Groups </label>
            <div class="col-sm-10">
                <table class="table table-striped table-bordered" id="usergroup">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                        if (!empty($user_groups)) {
                            foreach ($user_groups as $key => $group) {
                                ?>
                        <tr id="grp_ids_<?php echo $group->Pub_Group_Id ?>" data-groupid = "<?php echo $group->Pub_Group_Id ?>">
                                    <input type="hidden" name="group_ids[<?php echo $group->Pub_Group_Id ?>]" />
                                    <td><?php echo $group->Pub_Group_Name ?></td>
                                    <td><?php echo $group->Pub_Group_Internal_Code ?></td>
                                    <td><a href="javascript:void(0)" class="row-delete"><i class="glyphicon glyphicon-trash"></i></a></td>
                                </tr>
                                <?php
                            }
                        }else{
                            echo '<tr id="no_data"><td colspan="3">No data found</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <br />
                <?php
                $this->widget(
                        'application.components.MyTbButton', array(
                    'label' => 'Search & Add Groups',
                    'context' => 'warning',
                    'htmlOptions' => array(
                        'id' => 'newgroupbutton',
                        'data-toggle' => 'modal',
                        'data-target' => '#groupModal',
                        'onclick' => '{$("#group-dismiss").trigger("click");}'
                    ),
                        )
                );
                ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Managers', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pro_Managers', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Pro_Managers'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pro_Biogrph_Annotation', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textArea($model, 'Pro_Biogrph_Annotation', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'Pro_Biogrph_Annotation'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($biograph_upload_model, 'Pro_Biogrph_Upl_File', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php
                $max_size = ProducerBiographUploads::IMAGE_SIZE;
                $this->widget('CMultiFileUpload', array(
                    'model' => $biograph_upload_model,
                    'name' => 'Pro_Biogrph_Upl_File',
                    'accept' => ProducerBiographUploads::ACCESS_TYPES_WID,
                    'duplicate' => 'Duplicate file!',
                    'denied' => 'Invalid file extension',
                    'options' => array(
                        'afterFileSelect' => "function(e ,v ,m){
                            var fileSize = e.files[0].size;
                            if(fileSize>1024 * 1024 * {$max_size}){
                               alert('Exceeds file upload limit {$max_size}MB');
                               $('.MultiFile-remove').last().click(); 
                             }                      
                             return true;
                        }"
                    )
                ));
                ?>
                <?php echo $form->error($biograph_upload_model, 'Pro_Biogrph_Upl_File'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($biograph_upload_model, 'Pro_Biogrph_Upl_Description', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textArea($biograph_upload_model, 'Pro_Biogrph_Upl_Description', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($biograph_upload_model, 'Pro_Biogrph_Upl_Description'); ?>
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Update', array('id' => 'member-submit', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
<?php
$uploaded_files = ProducerBiographUploads::model()->findAll('Pro_Biogrph_Id = :bio_id', array(':bio_id' => $model->Pro_Biogrph_Id));
if (!empty($uploaded_files)) {
    ?>
    <div class="box box-success">
        <div class="box-header">
            <h4 class="box-title">Uploaded Files</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Uploaded Files</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <?php
                            $file_path = $uploaded_file->getFilePath();
                            $i = $key + 1
                            ?>
                            <td><?php echo $i ?>.</td>
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "Producer Biograph {$i}"?></a></td>
                            <td><?php echo $uploaded_file->Pro_Biogrph_Upl_Description?></td>
                            <td><?php echo $uploaded_file->Created?></td>
                            <td><?php echo $uploaded_file->createdBy->name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/produceraccount/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/produceraccount/biofiledelete/', 'id' => $uploaded_file->Pro_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => ".popup-link{$i}"));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php }
?>
<!--Group Modal -->
<?php
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'groupModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Search & Add Groups</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="base_table_search" class="control-label required">Search</label>                    
        <div>
            <input type="text" id="base_table_search" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="GroupMembers_Group_Id" class="control-label">Groups </label>
        <div style="max-height: 300px; overflow-y: scroll">
            <table class="table table-bordered table-datatable">
                <thead>
                    <tr>
                        <th style="width: 10px"><?php echo CHtml::checkBox('group_id', false, array('id' => 'group_id')) ?></th>
                        <th>Group Name</th>
                        <th>Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($groups as $key => $group) { ?>
                    <tr id="tr_group_<?php echo $group->Pub_Group_Id?>" data-name="<?php echo $group->Pub_Group_Name ?>" data-intcode="<?php echo $group->Pub_Group_Internal_Code ?>">
                            <td><input type="checkbox" value="<?php echo $group->Pub_Group_Id ?>" class="group_ids" name="grpchk"/></td>
                            <td><?php echo $group->Pub_Group_Name ?></td>
                            <td><?php echo $group->Pub_Group_Internal_Code ?></td>
                        </tr>
                    <?php } ?>
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
        'label' => 'Add Group',
        'url' => '#',
        'htmlOptions' => array(
            'onclick' => '{
                    var _row = [];
                    $("input[name=grpchk]:checked").map(function() {
                        _row.push(this.value);
                    });
                    if(_row.length == 0){
                        $("#art-modelerror").html("Select Alteast one Group");
                    }else{
                        $("#art-modelerror").html("");
                        $("#no_data").remove();
                        $(_row).each(function(index, val) {
                            tr = $("#tr_group_"+val);
                            if($("#grp_ids_"+val).length == 0){
                                insert = \'<tr id="grp_ids_\'+val+\'" data-groupid = "\'+val+\'">\';
                                insert += \'<input type="hidden" name="group_ids[\'+val+\']" />\';
                                insert += \'<td>\'+tr.data("name")+\'</td>\';
                                insert += \'<td>\'+tr.data("intcode")+\'</td>\';
                                insert += \'<td><a href="javascript:void(0)" class="row-delete"><i class="glyphicon glyphicon-trash"></i></a></td>\';
                                insert += \'</tr>\';
                                
                                $("#usergroup tbody").append(insert);
                            }
                        });
                        $("#group_id").iCheck("uncheck");
                        $(".group_ids").iCheck("uncheck");
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
$delete_url = Yii::app()->createAbsoluteUrl('/site/produceraccount/memberdelete');
$guid = $producer_model->Pro_GUID;

$js = <<< EOD
    $(document).ready(function() {
        $('#group_id').on('ifChecked', function(event){
            $('.group_ids').iCheck('check');
        });
        $('#group_id').on('ifUnchecked', function(event){
            $('.group_ids').iCheck('uncheck');
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
                    data: {group_id: tr.data('groupid'), guid: "$guid"},
                    success: function(result){
                        tr.remove();
                        if($('#usergroup tbody tr').length == 0)
                            $('#usergroup tbody').append('<tr id="no_data"><td colspan="3">No data found</td></tr>');
                    }
                });
            }
            return false;
        });
   });
EOD;
Yii::app()->clientScript->registerScript('_bio_form', $js);
?>