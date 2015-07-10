<div class="box box-primary">
    <?php
    $sound_car_id = $sound_car_model->Sound_Car_Id;
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-rightholder-search-form',
        'action' => $this->createUrl('/site/soundcarrier/update', array('id' => $sound_car_model->Sound_Car_Id, 'tab' => '7')),
        'method' => 'get',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'onsubmit' => "return false;"),
    ));
    ?>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Search</h3>
                </div>
                <div class="box-body">
                    <p class="help-inline">Enter the begin of the name or internal code or one of the following criteria:</p>
                    <div class="col-lg-6">
                        <div class="box-body">
                            <div class="form-group">
                                <?php echo CHtml::label('Work', '', array('class' => 'control-label')); ?>&nbsp;
                                <?php echo CHtml::checkBox('is_work', ($_REQUEST['is_work'] == 1), array('class' => 'form-control', 'id' => 'is_work')); ?>&nbsp;&nbsp;
                                <div id="chkbox_err" class="errorMessage hide">Select Work</div>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::label('Search', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('searach_text', $_REQUEST['fn'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::button('Search', array('class' => 'btn btn-success', 'name' => 'rght_holder', 'id' => 'search_button')); ?>
                                <?php // echo CHtml::resetButton('Clear', array('class' => 'btn btn-primary')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-rightholder-search-form',
        'action' => $this->createUrl('/site/soundcarrier/update', array('id' => $sound_car_model->Sound_Car_Id, 'tab' => '7')),
        'method' => 'get',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'onsubmit' => "return false;"),
    ));
    ?>
    <div id="search_right_result">
        <?php // $this->renderPartial('_search_right', compact('authusers', 'publusers')); ?>
    </div>
    <?php $this->endWidget(); ?>

    <div class="row hide" id="link-performer-div">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <div class="box-header">
                        <h3 class="box-title">Performers</h3>
                    </div>
                    <?php
                    $rightholders = PerformerAccount::model()->findAll();
                    ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="base_table_search" class="control-label required">Search</label>
                            <div>
                                <input type="text" id="base_table_search" class="form-control" style="width: 50%">
                            </div>
                        </div>
                    </div>

                    <div class="box-body" style="max-height: 300px; overflow-y: scroll">
                        <div class="form-group">
                            <table class="table table-striped table-bordered table-datatable selectable" id="link-performer">
                                <thead>
                                    <th>Rightholder Name</th>
                                    <th>Internal Code</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($rightholders)) {
                                        foreach ($rightholders as $key => $rightholder) {
                                            ?>
                                            <tr data-uid="<?php echo $rightholder->Perf_GUID ?>" data-name="<?php echo $rightholder->fullname ?>" data-intcode = "<?php echo $rightholder->Perf_Internal_Code ?>">
                                                <td><?php echo $rightholder->fullname; ?></td>
                                                <td><?php echo $rightholder->Perf_Internal_Code; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr id='norecord_tr'><td colspan='8'>No data created</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <?php echo CHtml::button('Add', array('class' => 'btn btn-primary', 'id' => 'add-performer', 'disabled' => true)); ?>
                            <?php // echo CHtml::resetButton('Clear', array('class' => 'btn btn-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <?php echo CHtml::form(array('/site/soundcarrier/insertright'), 'post', array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'right_form')) ?>
                    <div class="box-header">
                        <h3 class="box-title">Linked Rightholders</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered" id="linked-holders">
                            <thead>
                            <th>Work</th>
                            <th>Rightholder Name</th>
                            <th>Internal Code</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if (!empty($exists_model)) {
                                    foreach ($exists_model as $rightholder) {
                                        ?>
                                        <tr data-uid="<?php echo $rightholder->rightholderPerformer->Perf_GUID ?>" data-name="<?php echo $rightholder->rightholderPerformer->fullname ?>" data-intcode="<?php echo $rightholder->rightholderPerformer->Perf_Internal_Code ?>" data-work_uid="<?php echo $rightholder->rightholderWork->Work_GUID ?>">
                                            <td><?php echo $rightholder->rightholderWork->Work_Org_Title; ?></td>
                                            <td><?php echo $rightholder->rightholderPerformer->fullname; ?></td>
                                            <td><?php echo $rightholder->rightholderPerformer->Perf_Internal_Code; ?></td>
                                            <td>
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', 'javascript:void(0)', array('class' => "row-delete")); ?>
                                            </td>
                                            <td class="hide">
                                                <?php
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$i}][Sound_Car_Id]", $rightholder->Sound_Car_Id);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$i}][Sound_Car_Right_Work_GUID]", $rightholder->Sound_Car_Right_Work_GUID);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$i}][Sound_Car_Right_Acc_GUID]", $rightholder->Sound_Car_Right_Acc_GUID);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$i}][Sound_Car_Work_Type]", 'W');
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    $i++;
                                    }
                                } else {
                                    echo "<tr id='norecord_tr'><td colspan='8'>No data created</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary', 'id' => 'right_ajax_submit', 'disabled' => true)) ?>
                            </div>
                        </div>
                    </div>
                    <div class="overlay loader"></div>
                    <div class="loading-img loader"></div>
                    <?php echo CHtml::endForm(); ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
$search_url = Yii::app()->createAbsoluteUrl("site/soundcarrier/searchworks");

$js = <<< EOD
    $(document).ready(function() {
        key = $i;
        $('#search_button').on("click", function(){
            if($("#is_work").is(':checked') == false && $("#is_publ").is(':checked') == false){
                $("#chkbox_err").removeClass("hide");
                return false;
            }
            var data=$("#work-rightholder-search-form").serialize();
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:data,
                success:function(data){
                    $('#SoundCarrierRightholder_Sound_Car_Member_GUID').val('');
                    $("#search_right_result").html(data);
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });
        
        $('body').on('click','#work_search tr, #link-performer tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
        });
        $('body').on('click','#work_search tr', function(){
            $("#link-performer-div").removeClass('hide');
        });
        $('body').on('click','#link-performer tr', function(){
            $("#add-performer").attr('disabled', false);
        });
        
        $("#add-performer").on('click', function(){
            _performer = $("#link-performer tbody").find('.highlight');
            uid = _performer.data('uid');
            name = _performer.data('name');
            intcode = _performer.data('intcode');
            work_uid = $("#work_search tbody").find('.highlight').data('uid');
            work_name = $("#work_search tbody").find('.highlight').data('name');

            //Check already exists and not empty
            chk = $('#linked-holders tr[data-uid="'+uid+'"][data-work_uid="'+work_uid+'"]').length;
            if(chk != 0){
                alert(name+" already assigned to "+work_name + '!!!');
                return false;
            }
            if(uid == null){
                alert("No Performer selected !!!");
                return false;
            }
            //end
            
            $("#linked-holders #norecord_tr").remove();
            $("#link-performer").removeClass('highlight');
            _tr = '<tr data-uid="'+uid+'" data-name="'+name+'" data-intcode="'+intcode+'" data-work_uid="'+work_uid+'">';
            _tr += '<td>'+work_name+'</td>';
            _tr += '<td>'+name+'</td>';
            _tr += '<td>'+intcode+'</td>';
            _tr += '<td><a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a></td>';
            _tr += '<td class="hide">';
            _tr += '<input type="hidden" name="SoundCarrierRightholder['+key+'][Sound_Car_Id]" value="$sound_car_id" />';
            _tr += '<input type="hidden" name="SoundCarrierRightholder['+key+'][Sound_Car_Right_Work_GUID]" value="'+work_uid+'" />';
            _tr += '<input type="hidden" name="SoundCarrierRightholder['+key+'][Sound_Car_Right_Acc_GUID]" value="'+uid+'" />';
            _tr += '<input type="hidden" name="SoundCarrierRightholder['+key+'][Sound_Car_Work_Type]" value="W" />';
            _tr += '</td>';

            _tr += "</tr>";
            $('#linked-holders tbody').append(_tr);
            _performer.removeClass('highlight');
            $("#add-performer").attr('disabled', true);
            checkSave();
            key++;
        });
        
        $('body').on('click','#linked-holders .row-delete', function(){
            _tr = $(this).closest('tr');
            $('#link-performer tr[data-intcode="'+_tr.data('intcode')+'"]').removeClass('hide');
            _tr.remove();
            checkSave();
        });
        
        
    });
        
    function checkSave(){
        _count = $("#linked-holders tbody tr").length;
        $("#right_ajax_submit").attr("disabled", _count == 0);
    }
        
EOD;
Yii::app()->clientScript->registerScript('_right_form', $js);
?>