

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'rss-upload-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => false,
    ));
    echo $form->hiddenField($model, 'Rcd_Ses_Id', array('value' => $record_ses_model->Rcd_Ses_Id));
    ?>

    <div class="box-body">

        <?php if (!$model->isNewRecord) { ?>
            <div class="col-lg-12 col-md-12">
                <div class="row mb10">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;New upload', array("/site/recordingsession/update/id/{$record_ses_model->Rcd_Ses_Id}/tab/7"), array('class' => 'btn btn-success pull-right')) ?>
                    <!--<a href="/wipocos1/branches/dev/site/recordingsession/create" class="btn btn-success pull-right">Create Author</a>-->    
                </div>
            </div>
        <?php } ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Ses_Upl_Doc_Name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Rcd_Ses_Upl_Doc_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Rcd_Ses_Upl_Doc_Name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Ses_Upl_File', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->fileField($model, 'Rcd_Ses_Upl_File', array()); ?>
                <?php echo $form->error($model, 'Rcd_Ses_Upl_File'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<?php
$uploaded_files = RecordingSessionUpload::model()->findAll('Rcd_Ses_Id = :acc_id', array(':acc_id' => $record_ses_model->Rcd_Ses_Id));
if (!empty($uploaded_files)) {
    ?>
    <div class="box">
        <div class="box-header">
            <h4 class="box-title">Uploaded Files</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Document Name</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $uploaded_file->Rcd_Ses_Upl_Doc_Name ?></td>
                            <td><?php echo $uploaded_file->createdBy->name ?></td>
                            <td><?php echo $uploaded_file->updatedBy->name ?></td>
                            <td>
                                <?php
                                $file_path = $uploaded_file->getFilePath();
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/recordingsession/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-eye"></i>', $file_path, array('target' => '_blank', 'title' => 'View'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/recordingsession/update', 'id' => $record_ses_model->Rcd_Ses_Id, 'tab' => 7, 'fileedit' => $uploaded_file->Rcd_Ses_Upl_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/recordingsession/filedelete', 'id' => $uploaded_file->Rcd_Ses_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>