<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'soundCar-subtitle-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Sound_Car_Id', array('value' => $sound_car_model->Sound_Car_Id));
    ?>
    <div class="box-body">
        <?php if (!$model->isNewRecord) { ?>
            <div class="col-lg-12 col-md-12">
                <div class="row mb10">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;New Subtitle', array("/site/soundcarrier/update", 'id' => $sound_car_model->Sound_Car_Id, 'tab' => '4'), array('class' => 'btn btn-success pull-right')) ?>
                </div>
            </div>
        <?php } ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Subtitle_Name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Sound_Car_Subtitle_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Sound_Car_Subtitle_Name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Subtitle_Type_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Sound_Car_Subtitle_Type_Id', $types, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Sound_Car_Subtitle_Type_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Sound_Car_Subtitle_Language_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Sound_Car_Subtitle_Language_Id', $languages, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Sound_Car_Subtitle_Language_Id'); ?>
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
$sub_titles = SoundCarrierSubtitle::model()->findAll('Sound_Car_Id = :soundCar_id', array(':soundCar_id' => $sound_car_model->Sound_Car_Id));
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
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Subtitle_Name') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Subtitle_Type_Id') ?></th>
                        <th><?php echo $model->getAttributeLabel('Sound_Car_Subtitle_Language_Id') ?></th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Updated By</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($sub_titles as $key => $sub_title) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $sub_title->Sound_Car_Subtitle_Name ?></td>
                            <td><?php echo $sub_title->soundCarSubtitleType->Subtitle_Name ?></td>
                            <td><?php echo $sub_title->soundCarSubtitleLanguage->Lang_Name ?></td>
                            <td><?php echo $sub_title->createdBy->name ?></td>
                            <td><?php echo $sub_title->Created_Date ?></td>
                            <td><?php echo $sub_title->updatedBy->name ?></td>
                            <td><?php echo $sub_title->Rowversion ?></td>
                            <td>
                                <?php
                                echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/soundcarrier/update' , 'id' => $sound_car_model->Sound_Car_Id , 'tab' => 4, 'edit' => $sub_title->Sound_Car_Subtitle_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/soundcarrier/subtitledelete' , 'id' => $sub_title->Sound_Car_Subtitle_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>