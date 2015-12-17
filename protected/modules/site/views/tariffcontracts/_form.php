<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */
/* @var $form CActiveForm */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;


$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <?php
        $other_tab_validation = !$model->isNewRecord;
        ?>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a id="a_tab_1" href="#tab_1" data-toggle="tab">Contract</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>History</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'search-form',
//                    'action' => $this->createUrl('/site/tariffcontracts/update', array('id' => $work_model->Work_Id, 'tab' => '7')),
                            'method' => 'get',
                            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'onsubmit' => "return false;"),
                        ));
                        ?>
                        <div class="col-lg-12">
                            <div class="box-body">
                                <div class="form-group foundation <?php echo $model->isNewRecord ? '' : 'hide' ?>">
                                    <div class="box-header">
                                        <h3 class="box-title">Search</h3>
                                    </div>
                                    <div class="box-body">
                                        <p class="help-inline">Enter the begin of the name or code or address or any one of the following criteria:</p>
                                        <div class="col-lg-6">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <?php echo CHtml::label('Search User', '', array('class' => 'control-label')); ?>
                                                    <?php echo CHtml::textField('searach_text', $_REQUEST['fn'], array('class' => 'form-control')); ?>
                                                </div>
                                                <div class="form-group">
                                                    <?php echo CHtml::button('Search', array('class' => 'btn btn-success', 'name' => 'rght_holder', 'id' => 'search_button')); ?>                                    <?php // echo CHtml::resetButton('Clear', array('class' => 'btn btn-primary')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="search_right_result" class="col-lg-12">
                            <?php if (!$model->isNewRecord) { ?>
                                <div class="box-body">
                                    <div class="form-group foundation">
                                        <div class="box-header">
                                            <h3 class="box-title">Users</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="col-lg-12 col-md-12 row">
                                                <table id="search_result" class="table table-bordered selectable table-datatable">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Code'); ?></th>
                                                            <!--<th><?php // echo CustomerUser::model()->getAttributeLabel('User_Cust_Code');       ?></th>-->
                                                            <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Address'); ?></th>
                                                            <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Email'); ?></th>
                                                            <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Telephone'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="highlight" data-uid="<?php echo $model->tarfContUser->User_Cust_GUID ?>" data-id="<?php echo $model->tarfContUser->User_Cust_Id ?>" data-name="<?php echo $model->tarfContUser->User_Cust_Code; ?>">
                                                            <td><?php echo $model->tarfContUser->User_Cust_Code ?></td>
                                                            <!--<td><?php // echo $model->tarfContUser->User_Cust_Code       ?></td>-->
                                                            <td><?php echo $model->tarfContUser->User_Cust_Address ?></td>
                                                            <td><?php echo $model->tarfContUser->User_Cust_Email ?></td>
                                                            <td><?php echo $model->tarfContUser->User_Cust_Telephone ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <div class="form-group">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <?php
                        $this->endWidget();
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'tariff-contracts-form',
                            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'enableAjaxValidation' => true,
                        ));
                        echo $form->hiddenField($model, 'Tarf_Cont_User_Id');
                        echo $form->hiddenField($model, 'Tarf_Recurring_Amount', array('class' => 'recurr_amt'));
                        $regions = Myclass::getMasterRegion();
                        $tariffs = Myclass::getMasterTariff();
                        $inspectors = CHtml::listData(Inspector::model()->findAll(), 'Insp_Id', 'Insp_Name');
                        $payments = TariffContracts::model()->getPayment();
                        $renewalas = TariffContracts::model()->getRenewallist();
                        ?>
                        <div class="col-lg-12">
                            <div class="box-body">
                                <div class="form-group foundation">
                                    <div class="box-header">
                                        <h3 class="box-title">Agreement</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'Tarf_Cont_Internal_Code', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-5">
                                                <?php echo $form->textField($model, 'Tarf_Cont_Internal_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50, 'readonly' => true)); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_Internal_Code'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="box-body">
                                <div class="form-group foundation">
                                    <div class="box-header">
                                        <h3 class="box-title">Establishment</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Region_Id', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-5">
                                                    <?php echo $form->dropDownList($model, 'Tarf_Cont_Region_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                                                    <?php echo $form->error($model, 'Tarf_Cont_Region_Id'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_District', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-5">
                                                    <?php echo $form->textField($model, 'Tarf_Cont_District', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                                    <?php echo $form->error($model, 'Tarf_Cont_District'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Area', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-5">
                                                    <?php echo $form->textField($model, 'Tarf_Cont_Area', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                                    <?php echo $form->error($model, 'Tarf_Cont_Area'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Tariff_Id', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-5">
                                                    <?php echo $form->dropDownList($model, 'Tarf_Cont_Tariff_Id', $tariffs, array('class' => 'form-control', 'prompt' => '')); ?>
                                                    <?php echo $form->error($model, 'Tarf_Cont_Tariff_Id'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Insp_Id', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-5">
                                                    <?php echo $form->dropDownList($model, 'Tarf_Cont_Insp_Id', $inspectors, array('class' => 'form-control')); ?>
                                                    <?php echo $form->error($model, 'Tarf_Cont_Insp_Id'); ?>
                                                </div>
                                            </div>

                                            <?php // if(!$model->isNewRecord){ ?>
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Balance', array('class' => 'col-sm-2 control-label')); ?>
                                                <div class="col-sm-5">
                                                    <?php echo $form->textField($model, 'Tarf_Cont_Balance', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10, 'readonly' => true)); ?>
                                                    <?php echo $form->error($model, 'Tarf_Cont_Balance'); ?>
                                                </div>
                                            </div>
                                            <?php // } ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="box-body">
                                <div class="form-group foundation">
                                    <div class="box-header">
                                        <h3 class="box-title">Royalty</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Amt_Pay', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Tarf_Cont_Amt_Pay', array('class' => 'form-control recurr', 'size' => 10, 'maxlength' => 10)); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_Amt_Pay'); ?>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_From', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Tarf_Cont_From', array('class' => 'form-control cont_dates', 'disabled' => !$model->isNewRecord)); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_From'); ?>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_To', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Tarf_Cont_To', array('class' => 'form-control cont_dates', 'disabled' => !$model->isNewRecord)); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_To'); ?>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Sign_Date', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Tarf_Cont_Sign_Date', array('class' => 'form-control date')); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_Sign_Date'); ?>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Pay_Id', array('class' => '')); ?>
                                                <?php echo $form->dropDownList($model, 'Tarf_Cont_Pay_Id', $payments, array('class' => 'form-control recurr', 'disabled' => !$model->isNewRecord)); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_Pay_Id'); ?>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Recurring_Amount', array('class' => '')); ?>
                                                <?php echo CHtml::textField('Tarf_Recurring_Amount', $model->Tarf_Recurring_Amount, array('class' => 'form-control recurr_amt', 'readonly' => true)); ?>
                                                <?php echo $form->error($model, 'Tarf_Recurring_Amount'); ?>
                                            </div>

                                            <div class="form-group hide">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Portion', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Tarf_Cont_Portion', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_Portion'); ?>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Comment', array('class' => '')); ?>
                                                <?php echo $form->textArea($model, 'Tarf_Cont_Comment', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_Comment'); ?>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Renewal', array('class' => '')); ?><br />
                                                <?php echo $form->checkBox($model, 'Tarf_Cont_Renewal', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_Renewal'); ?>
                                            </div>

                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Renewal_Year', array('class' => '')); ?><br />
                                                <?php echo $form->dropDownList($model, 'Tarf_Cont_Renewal_Year', $renewalas, array('class' => 'form-control', 'prompt' => '', 'disabled' => $model->Tarf_Cont_Renewal == 'N')); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_Renewal_Year'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            if ($evt_hist_model):
                                if (!$contract_event_by_progress)
                                    $event_types = CHtml::listData(MasterEventType::model()->restart()->findAll(array('order' => 'Evt_Type_Name')), 'Master_Evt_Type_Id', 'Evt_Type_Name');
                                else
                                    $event_types = CHtml::listData(MasterEventType::model()->progress()->findAll(array('order' => 'Evt_Type_Name')), 'Master_Evt_Type_Id', 'Evt_Type_Name');
                                ?>
                                <div class="box-body">
                                    <div class="form-group foundation">
                                        <div class="box-header">
                                            <h3 class="box-title">Events</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <?php echo $form->labelEx($evt_hist_model, 'Tarf_Cont_Event_Id', array('class' => '')); ?>
                                                    <?php echo $form->dropDownList($evt_hist_model, 'Tarf_Cont_Event_Id', $event_types, array('class' => 'form-control', 'prompt' => '')); ?>
                                                    <?php echo $form->error($evt_hist_model, 'Tarf_Cont_Event_Id'); ?>
                                                </div>

                                                <div class="form-group hide">
                                                    <?php echo $form->labelEx($evt_hist_model, 'Tarf_Cont_Event_Date', array('class' => '')); ?>
                                                    <?php echo $form->textField($evt_hist_model, 'Tarf_Cont_Event_Date', array('class' => 'form-control date', 'value' => date('Y-m-d'))); ?>
                                                    <?php echo $form->error($evt_hist_model, 'Tarf_Cont_Event_Date'); ?>
                                                </div>

                                                <div class="form-group">
                                                    <?php echo $form->labelEx($evt_hist_model, 'Tarf_Cont_Event_Comment', array('class' => '')); ?>
                                                    <?php echo $form->textArea($evt_hist_model, 'Tarf_Cont_Event_Comment', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                                                    <?php echo $form->error($evt_hist_model, 'Tarf_Cont_Event_Comment'); ?>
                                                </div>
                                                <?php
                                                $events_history = TariffContractsEventHistory::model()->findAllByAttributes(array('Tarf_Contract_Id' => $model->Tarf_Cont_Id));
                                                if ($events_history) {
                                                    echo '<table class="table table-condensed"><thead><tr><th>Date</th><th>Status</th><th>Status</th></tr></thead><tbody>';
                                                    foreach ($events_history as $history) {
                                                        echo "<tr><td>{$history->Tarf_Cont_Event_Date}</td><td>{$history->tarfContEvent->Evt_Type_Name}</td><td>{$history->Tarf_Cont_Event_Comment}</td></tr>";
                                                    }
                                                    echo "</tbody></table>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-body"><div class="form-group foundation">
                                    <div class="box-header">
                                        <h3 class="box-title">Invoice Options</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'Tarf_Cont_Next_Inv_Date', array('class' => '')); ?>
                                                <?php echo $form->textField($model, 'Tarf_Cont_Next_Inv_Date', array('class' => 'form-control', 'readonly' => !$model->isNewRecord)); ?>
                                                <?php echo $form->error($model, 'Tarf_Cont_Next_Inv_Date'); ?>
                                            </div>

                                        </div>
                                    </div>
                                </div></div>
                        </div>

                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="col-lg-3">
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'save_contract')); ?>
                                        <?php
                                        if ($model->isNewRecord) {
                                            $this->widget(
                                                    'application.components.MyTbButton', array(
                                                'label' => 'Modify Default Email Template',
                                                'context' => 'default btn-sm',
                                                'htmlOptions' => array(
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#templateModal',
                                                ),
                                                    )
                                            );
                                            $this->renderPartial('_email_template', compact('model', 'form'));
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-9 help-block">
                                        <?php echo $form->error($model, 'Tarf_Cont_User_Id'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php $this->endWidget(); ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab_2">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_history', compact('model'));
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>


<?php
$search_url = Yii::app()->createAbsoluteUrl("site/tariffcontracts/searchuser");
$get_tariff = Yii::app()->createAbsoluteUrl("site/tariffcontracts/gettariff");
$get_recurr = Yii::app()->createAbsoluteUrl("site/tariffcontracts/getrecurr");
$mode = $model->isNewRecord ? 1 : 0;
$active_Tab = (is_null($tab)) ? "tab_1" : "tab_{$tab}";
$js = <<< EOD
    var mode = $mode;
    $(document).ready(function(){
        $('.nav-tabs a[href="#$active_Tab"]').tab('show');

        $('.cont_dates').datepicker({
            format: 'yyyy-mm-dd'
        }).on('changeDate', function(e){
            getRecurr();
        });

        $('#search_button').on("click", function(){
            var data=$("#search-form").serialize();
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:data,
                success:function(data){
                    $('#TariffContracts_Tarf_Cont_User_Id').val('');
                    $("#search_right_result").html(data);
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });

        $('body').on('click','#search_result tbody tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            $('#TariffContracts_Tarf_Cont_User_Id').val($(this).data('id'));
            $('#TariffContracts_email_name').val($(this).data('name'));
        });

        $('#TariffContracts_Tarf_Cont_Tariff_Id').on("click", function(){
            _that = $(this);
            $.ajax({
                type: "POST",
                url: '$get_tariff',
                data:{id: _that.val()},
                dataType: "json",
                success:function(data){
                    var data = jQuery.parseJSON(data);
                    $('#TariffContracts_Tarf_Cont_Amt_Pay').val(data.standard_amout);
                    getRecurr();
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });

        $('.recurr').on("change", function(){
            getRecurr();
        });
    });

    function getRecurr(){
        amount = $('#TariffContracts_Tarf_Cont_Amt_Pay').val();
        from = $('#TariffContracts_Tarf_Cont_From').val();
        to = $('#TariffContracts_Tarf_Cont_To').val();
        payid = $('#TariffContracts_Tarf_Cont_Pay_Id').val();

        if(amount != '' && from != '' && to != '' && payid != ''){
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '$get_recurr',
                data:{'amount': amount, 'from': from, 'to': to, 'payid': payid},
                success:function(data){
                    $('.recurr_amt').val(data.recurr_amt);
                    if(mode == 1){
                        $('#TariffContracts_Tarf_Cont_Next_Inv_Date').val(data.nxt_date);
                    }
                },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
            });
        }
    }

    $('#TariffContracts_Tarf_Cont_Renewal').on('ifChecked', function(event){
        $('#TariffContracts_Tarf_Cont_Renewal_Year').attr('disabled', false);
        $('#TariffContracts_Tarf_Cont_Renewal_Year').val() == '' ? $('#TariffContracts_Tarf_Cont_Renewal_Year').val(1) : '';
    });

    $('#TariffContracts_Tarf_Cont_Renewal').on('ifUnchecked', function(event){
        $('#TariffContracts_Tarf_Cont_Renewal_Year').attr('disabled', true);
        $('#TariffContracts_Tarf_Cont_Renewal_Year').val('');
    });

EOD;

if (!$contract_event_by_progress) {
    $js .= <<< EOD
        $(function(){
            $('input,select,textarea').not('#TariffContractsEventHistory_Tarf_Cont_Event_Id, #TariffContractsEventHistory_Tarf_Cont_Event_Date, #TariffContractsEventHistory_Tarf_Cont_Event_Comment,#save_contract').attr('disabled','disabled');
        });
EOD;
}
Yii::app()->clientScript->registerScript('_form', $js);
?>