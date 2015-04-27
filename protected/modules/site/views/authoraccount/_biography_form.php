<?php 
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
?>

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'author-biography-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Auth_Acc_Id', array('value' => $author_model->Auth_Acc_Id));
    $groups = Group::model()->findAll('Group_Is_Author = :author', array(':author' => '1'));
    $group_ids = !$model->isNewRecord ? CHtml::listData($author_model->groupMembers,'Group_Member_Id','Group_Id') : array();
    ?>
    <div class="box-body">
         <div class="form-group">
            <label for="base_table_search" class="col-sm-2 control-label required">Search</label>                    
            <div class="col-sm-5">
                <input type="text" id="base_table_search" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="GroupMembers_Group_Id" class="col-sm-2 control-label">Groups </label>
            <div class="col-sm-5" style="max-height: 200px; overflow-y: scroll">
                <table class="table table-bordered table-datatable">
                    <thead>
                    <tr>
                        <th style="width: 10px"><?php echo CHtml::checkBox('group_id', false, array('id' => 'group_id'))?></th>
                        <th>Group Name</th>
                        <th>Code</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($groups as $key => $group) {?>
                    <tr>
                        <?php $checked = (!empty($group_ids) && in_array($group->Group_Id, $group_ids)) ? 'checked' : '';?>
                        <td><input type="checkbox" class="group_ids" name="group_ids[<?php echo $group->Group_Id?>]" value="<?php echo $group->Group_Id?>" <?php echo $checked?> /></td>
                        <td><?php echo $group->Group_Name?></td>
                        <td><?php echo $group->Group_Internal_Code?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Auth_Biogrph_Annotation', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textArea($model, 'Auth_Biogrph_Annotation', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'Auth_Biogrph_Annotation'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('id' => 'member-submit', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
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
        
        $('#member-submit').click(function(ev) {
            $("#base_table_search").val('').trigger("keyup");
            return true;
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_bio_form', $js);
?>