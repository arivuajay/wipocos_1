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
        'id' => 'publisher-group-member-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));

    if ($group_model->Pub_Group_Is_Publisher == '1') {
        $users = PublisherAccount::model()->isActive()->findAll();
    } elseif ($group_model->Pub_Group_Is_Producer == '1') {
//        $users = ProducerAccount::model()->isActive()->findAll();
    }

    $user_ids = CHtml::listData($group_model->publisherGroupMembers, 'Pub_Group_Member_Id', 'Pub_Group_Member_Internal_Code');
    ?>
    <div class="box-body">
        <div class="form-group">
            <label for="base_table_search" class="col-sm-2 control-label required">Search</label>                    
            <div class="col-sm-5">
                <input type="text" id="base_table_search" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="GroupMembers_Pub_Group_Id" class="col-sm-2 control-label">Members </label>
            <div class="col-sm-5" style="max-height: 300px; overflow-y: scroll">
                <table class="table table-bordered table-datatable">
                    <thead>
                    <tr>
                        <th style="width: 10px"><?php echo CHtml::checkBox('user_id', false, array('id' => 'user_id')) ?></th>
                        <th>Corporate Name</th>
                        <th>Internal Code</th>
                    </tr>
                    </thead>
                    <?php
                    if ($group_model->Pub_Group_Is_Publisher == '1') {
                        foreach ($users as $key => $user) {
                            ?>
                            <tr>
                                <?php $checked = (!empty($user_ids) && in_array($user->Pub_Internal_Code, $user_ids)) ? 'checked' : ''; ?>
                                <td><input type="checkbox" class="user_ids" name="user_ids[<?php echo $user->Pub_Internal_Code ?>]" value="<?php echo $user->Pub_Internal_Code ?>" <?php echo $checked ?> /></td>
                                <td><?php echo $user->Pub_Corporate_Name ?></td>
                                <td><?php echo $user->Pub_Internal_Code ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    <tbody>
                    <?php
                    if ($group_model->Pub_Group_Is_Producer == '1') {
                        foreach ($users as $key => $user) {
                            ?>
<!--                            <tr>
                                <?php $checked = (!empty($user_ids) && in_array($user->Perf_Internal_Code, $user_ids)) ? 'checked' : ''; ?>
                                <td><input type="checkbox" class="user_ids" name="user_ids[<?php echo $user->Perf_Internal_Code ?>]" value="<?php echo $user->Perf_Internal_Code ?>" <?php echo $checked ?> /></td>
                                <td><?php echo $user->Perf_First_Name ?></td>
                                <td><?php echo $user->Perf_Internal_Code ?></td>
                            </tr>-->
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($group_model->isNewRecord ? 'Create' : 'Update', array('id' => 'member-submit', 'class' => $group_model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'GroupMembers[submit]')); ?>
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

        $('#member-submit').click(function(ev) {
            $("#base_table_search").val('').trigger("keyup");
            return true;
        });

    });
EOD;
Yii::app()->clientScript->registerScript('_bio_form', $js);
?>