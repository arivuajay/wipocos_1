<?php
/* @var $this DistributionlogsheetController */
/* @var $model DistributionLogsheet */
/* @var $form CActiveForm */

$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);

$this->title = 'Logsheets';
$this->breadcrumbs = array(
    'Utlization Periods' => array('/site/distributionutlizationperiod/index'),
//    'Classes & Available Periods ' => array('/site/distributionlogsheet/availperiods'),
    $this->title,
);
?>

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'distribution-logsheet-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:InsertLog'
        ),
        'enableAjaxValidation' => true,
    ));
    $users = CHtml::listData(CustomerUser::model()->findAll(), 'User_Cust_Id', 'User_Cust_Name');
    $places = Myclass::getMasterPlace();
    $factors = Myclass::getMasterFactor();
    ?>  
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Class</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo CHtml::textField('class_title', $period_model->class->Class_Name, array('class' => 'form-control', 'disabled' => true)) ?>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::label('Year', 'year', array('class' => '')); ?>
                            <?php echo CHtml::textField('year', $period_model->Period_Year, array('class' => 'form-control', 'disabled' => true)) ?>
                        </div>

                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo CHtml::label('Period', '', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <?php echo CHtml::textField('from', $period_model->Period_From, array('class' => 'form-control', 'disabled' => true)) ?>
                                    </div>
                                    <div class="col-lg-13">
                                        <?php echo CHtml::textField('to', $period_model->Period_To, array('class' => 'form-control', 'disabled' => true)) ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo CHtml::label('Account', 'account', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo CHtml::textField('account', $period_model->setting->Setting_Date, array('class' => 'form-control', 'disabled' => true)) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-body">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Log_User_Cust_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Log_User_Cust_Id', $users, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($model, 'Log_User_Cust_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Log_Place_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Log_Place_Id', $places, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($model, 'Log_Place_Id'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <form method="get" onsubmit="return false;" class="form-horizontal MultiFile-intercepted" role="form">    
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
                                    <label for="" class="control-label">Search</label>                                
                                    <input type="text" id="searach_text" name="searach_text" class="form-control">                            
                                </div>
                                <div class="form-group">
                                    <input type="button" value="Search" id="search_button" name="rght_holder" class="btn btn-success">                                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'distribution-logsheetlist-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:InsertLoglist'
        ),
        'enableAjaxValidation' => true,
    ));

    echo $form->hiddenField($list_model, 'Log_List_Record_GUID');
    echo $form->hiddenField($list_model, 'Log_Id');
    ?>  
    <div id="search_right_result">
    </div>

    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Exploitation</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Duration', array('class' => '')) . ' (H : m : s)'; ?>
                            <?php echo $form->hiddenField($list_model, 'Log_List_Duration'); ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <?php echo $form->textField($list_model, 'duration_hours', array('class' => 'form-control zero_fields')); ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php echo $form->textField($list_model, 'duration_minutes', array('class' => 'form-control zero_fields')); ?>
                                    <?php echo $form->error($list_model, 'duration_minutes'); ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php echo $form->textField($list_model, 'duration_seconds', array('class' => 'form-control zero_fields')); ?>
                                    <?php echo $form->error($list_model, 'duration_seconds'); ?>
                                </div>
                                <div class="col-lg-12">
                                    <?php echo $form->error($list_model, 'duration_hours'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Factor_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($list_model, 'Log_List_Factor_Id', $factors, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Factor_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Coefficient', array('class' => '')); ?>
                            <?php echo $form->textField($list_model, 'Log_List_Coefficient', array('class' => 'form-control zero_fields')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Coefficient'); ?>
                        </div>

                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Date', array('class' => '')); ?>
                            <?php echo $form->textField($list_model, 'Log_List_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Date'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Event', array('class' => '')); ?>
                            <?php echo $form->textField($list_model, 'Log_List_Event', array('class' => 'form-control')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Event'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Seq_Number', array('class' => '')); ?>
                            <?php echo $form->textField($list_model, 'Log_List_Seq_Number', array('class' => 'form-control')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Seq_Number'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Frequency', array('class' => '')); ?>
                            <?php echo $form->textField($list_model, 'Log_List_Frequency', array('class' => 'form-control')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Frequency'); ?>
                        </div>
                    </div>

                </div>
                <div class="box-footer" style="border-top: none">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="col-lg-1">
                                <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-warning', 'id' => 'right_insert')); ?>
                            </div>
                            <div class="col-lg-11 help-block">
                                <?php echo $form->error($list_model, 'Log_List_Record_GUID'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <?php echo CHtml::form(array('/site/distributionlogsheet/insertlog'), 'post', array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'right_form')) ?>
                    <div class="box-header">
                        <h3 class="box-title">Logsheet List</h3>
                    </div>
                    <?php
                    echo CHtml::hiddenField("DistributionLogsheet[Period_Id]", $period_model->Period_Id, array('id' => 'h_period_id'));
                    echo CHtml::hiddenField("DistributionLogsheet[Log_User_Cust_Id]", $model->Log_User_Cust_Id, array('id' => 'h_cust_id'));
                    echo CHtml::hiddenField("DistributionLogsheet[Log_Place_Id]", $model->Log_Place_Id, array('id' => 'h_place_id'));
                    ?>
                    <div class="box-body">
                        <table id="linked-holders" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Original Title</th>
                                    <th>Internal Code</th>
                                    <th>Duration</th>
                                    <th>Factor</th>
                                    <th>Coefficient</th>
                                    <th>Date</th>
                                    <th>Event or show</th>
                                    <th>Sequence Number</th>
                                    <th>Frequency</th>
                                    <th>Total Duration</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($model->distributionLogsheetLists) {
                                    foreach ($model->distributionLogsheetLists as $key => $list) {
                                        ?>
                                        <tr data-uid="<?php echo $list->Log_List_Record_GUID ?>" data-title="<?php echo $list->listRecording->Rcd_Title ?>" data-intcode="<?php echo $list->listRecording->Rcd_Internal_Code ?>">
                                            <td><?php echo $list->listRecording->Rcd_Title; ?></td>
                                            <td><?php echo $list->listRecording->Rcd_Internal_Code; ?></td>
                                            <td class="td_rcd_duration" data-hour="<?php echo $list->listRecording->duration_hours; ?>" data-minute="<?php echo $list->listRecording->duration_minutes; ?>" data-second="<?php echo $list->listRecording->duration_seconds; ?>"><?php echo $list->listRecording->Rcd_Duration; ?></td>
                                            <td class="td_factor" data-factor="<?php echo $list->Log_List_Factor_Id; ?>"><?php echo $list->logListFactor->Factor; ?></td>
                                            <td><?php echo $list->Log_List_Coefficient; ?></td>
                                            <td><?php echo $list->Log_List_Date; ?></td>
                                            <td><?php echo $list->Log_List_Event; ?></td>
                                            <td><?php echo $list->Log_List_Seq_Number; ?></td>
                                            <td><?php echo $list->Log_List_Frequency; ?></td>
                                            <td class="td_duration" data-hour="<?php echo $list->duration_hours; ?>" data-minute="<?php echo $list->duration_minutes; ?>" data-second="<?php echo $list->duration_seconds; ?>"><span class="badge bg-light-blue"><?php echo $list->Log_List_Duration; ?></span></td>
                                            <td>
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', '#role-foundation', array('class' => 'holder-edit')); ?>&nbsp;&nbsp;
                                                <?php echo CHtml::link('<i class="glyphicon glyphicon-trash"></i>', 'javascript:void(0)', array('class' => "row-delete")); ?>
                                            </td>
                                            <td class="hide">
                                                <?php
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_List_Id]", $list->Log_List_Id);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_Id]", $list->Log_Id);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_List_Record_GUID]", $list->Log_List_Record_GUID);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_List_Duration]", $list->Log_List_Duration);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_List_Factor_Id]", $list->Log_List_Factor_Id);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_List_Coefficient]", $list->Log_List_Coefficient);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_List_Date]", $list->Log_List_Date);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_List_Event]", $list->Log_List_Event);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_List_Seq_Number]", $list->Log_List_Seq_Number);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][Log_List_Frequency]", $list->Log_List_Frequency);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][duration_hours]", $list->duration_hours);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][duration_minutes]", $list->duration_minutes);
                                                echo CHtml::hiddenField("DistributionLogsheetList[{$key}][duration_seconds]", $list->duration_seconds);
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr id='norecord_tr'><td colspan='11'>No data created</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="button" value="Save" name="yt3" disabled="disabled" id="right_ajax_submit" class="btn btn-primary">                            </div>
                        </div>
                    </div>
                    <div class="overlay loader"></div>
                    <div class="loading-img loader"></div>
                    <?php echo CHtml::endForm(); ?>
                </div>
                <div class="text-left help-block">
                    <span><strong>Note:</strong> Save will be enabled when at least one list is added</span>
                </div>

            </div>
        </div>    </div>


</div>

<?php
$search_url = Yii::app()->createAbsoluteUrl("site/distributionlogsheet/searchrecords");

$js = <<< EOD
    var rowCount = $('#linked-holders tbody tr').length;
    $(document).ready(function() {
        checkLog();
        
        $('#search_button').on("click", function(){
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:{searach_text: $("#searach_text").val(), is_record: 1},
                success:function(data){
                    $("#search_right_result").html(data);
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });
        
        $('body').on('click','#record_search tbody tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            $('#distribution-logsheetlist-form :input').val('');
            $('.zero_fields').val('0');
            $("#right_insert").val('Add');
        
            $("#DistributionLogsheetList_Log_List_Record_GUID").val($(this).data('uid'));
//            $("#DistributionLogsheetList_duration_hours").val($(this).data('duration_hours'));
//            $("#DistributionLogsheetList_duration_minutes").val($(this).data('duration_minutes'));
//            $("#DistributionLogsheetList_duration_seconds").val($(this).data('duration_seconds'));
            $("#DistributionLogsheetList_Log_List_Date").val($(this).data('date'));
        });
        
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
        
        $('body').on('click','.row-delete', function(){
            $(this).closest('tr').remove();
            rowCount++;
            checkLog();
            $('#distribution-logsheetlist-form :input').val('');
            $('.zero_fields').val('0');
            $("#right_insert").val('Add');
            return false;
        });
        
        $('#right_ajax_submit').on('click', function(){
            $('#distribution-logsheet-form').submit();
        });
        
        $('body').on('click','.holder-edit', function(){
            $("#right_insert").val('Edit');
            tr = $(this).closest('tr');
            tr.addClass('highlight').siblings().removeClass('highlight');
            
            $('#DistributionLogsheetList_Log_List_Record_GUID').val(tr.data('uid'));
            $('#DistributionLogsheetList_duration_hours').val(tr.find('.td_duration').data('hour'));
            $('#DistributionLogsheetList_duration_minutes').val(tr.find('.td_duration').data('minute'));
            $('#DistributionLogsheetList_duration_seconds').val(tr.find('.td_duration').data('second'));
            $('#DistributionLogsheetList_Log_List_Factor_Id').val(tr.find('.td_factor').data('factor'));
            $('#DistributionLogsheetList_Log_List_Coefficient').val(tr.find('td:nth-child(5)').html());
            $('#DistributionLogsheetList_Log_List_Date').val(tr.find('td:nth-child(6)').html());
            $('#DistributionLogsheetList_Log_List_Event').val(tr.find('td:nth-child(7)').html());
            $('#DistributionLogsheetList_Log_List_Seq_Number').val(tr.find('td:nth-child(8)').html());
            $('#DistributionLogsheetList_Log_List_Frequency').val(tr.find('td:nth-child(9)').html());
        });
    });
        
    function InsertLoglist(form, data, hasError) {
        if (hasError == false) {
            $("#right_insert").attr("disabled", true);
            _uid = $(".highlight").data('uid');
            _intcode = $(".highlight").data('intcode');
            _title = $(".highlight").data('title');
        
            _rcd_hour = $(".highlight").find('.td_rcd_duration').data('hour');
            _rcd_min = $(".highlight").find('.td_rcd_duration').data('minute');
            _rcd_sec = $(".highlight").find('.td_rcd_duration').data('second');
        
            chk_tr = $("#linked-holders").find("[data-uid='" + _uid + "']");
            if(chk_tr.length == 1){
                var tr = '';
            }else{
                var tr = '<tr data-uid="'+_uid+'" data-title="'+_title+'" data-intcode="'+_intcode+'">';
            }
            var form_data = form.serializeArray();
            $('#norecord_tr').remove();
            hide_td = '<td class="hide">';
            tot_dur_td = '';
            $.each(form_data, function (key, value) {
                if(value['name'] != "base_table_search"){
                    var name = value['name'];
                    name = name.replace("[","[" + rowCount + "][");

                    //set hidden form values
                    hide_td += '<input type="hidden" name="' + name + '" value="' + value['value'] + '" />';

                    if(value['name'] != "DistributionLogsheetList[duration_hours]" && value['name'] != "DistributionLogsheetList[duration_minutes]" && value['name'] != "DistributionLogsheetList[duration_seconds]"){
                        if(value['name'] == "DistributionLogsheetList[Log_List_Factor_Id]"){
                            tr += '<td class="td_factor" data-factor="'+$('#DistributionLogsheetList_Log_List_Factor_Id').val()+'">';
                        }else if(value['name'] == "DistributionLogsheetList[Log_List_Duration]"){
                            hr = ("0"+$("#DistributionLogsheetList_duration_hours").val()).slice(-2);
                            min = ("0"+$("#DistributionLogsheetList_duration_minutes").val()).slice(-2);
                            sec = ("0"+$("#DistributionLogsheetList_duration_seconds").val()).slice(-2);
                            tr += '<td class="td_rcd_duration" data-hour="'+_rcd_hour+'" data-minute="'+_rcd_min+'" data-second="'+_rcd_sec+'">';
        
                            tot_dur_td += '<td class="td_duration" data-hour="'+hr+'" data-minute="'+min+'" data-second="'+sec+'">';
                        }else{
                            tr += '<td>';
                        }
        
                        if(value['name'] == "DistributionLogsheetList[Log_List_Record_GUID]"){
                            tr += _title;
                        }else if(value['name'] == "DistributionLogsheetList[Log_List_Factor_Id]"){
                            tr += $('select[name="' + value['name'] + '"] option:selected').text();
                        }else if(value['name'] == "DistributionLogsheetList[Log_Id]"){
                            tr += _intcode;
                        }else if(value['name'] == "DistributionLogsheetList[Log_List_Duration]"){
                            tr += _rcd_hour+':'+_rcd_min+':'+_rcd_sec;
        
                            tot_dur_td += '<span class="badge bg-light-blue">'+hr+':'+min+':'+sec+'</span>';
                            tot_dur_td += '</td>';
                        }else{
                            tr += value['value'];
                        }
                        tr += '</td>';
                    }
                }
            });
            tr += tot_dur_td;
            tr += '<td>';
            tr += '<a href="#role-foundation" class="holder-edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;';
            tr += '<a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>';
            tr += '</td>';
            hide_td += '</td>';
            tr += hide_td;
        
            if(chk_tr.length == 1){
                chk_tr.html(tr);
            }else{
                tr += '</tr>';
                $('#linked-holders tbody').append(tr);
            }
            rowCount++;
        
            $('#distribution-logsheetlist-form :input').val('');
            $('.zero_fields').val('0');
            $('.loader').hide();
            $("#right_insert").removeAttr("disabled");
            $("#right_insert").val('Add');

            $("#record_search tr[data-uid='"+_uid+"']").remove();
            checkLog();
        }
        return false;
    }
        
    function InsertLog(form, data, hasError) {
        if (hasError == false) {
            var form_data = form.serializeArray();
            $.each(form_data, function (key, value) {
                if(value['name'] == "DistributionLogsheet[Log_User_Cust_Id]"){
                    $('#h_cust_id').val(value['value']);
                }
                if(value['name'] == "DistributionLogsheet[Log_Place_Id]"){
                    $('#h_place_id').val(value['value']);
                }
            });
            $('#right_form').submit();
        }
        return false;
    }
        
    function checkLog(){
        $('#right_ajax_submit').attr('disabled', $("#linked-holders tbody tr:not('[id*=norecord_tr]')").length <= 0);
    }
        
EOD;
Yii::app()->clientScript->registerScript('_logsheet', $js);
?>
