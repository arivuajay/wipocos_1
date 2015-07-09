<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-rightholder-search-form',
        'action' => $this->createUrl('/site/work/update', array('id' => $work_model->Sound_Car_Id, 'tab' => '7')),
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
        'action' => $this->createUrl('/site/work/update', array('id' => $work_model->Sound_Car_Id, 'tab' => '7')),
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
                    $performers = PerformerAccount::model()->findAll();
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
                                    <tr>
                                        <th>Rightholder Name</th>
                                        <th>Internal Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($performers)) {
                                        foreach ($performers as $key => $performer) {
                                            ?>
                                            <tr data-uid="<?php echo $performer->Perf_GUID ?>" data-name="<?php echo $performer->fullname ?>" data-intcode = "<?php echo $performer->Perf_Internal_Code ?>">
                                                <td><?php echo $performer->fullname; ?></td>
                                                <td><?php echo $performer->Perf_Internal_Code; ?></td>
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
                            <?php echo CHtml::button('Add', array('class' => 'btn btn-primary', 'id' => 'add-performer')); ?>
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
                                <tr>
                                    <th>Rightholder Name</th>
                                    <th>Internal Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($work_model->soundCarrierRightholders) {
                                    foreach ($work_model->soundCarrierRightholders as $key => $performer) {
                                        ?>
                                        <tr data-uid="<?php echo $performer->Perf_GUID ?>" data-name="<?php echo $performer->fullname ?>" data-intcode = "<?php echo $performer->Perf_Internal_Code ?>">
                                            <td><?php echo $performer->fullname; ?></td>
                                            <td><?php echo $performer->Perf_Internal_Code; ?></td>
                                            <td class="hide">
                                                <?php
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Id]", $member->Sound_Car_Id);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Work_GUID]", $member->Sound_Car_Right_Work_GUID);
                                                echo CHtml::hiddenField("SoundCarrierRightholder[{$key}][Sound_Car_Right_Acc_GUID]", $member->Sound_Car_Right_Acc_GUID);
                                                ?>
                                            </td>
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
    var rowCount = $('#linked-holders tbody tr').length;
    $(document).ready(function() {
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
        
        $('body').on('click','#search_result tr, #link-performer tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
        });
        $('body').on('click','#search_result tr', function(){
            $("#link-performer-div").removeClass('hide');
        });
        
        $("#add-performer").on('click', function(){
            $("#linked-holders #norecord_tr").remove();
        
            $("#link-performer").removeClass('highlight');
        
            _performer = $("#link-performer tbody").find('.highlight');
            uid = _performer.data('uid');
            name = _performer.data('name');
            intcode = _performer.data('intcode');
        
            tr = '<tr data-uid="'+uid+'" data-name="'+name+'" data-intcode="'+intcode+'">';
            tr += '<td>'+name+'</td>';
            tr += '<td>'+intcode+'</td>';
            tr += '<td><a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a></td>';
            tr += "</tr>";
            $('#linked-holders tbody').append(tr);
            _performer.addClass('hide');
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_right_form', $js);
?>