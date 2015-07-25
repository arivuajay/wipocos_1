<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-sub-publishing-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Work_Id', array('value' => $work_model->Work_Id));
    $main_publisher = (new WorkRightholder)->getMainPublisher($work_model->Work_Id);
    $sub_publisher = (new WorkRightholder)->getSubPublisher($work_model->Work_Id);
    ?>
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-3 control-label required">Original Publisher</label>
            <div class="col-sm-2">
                <?php echo CHtml::textField('Pub_Internal_Code', $main_publisher->workPublisher->Pub_Internal_Code, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
            <div class="col-sm-3">
                <?php echo CHtml::textField('Pub_Corporate_Name', $main_publisher->workPublisher->Pub_Corporate_Name, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label required">Performance/Broadcast</label>
            <div class="col-sm-2">
                <?php echo CHtml::textField('Work_Right_Broad_Share', $main_publisher->Work_Right_Broad_Share, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
            <label class="col-sm-1 control-label required">Mechanical</label>
            <div class="col-sm-2">
                <?php echo CHtml::textField('Work_Right_Mech_Share', $main_publisher->Work_Right_Mech_Share, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>
        <hr />
        <div class="form-group">
            <label class="col-sm-3 control-label required">Sub-Publisher</label>
            <div class="col-sm-2">
                <?php echo CHtml::textField('Pub_Internal_Code', $sub_publisher->workPublisher->Pub_Internal_Code, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
            <div class="col-sm-3">
                <?php echo CHtml::textField('Pub_Corporate_Name', $sub_publisher->workPublisher->Pub_Corporate_Name, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label required">Performance/Broadcast</label>
            <div class="col-sm-2">
                <?php echo CHtml::textField('Work_Right_Broad_Share', $sub_publisher->Work_Right_Broad_Share, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
            <label class="col-sm-1 control-label required">Mechanical</label>
            <div class="col-sm-2">
                <?php echo CHtml::textField('Work_Right_Mech_Share', $sub_publisher->Work_Right_Mech_Share, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>
        </div>
        <hr />
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Contact_Start', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_Contact_Start', array('class' => 'form-control date')); ?>
                <?php echo $form->error($model, 'Work_Sub_Contact_Start'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Contact_End', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_Contact_End', array('class' => 'form-control date')); ?>
                <?php echo $form->error($model, 'Work_Sub_Contact_End'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Territories', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php
                $selected = $model->getTerritoryselected();
                ?>
                <?php echo $form->dropDownList($model, 'Work_Sub_Territories', $territories, array('class' => 'form-control', 'multiple' => true, 'options' => $selected)); ?>
                <?php echo $form->error($model, 'Work_Sub_Territories'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Clause', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->radioButtonList($model, 'Work_Sub_Clause', Myclass::getClause(), array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Work_Sub_Clause'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Sign_Date', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php
                if ($model->isNewRecord) {
                    $sign_date = date('Y-m-d');
                } else {
                    $sign_date = $model->Work_Sub_Sign_Date;
                }
                ?>
                <?php echo $form->textField($model, 'Work_Sub_Sign_Date', array('class' => 'form-control date', 'value' => $sign_date)); ?>
                <?php echo $form->error($model, 'Work_Sub_Sign_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_File', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Work_Sub_File'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_Catelog_Number', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_Catelog_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Work_Sub_Catelog_Number'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Sub_References', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_References', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Work_Sub_References'); ?>
            </div>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Work_Sub_Tacit', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->checkBox($model, 'Work_Sub_Tacit', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                <?php echo $form->error($model, 'Work_Sub_Tacit'); ?>
            </div>
        </div>

        <div class="form-group hide">
            <?php echo $form->labelEx($model, 'Work_Sub_Renewal_Period', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Sub_Renewal_Period', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Work_Sub_Renewal_Period'); ?>
            </div>
        </div>

    </div>
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<?php
if (!$model->isNewRecord) {
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sub-publishing-upload-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => false,
    ));
    echo $form->hiddenField($upload_model, 'Work_Sub_Id', array('value' => $model->Work_Sub_Id));
    ?>

    <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title">Contract Upload</h4>
        </div>
        <div class="box-body">
            <?php if (!$upload_model->isNewRecord) { ?>
                <div class="col-lg-12 col-md-12">
                    <div class="row mb10">
                        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;New upload', array("/site/work/update/id/{$work_model->Work_Id}/tab/5"), array('class' => 'btn btn-success pull-right')) ?>
                    </div>
                </div>
            <?php } ?>

            <div class="form-group">
                <?php echo $form->labelEx($upload_model, 'Work_Sub_Upl_Name', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo $form->textField($upload_model, 'Work_Sub_Upl_Name', array('class' => 'form-control')); ?>
                    <?php echo $form->error($upload_model, 'Work_Sub_Upl_Name'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($upload_model, 'Work_Sub_Upl_File', array('class' => 'col-sm-2 control-label', 'label' => "{$upload_model->getAttributeLabel('Work_Sub_Upl_File')} *")); ?>
                <div class="col-sm-5">
                    <?php echo $form->fileField($upload_model, 'Work_Sub_Upl_File', array()); ?>
                    <?php echo $form->error($upload_model, 'Work_Sub_Upl_File'); ?>
                </div>
            </div>
            <div class="help-block col-sm-offset-2">
                <span><strong>Note:</strong> Only files with these extensions are allowed: <?php echo WorkSubPublishingUploads::ACCESS_TYPE?></span>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($upload_model, 'Work_Sub_Upl_Description', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo $form->textArea($upload_model, 'Work_Sub_Upl_Description', array('class' => 'form-control')); ?>
                    <?php echo $form->error($upload_model, 'Work_Sub_Upl_Description'); ?>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-0 col-sm-offset-2">
                    <?php echo CHtml::submitButton($upload_model->isNewRecord ? 'Save' : 'Update', array('class' => $upload_model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    $this->endWidget();
}
?>

<?php
$uploaded_files = WorkSubPublishingUploads::model()->findAll('Work_Sub_Id = :sub_id', array(':sub_id' => $model->Work_Sub_Id));
if (!empty($uploaded_files)) {
    ?>
    <div class="box box-success">
        <div class="box-header">
            <h4 class="box-title">Contract Files</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $uploaded_file->Work_Sub_Upl_Name ?></td>
                            <td><?php echo $uploaded_file->Work_Sub_Upl_Description ?></td>
                            <td>
                                <?php
                                $file_path = $uploaded_file->getFilePath();
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/work/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-eye"></i>', $file_path, array('target' => '_blank', 'title' => 'View'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/work/update' , 'id' => $work_model->Work_Id , 'tab' => '6', 'fileedit' => $uploaded_file->Work_Sub_Upl_Id, 'umodel' => 'sub'), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/work/filedelete/', 'id' => $uploaded_file->Work_Sub_Upl_Id, 'delete_model' => 'WorkSubPublishingUploads', 'rel_model' => 'workSub', 'tab' => 6), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
<?php }
?>


<?php
$js = <<< EOD
    $(document).ready(function(){
        $('#WorkSubPublishing_Work_Sub_Clause').find("br").remove();
    });
EOD;
Yii::app()->clientScript->registerScript('_sub_sub_form', $js);
?>