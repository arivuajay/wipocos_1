<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'recording-link-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Rcd_Id', array('value' => $recording_model->Rcd_Id));
    $performers = Myclass::getPerformer();
    $producers = Myclass::getProducer();
    
    ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Link_Title', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Rcd_Link_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Rcd_Link_Title'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Perf_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Rcd_Perf_Id', $performers, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Rcd_Perf_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rcd_Prod_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model, 'Rcd_Prod_Id', $producers, array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Rcd_Prod_Id'); ?>
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
$links = RecordingLink::model()->findAll('Rcd_Id = :recording_id', array(':recording_id' => $recording_model->Rcd_Id));
if (!empty($links)) {
    ?>
    <div class="box box-success">
        <div class="box-header">
            <h4 class="box-title">Artists - Producers</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo $model->getAttributeLabel('Rcd_Link_Title') ?></th>
                        <th><?php echo $model->getAttributeLabel('Rcd_Perf_Id') ?></th>
                        <th><?php echo $model->getAttributeLabel('Rcd_Prod_Id') ?></th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($links as $key => $link) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $link->Rcd_Link_Title ?></td>
                            <td><?php echo $link->rcdPerf->Perf_First_Name.' '.$link->rcdPerf->Perf_Sur_Name ?></td>
                            <td><?php echo $link->rcdProd->Pro_Corporate_Name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/recording/update/id/' . $recording_model->Rcd_Id . '/tab/5/edit_link/' . $link->Rcd_Link_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/recording/linkdelete/id/' . $link->Rcd_Link_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>