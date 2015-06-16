<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-subtitle-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Work_Id', array('value' => $work_model->Work_Id));
    ?>
    <div class="box-body">

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Subtitle_Name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Work_Subtitle_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Work_Subtitle_Name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Subtitle_Type_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Work_Subtitle_Type_Id', $types, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Work_Subtitle_Type_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Work_Subtitle_Language_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Work_Subtitle_Language_Id', $languages, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Work_Subtitle_Language_Id'); ?>
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
$sub_titles = WorkSubtitle::model()->findAll('Work_Id = :work_id', array(':work_id' => $work_model->Work_Id));
if (!empty($sub_titles)) {
    ?>
    <div class="box box-success">
        <div class="box-header">
            <h4 class="box-title">Sub Titles</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo $model->getAttributeLabel('Work_Subtitle_Name') ?></th>
                        <th><?php echo $model->getAttributeLabel('Work_Subtitle_Type_Id') ?></th>
                        <th><?php echo $model->getAttributeLabel('Work_Subtitle_Language_Id') ?></th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($sub_titles as $key => $sub_title) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $sub_title->Work_Subtitle_Name ?></td>
                            <td><?php echo $sub_title->workSubtitleType->Type_Name ?></td>
                            <td><?php echo $sub_title->workSubtitleLanguage->Lang_Name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/work/update/id/' . $work_model->Work_Id . '/tab/2/edit/' . $sub_title->Work_Subtitle_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/work/subtitledelete/id/' . $sub_title->Work_Subtitle_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>