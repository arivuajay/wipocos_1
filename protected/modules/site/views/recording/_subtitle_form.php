<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'recording-subtitle-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Rcd_Id', array('value' => $recording_model->Rcd_Id));
    ?>
    <div class="box-body">

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Subtitle_Name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Rcd_Subtitle_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Rcd_Subtitle_Name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Subtitle_Type_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Rcd_Subtitle_Type_Id', $types, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Rcd_Subtitle_Type_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Subtitle_Language_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Rcd_Subtitle_Language_Id', $languages, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Rcd_Subtitle_Language_Id'); ?>
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
$sub_titles = RecordingSubtitle::model()->findAll('Rcd_Id = :recording_id', array(':recording_id' => $recording_model->Rcd_Id));
if (!empty($sub_titles)) {
    ?>
    <div class="box box-success">
        <div class="box-header">
            <h4 class="box-title">Sub Titles</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo $model->getAttributeLabel('Rcd_Subtitle_Name') ?></th>
                        <th><?php echo $model->getAttributeLabel('Rcd_Subtitle_Type_Id') ?></th>
                        <th><?php echo $model->getAttributeLabel('Rcd_Subtitle_Language_Id') ?></th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($sub_titles as $key => $sub_title) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $sub_title->Rcd_Subtitle_Name ?></td>
                            <td><?php echo $sub_title->rcdSubtitleType->Type_Name ?></td>
                            <td><?php echo $sub_title->rcdSubtitleLanguage->Lang_Name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/recording/update/id/' . $recording_model->Rcd_Id . '/tab/2/edit/' . $sub_title->Rcd_Subtitle_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/recording/subtitledelete/id/' . $sub_title->Rcd_Subtitle_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>