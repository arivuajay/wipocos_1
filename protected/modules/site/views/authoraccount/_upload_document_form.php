

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'author-upload-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => false,
    ));
    echo $form->hiddenField($model, 'Auth_Acc_Id', array('value' => $author_model->Auth_Acc_Id));
    ?>

    <div class="box-body">

        <?php if (!$model->isNewRecord) { ?>
            <div class="col-lg-12 col-md-12">
                <div class="row mb10">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;New upload', array("/site/authoraccount/update/id/{$author_model->Auth_Acc_Id}/tab/8"), array('class' => 'btn btn-success pull-right')) ?>
                    <!--<a href="/wipocos1/branches/dev/site/authoraccount/create" class="btn btn-success pull-right">Create Author</a>-->    
                </div>
            </div>
        <?php } ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Auth_Upl_Doc_Name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Auth_Upl_Doc_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Auth_Upl_Doc_Name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Auth_Upl_File', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->fileField($model, 'Auth_Upl_File', array()); ?>
                <?php echo $form->error($model, 'Auth_Upl_File'); ?>
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
$uploaded_files = AuthorUpload::model()->findAll('Auth_Acc_Id = :acc_id', array(':acc_id' => $author_model->Auth_Acc_Id));
if (!empty($uploaded_files)) {
    ?>
    <div class="box">
        <div class="box-header">
            <h4 class="box-title">Uploaded Files</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Document Name</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $uploaded_file->Auth_Upl_Doc_Name ?></td>
                            <td>
                                <?php
                                $file_path = $uploaded_file->getFilePath();
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/authoraccount/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-eye"></i>', $file_path, array('target' => '_blank', 'title' => 'View'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/authoraccount/update/id/' . $author_model->Auth_Acc_Id . '/tab/8/fileedit/' . $uploaded_file->Auth_Upl_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/authoraccount/filedelete/id/' . $uploaded_file->Auth_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>