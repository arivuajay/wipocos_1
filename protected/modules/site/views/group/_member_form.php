<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'group-member-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));

    if($group_model->Group_Is_Author == '1'){
        $users = AuthorAccount::model()->isActive()->findAll();
    }elseif($group_model->Group_Is_Performer == '1'){
        $users = PerformerAccount::model()->isActive()->findAll();
    }

    $user_ids = CHtml::listData($group_model->groupMembers, 'Group_Member_Id', 'Group_Member_Internal_Code');
    ?>
    <div class="box-body">

        <div class="form-group">
            <label for="GroupMembers_Group_Id" class="col-sm-2 control-label">Members </label>
            <div class="col-sm-5" style="max-height: 200px; overflow-y: scroll">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px"><?php echo CHtml::checkBox('user_id', false, array('id' => 'user_id'))?></th>
                        <th>Group Name</th>
                        <th>Code</th>
                    </tr>
                    <?php if($group_model->Group_Is_Author == '1'){
                        foreach ($users as $key => $user) { ?>
                    <tr>
                        <?php $checked = (!empty($user_ids) && in_array($user->Auth_Internal_Code, $user_ids)) ? 'checked' : '';?>
                        <td><input type="checkbox" class="user_ids" name="user_ids[<?php echo $user->Auth_Internal_Code?>]" value="<?php echo $user->Auth_Internal_Code?>" <?php echo $checked?> /></td>
                        <td><?php echo $user->Auth_First_Name ?></td>
                        <td><?php echo $user->Auth_Internal_Code  ?></td>
                    </tr>
                    <?php } } ?>
                    <?php if($group_model->Group_Is_Performer == '1'){
                        foreach ($users as $key => $user) { ?>
                    <tr>
                        <?php $checked = (!empty($user_ids) && in_array($user->Perf_Internal_Code, $user_ids)) ? 'checked' : '';?>
                        <td><input type="checkbox" class="user_ids" name="user_ids[<?php echo $user->Perf_Internal_Code?>]" value="<?php echo $user->Perf_Internal_Code?>" <?php echo $checked?> /></td>
                        <td><?php echo $user->Perf_First_Name ?></td>
                        <td><?php echo $user->Perf_Internal_Code  ?></td>
                    </tr>
                    <?php } } ?>
                </table>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($group_model->isNewRecord ? 'Create' : 'Update', array('class' => $group_model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','name'=>'GroupMembers[submit]')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
<?php
$js = <<< EOD
    $(document).ready(function() {
        $('#user_id').on('ifChecked', function(event){
            $('.user_ids').iCheck('check');
        });
        $('#user_id').on('ifUnchecked', function(event){
            $('.user_ids').iCheck('uncheck');
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_bio_form', $js);
?>