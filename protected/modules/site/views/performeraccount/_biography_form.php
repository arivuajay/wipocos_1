<?php
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
?>
<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'performer-biography-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Perf_Acc_Id', array('value' => $performer_model->Perf_Acc_Id));
    $groups = Group::model()->with('groupManageRights')->isStatusActive()->findAll('Group_Is_Performer = :performer', array(':performer' => '1'));
    $group_ids = $performer_model->groupMembers ? CHtml::listData($performer_model->groupMembers, 'Group_Member_Id', 'Group_Id') : array();
    ?>
    <div class="box-body">
        <div class="form-group">
            <label for="base_table_search" class="col-sm-2 control-label required">Search</label>                    
            <div class="col-sm-5">
                <input type="text" id="base_table_search" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="GroupMembers_Group_Id" class="col-sm-2 control-label">Groups </label>
            <div class="col-sm-5" style="max-height: 200px; overflow-y: scroll">
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
                            <tr>
                                <?php $checked = (!empty($group_ids) && in_array($group->Group_Id, $group_ids)) ? 'checked' : ''; ?>
                                <td><input type="checkbox" class="group_ids" name="group_ids[<?php echo $group->Group_Id ?>]" value="<?php echo $group->Group_Id ?>" <?php echo $checked ?> /></td>
                                <td><?php echo $group->Group_Name ?></td>
                                <td><?php echo $group->Group_Internal_Code ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Perf_Biogrph_Annotation', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textArea($model, 'Perf_Biogrph_Annotation', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'Perf_Biogrph_Annotation'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($biograph_upload_model, 'Perf_Biogrph_Upl_File', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php
                $max_size = $biograph_upload_model->acceptFilesize();
                $this->widget('CMultiFileUpload', array(
                    'model' => $biograph_upload_model,
                    'name' => 'Perf_Biogrph_Upl_File',
                    'accept' => $biograph_upload_model->acceptFiles(),
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
                <?php echo $form->error($biograph_upload_model, 'Perf_Biogrph_Upl_File'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('id' => 'member-submit', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<?php
$uploaded_files = PerformerBiographUploads::model()->findAll('Perf_Biogrph_Id = :bio_id', array(':bio_id' => $model->Perf_Biogrph_Id));
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
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <?php
                            $file_path = $uploaded_file->getFilePath();
                            $i = $key + 1
                            ?>
                            <td><?php echo $i ?>.</td>
                            <td><a class="popup-link" href="<?php echo $file_path ?>"><?php echo "Biograph {$i}" ?></a></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/performeraccount/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/performeraccount/biofiledelete/', 'id' => $uploaded_file->Perf_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => '.popup-link'));
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
<?php
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
    });
EOD;
Yii::app()->clientScript->registerScript('_bio_form', $js);
?>
<?php
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
    });
EOD;
Yii::app()->clientScript->registerScript('_bio_form', $js);
?>