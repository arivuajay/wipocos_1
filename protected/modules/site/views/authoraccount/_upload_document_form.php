<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'author-upload-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Auth_Acc_Id', array('value' => $author_model->Auth_Acc_Id));
    ?>

    <div class="box-body">

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
                        <th align="center">View</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <td><?php echo $key+1?>.</td>
                            <td><?php echo $uploaded_file->Auth_Upl_Doc_Name?></td>
                            <td>
                                <?php echo CHtml::link('<i class="fa fa-eye"></i>', $uploaded_file->getFilePath(), array('target' => '_blank', 'title' => 'View'));?>
                            </td>
                            <td>
                                <?php echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/authoraccount/update/id/'.$author_model->Auth_Acc_Id.'/tab/8/fileedit/'.$uploaded_file->Auth_Upl_Id), array('title' => 'Edit'));?>
                                <?php echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/authoraccount/filedelete/id/'.$uploaded_file->Auth_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
<?php
}?>