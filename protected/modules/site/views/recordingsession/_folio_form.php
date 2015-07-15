<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'recording-session-folio-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Rcd_Ses_Id', array('value' => $record_ses_model->Rcd_Ses_Id));
    ?>
    <div class="box-body">
        <?php if (!$model->isNewRecord) { ?>
            <div class="col-lg-12 col-md-12">
                <div class="row mb10">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;New Folio', array("/site/recordingsession/update", 'id' => $record_ses_model->Rcd_Ses_Id, 'tab' => '6'), array('class' => 'btn btn-success pull-right')) ?>
                </div>
            </div>
        <?php } ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Ses_Folio_Name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Rcd_Ses_Folio_Name', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Rcd_Ses_Folio_Name'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<?php
$folios = RecordingSessionFolio::model()->findAll('Rcd_Ses_Id = :soundCar_id', array(':soundCar_id' => $record_ses_model->Rcd_Ses_Id));
if (!empty($folios)) {
    ?>
    <div class="box box-success">
        <div class="box-header">
            <h4 class="box-title">Folio</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo $model->getAttributeLabel('Rcd_Ses_Folio_Name') ?></th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($folios as $key => $folio) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $folio->Rcd_Ses_Folio_Name ?></td>
                            <td><?php echo $folio->createdBy->name ?></td>
                            <td><?php echo $folio->updatedBy->name ?></td>
                            <td>
                                <?php
                                echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/recordingsession/update' , 'id' => $record_ses_model->Rcd_Ses_Id , 'tab' => 6, 'foledit' => $folio->Rcd_Ses_Folio_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/recordingsession/foliodelete' , 'id' => $folio->Rcd_Ses_Folio_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>