<div class="box box-primary">
    <?php
    $sound_car_id = $sound_car_model->Sound_Car_Id;
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'record-rightholder-search-form-rec-2',
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
                                <?php echo CHtml::label('Record', '', array('class' => 'control-label')); ?>&nbsp;
                                <?php echo CHtml::checkBox('is_record', ($_REQUEST['is_record'] == 1), array('class' => 'form-control', 'id' => 'is_record')); ?>&nbsp;&nbsp;
                                <div id="chkbox_err_rec" class="errorMessage hide">Select Record</div>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::label('Search', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('searach_text', $_REQUEST['fn'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::button('Search', array('class' => 'btn btn-success', 'name' => 'rght_holder', 'id' => 'search_button_rec')); ?>
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
        'id' => 'record-rightholder-search-form-rec',
        'action' => $this->createUrl('/site/soundcarrier/update', array('id' => $sound_car_model->Sound_Car_Id, 'tab' => '7')),
        'method' => 'get',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'onsubmit' => "return false;"),
    ));
    ?>
    <div id="search_right_result_rec">
        <?php // $this->renderPartial('_search_right', compact('authusers', 'publusers')); ?>
    </div>
    <?php $this->endWidget(); ?>

    <div class="row hide" id="link-performer-rec-div">

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
                        <table class="table table-striped table-bordered" id="linked-holders-rec">
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
                                        <tr data-uid="<?php echo $rightholder->rightholderPerformer->Perf_GUID ?>" data-name="<?php echo $rightholder->rightholderPerformer->fullname ?>" data-intcode="<?php echo $rightholder->rightholderPerformer->Perf_Internal_Code ?>" data-record_uid="<?php echo $rightholder->rightholderRecord->Rcd_GUID ?>">
                                            <td><?php echo $rightholder->rightholderRecord->Rcd_Title; ?></td>
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
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$i}][Sound_Car_Work_Type]", 'R');
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                } else {
                                    echo "<tr id='norecord_tr_rec'><td colspan='8'>No data created</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary', 'id' => 'right_ajax_submit_rec', 'disabled' => true)) ?>
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
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'rightperformerModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Performer</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="rightperformertable_base_table_search" class="control-label required">Search</label>
        <div>
            <input type="text" id="rightperformertable_base_table_search" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div style="max-height: 300px; overflow-y: scroll">
            <table class="table table-bordered selectable" id="rightperformertable">
                <thead>
                    <tr>
                        <th>Corporate Name</th>
                        <th>Internal Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = PerformerAccount::model()->findAll();
                    foreach ($users as $key => $user) {
                        ?>
                        <tr data-uid="<?php echo $user->Perf_GUID ?>" data-name="<?php echo $user->fullname ?>" data-intcode = "<?php echo $user->Perf_Internal_Code ?>">
                            <td><?php echo $user->fullname; ?></td>
                            <td><?php echo $user->Perf_Internal_Code; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>

<div class="modal-footer">
    <p class="errorMessage text-center col-sm-8" id="pro-modelerror"></p>
    <?php
    $this->widget(
            'booster.widgets.TbButton', array(
        'context' => 'primary',
        'label' => 'Set Performer',
        'url' => '#',
        'htmlOptions' => array(
            'id' => 'new_performer_add',
            'onclick' => '{    
                    _row = $("#rightperformertable").find(".highlight");
                    if(_row.length == 0){
                        $("#pro-modelerror").html("Select Alteast one Performer");
                    }else{
                        $("#temp_click_new_performer").trigger("click");
                    }
                }'
        ),
            )
    );
    ?>
    <?php
    $this->widget(
            'booster.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'performer-dismiss'),
            )
    );
    ?>
    <a id="temp_click_new_performer" class="hide">Click me !!!!!</a>
</div>

<?php $this->endWidget(); ?>


<?php
$search_url = Yii::app()->createAbsoluteUrl("site/soundcarrier/searchrecords");
$search_performer_url = Yii::app()->createAbsoluteUrl("site/soundcarrier/searchrecordperformers");

$js = <<< EOD
    $(document).ready(function() {
        key = $i;
        $('#search_button_rec').on("click", function(){
            if($("#is_record").is(':checked') == false && $("#is_publ").is(':checked') == false){
                $("#chkbox_err_rec").removeClass("hide");
                return false;
            }
            var data=$("#record-rightholder-search-form-rec-2").serialize();
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:data,
                success:function(data){
                    $('#SoundCarrierRightholder_Sound_Car_Member_GUID').val('');
                    $("#search_right_result_rec").html(data);
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });
        
        $('body').on('click','#record_search tr, #link-performer-rec tr, #rightperformertable tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
        });
        $('body').on('click','#record_search tbody tr', function(){
            $("#link-performer-rec-div").removeClass('hide');
            $.ajax({
                type: 'GET',
                url: '$search_performer_url',
                data:{rcd_guid: $(this).data('uid')},
                success:function(data){
                    $("#link-performer-rec-div").html(data);
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });
        $('body').on('click','#link-performer-rec tr', function(){
            $("#add-performer-rec").attr('disabled', false);
        });
        
        $('body').on('click','#add-performer-rec', function(){
            insertRightholder('link-performer-rec');
        });
        
        $('body').on('click','#temp_click_new_performer', function(){
            insertRightholder('rightperformertable');
        });
        
        $('body').on('click','#linked-holders-rec .row-delete', function(){
            _tr = $(this).closest('tr');
            $('#link-performer-rec tr[data-intcode="'+_tr.data('intcode')+'"]').removeClass('hide');
            _tr.remove();
            checkSave();
        });
    });
        
    function checkSave(){
        _count = $("#linked-holders-rec tbody tr").length;
        $("#right_ajax_submit_rec").attr("disabled", _count == 0);
    }
        
    if($('#rightperformertable').length > 0){
        var probaseTable;
        probaseTable = $("#rightperformertable").dataTable({
            sDom: '<"search-box"r>ltip',
            "bPaginate": false,
            "bLengthChange": false,
            "bSort": true,
            "bInfo": false,
            "iDisplayLength": 100
        });

        $('#rightperformertable_base_table_search').keyup(function(){
             probaseTable.fnFilter( $(this).val() );
        });
    }
        
    function insertRightholder(table){
        _performer = $("#"+table+" tbody").find('.highlight');
        uid = _performer.data('uid');
        name = _performer.data('name');
        intcode = _performer.data('intcode');
        record_uid = $("#record_search tbody").find('.highlight').data('uid');
        record_name = $("#record_search tbody").find('.highlight').data('name');

        //Check already exists and not empty
        chk = $('#linked-holders-rec tr[data-uid="'+uid+'"][data-record_uid="'+record_uid+'"]').length;
        if(chk != 0){
            _performer.removeClass('highlight');
            alert(name+" already assigned to "+record_name + '!!!');
            return false;
        }
        if(uid == null){
            _performer.removeClass('highlight');
            alert("No Performer selected !!!");
            return false;
        }
        $("#performer-dismiss").trigger("click");
        //end

        $("#linked-holders-rec #norecord_tr_rec").remove();
        $("#link-performer-rec").removeClass('highlight');
        _tr = '<tr data-uid="'+uid+'" data-name="'+name+'" data-intcode="'+intcode+'" data-record_uid="'+record_uid+'">';
        _tr += '<td>'+record_name+'</td>';
        _tr += '<td>'+name+'</td>';
        _tr += '<td>'+intcode+'</td>';
        _tr += '<td><a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a></td>';
        _tr += '<td class="hide">';
        _tr += '<input type="hidden" name="SoundCarrierRightholder['+key+'][Sound_Car_Id]" value="$sound_car_id" />';
        _tr += '<input type="hidden" name="SoundCarrierRightholder['+key+'][Sound_Car_Right_Work_GUID]" value="'+record_uid+'" />';
        _tr += '<input type="hidden" name="SoundCarrierRightholder['+key+'][Sound_Car_Right_Acc_GUID]" value="'+uid+'" />';
        _tr += '<input type="hidden" name="SoundCarrierRightholder['+key+'][Sound_Car_Work_Type]" value="R" />';
        _tr += '</td>';

        _tr += "</tr>";
        $('#linked-holders-rec tbody').append(_tr);
        _performer.removeClass('highlight');
        $("#add-performer-rec").attr('disabled', true);
        checkSave();
        key++;
    }
        
EOD;
Yii::app()->clientScript->registerScript('_right_form_2', $js);
?>