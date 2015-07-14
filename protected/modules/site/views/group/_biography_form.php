<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'group-biography-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Group_Id', array('value' => $group_model->Group_Id));
    ?>
    <div class="box-body">

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Group_Biogrph_Annotation', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textArea($model, 'Group_Biogrph_Annotation', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'Group_Biogrph_Annotation'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($biograph_upload_model, 'Group_Biogrph_Upl_File', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php
                $max_size = GroupBiographUploads::IMAGE_SIZE;
                $this->widget('CMultiFileUpload', array(
                    'model' => $biograph_upload_model,
                    'name' => 'Group_Biogrph_Upl_File',
                    'accept' => GroupBiographUploads::ACCESS_TYPES_WID,
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
                <?php echo $form->error($biograph_upload_model, 'Group_Biogrph_Upl_File'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($biograph_upload_model, 'Group_Biogrph_Upl_Description', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textArea($biograph_upload_model, 'Group_Biogrph_Upl_Description', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($biograph_upload_model, 'Group_Biogrph_Upl_Description'); ?>
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<?php
$uploaded_files = GroupBiographUploads::model()->findAll('Group_Biogrph_Id = :bio_id', array(':bio_id' => $model->Group_Biogrph_Id));
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
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "{$role} Group Biograph {$i}" ?></a></td>
                            <td><?php echo $uploaded_file->Group_Biogrph_Upl_Description?></td>
                            <td><?php echo $uploaded_file->Created?></td>
                            <td><?php echo $uploaded_file->createdBy->name?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/group/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/group/biofiledelete/', 'id' => $uploaded_file->Group_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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
