<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'publisher-biography-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pub_Acc_Id', array('value' => $publisher_model->Pub_Acc_Id));
    $groups = PublisherGroup::model()->findAll('Pub_Group_Is_Publisher = :publisher', array(':publisher' => '1'));
    $group_ids = !$model->isNewRecord ? CHtml::listData($publisher_model->publisherGroupMembers, 'Pub_Group_Member_Id', 'Pub_Group_Id') : array();
    ?>
    <div class="box-body">

        <div class="form-group">
            <label for="GroupMembers_Pub_Group_Id" class="col-sm-2 control-label">Groups </label>
            <div class="col-sm-5" style="max-height: 200px; overflow-y: scroll">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px"><?php echo CHtml::checkBox('group_id', false, array('id' => 'group_id')) ?></th>
                        <th>Group Name</th>
                        <th>Code</th>
                    </tr>
                    <?php foreach ($groups as $key => $group) { ?>
                        <tr>
                            <?php $checked = (!empty($group_ids) && in_array($group->Pub_Group_Id, $group_ids)) ? 'checked' : ''; ?>
                            <td><input type="checkbox" class="group_ids" name="group_ids[<?php echo $group->Pub_Group_Id?>]" value="<?php echo $group->Pub_Group_Id?>" <?php echo $checked?> /></td>
                            <td><?php echo $group->Pub_Group_Name ?></td>
                            <td><?php echo $group->Pub_Group_Internal_Code ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Managers', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Pub_Managers', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Pub_Managers'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Biogrph_Annotation', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textArea($model, 'Pub_Biogrph_Annotation', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'Pub_Biogrph_Annotation'); ?>
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
$js = <<< EOD
    $(document).ready(function() {
        $('#group_id').on('ifChecked', function(event){
            $('.group_ids').iCheck('check');
        });
        $('#group_id').on('ifUnchecked', function(event){
            $('.group_ids').iCheck('uncheck');
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_bio_form', $js);
?>