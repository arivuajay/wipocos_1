<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */
/* @var $form CActiveForm */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
?>
<div class="box box-primary">
    <div class="col-lg-12 col-xs-12">
        <div class="box-body">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'search-form',
//                    'action' => $this->createUrl('/site/tariffcontracts/update', array('id' => $work_model->Work_Id, 'tab' => '7')),
                'method' => 'get',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'onsubmit' => "return false;"),
            ));
            ?>
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Search</h3>
                </div>
                <div class="box-body">
                    <p class="help-inline">Enter the begin of the name or code or address or any one of the following criteria:</p>
                    <div class="col-lg-6">
                        <div class="box-body">
                            <div class="form-group">
                                <?php echo CHtml::label('Search', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('searach_text', $_REQUEST['fn'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::button('Search', array('class' => 'btn btn-success', 'name' => 'rght_holder', 'id' => 'search_button')); ?>                                    <?php // echo CHtml::resetButton('Clear', array('class' => 'btn btn-primary')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tariff-contracts-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Tarf_Cont_User_Id');
    $regions = Myclass::getMasterRegion();
    $tariffs = Myclass::getMasterTariff();
    $inspectors = CHtml::listData(Inspector::model()->findAll(), 'Insp_Id', 'Insp_Name');
    $event_types = Myclass::getMasterEventtype();
    $payments = TariffContracts::model()->getPayment();
    ?>
    <div class="col-lg-12 col-xs-12">
        <div class="box-body">
            <div id="search_right_result">
                <?php if (!$model->isNewRecord) { ?>
                    <div class="form-group foundation">
                        <div class="box-header">
                            <div class="col-lg-12 col-md-12">
                                <h3 class="box-title">Users</h3>
                            </div>

                        </div>
                        <div class="box-body"  style="max-height: 300px; overflow-y: scroll">
                            <div class="col-lg-12 col-md-12 row">
                                <table id="search_result" class="table table-bordered selectable table-datatable">
                                    <thead>
                                        <tr>
                                            <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Code'); ?></th>
                                            <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Name'); ?></th>
                                            <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Address'); ?></th>
                                            <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Email'); ?></th>
                                            <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Telephone'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="highlight" data-uid="<?php echo $model->tarfContUser->User_Cust_GUID ?>" data-id="<?php echo $model->tarfContUser->User_Cust_Id ?>" data-name="<?php echo $model->tarfContUser->User_Cust_Name; ?>">
                                            <td><?php echo $model->tarfContUser->User_Cust_Code ?></td>
                                            <td><?php echo $model->tarfContUser->User_Cust_Name ?></td>
                                            <td><?php echo $model->tarfContUser->User_Cust_Address ?></td>
                                            <td><?php echo $model->tarfContUser->User_Cust_Email ?></td>
                                            <td><?php echo $model->tarfContUser->User_Cust_Telephone ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

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

            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Establishment</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Tarf_Cont_City_Id', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                            <?php echo $form->dropDownList($model, 'Tarf_Cont_City_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_City_Id'); ?>
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
                            <?php echo $form->dropDownList($model, 'Tarf_Cont_Tariff_Id', $tariffs, array('class' => 'form-control')); ?>
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

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'Tarf_Cont_Balance', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                            <?php echo $form->textField($model, 'Tarf_Cont_Balance', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_Balance'); ?>
                        </div>
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
                            <?php echo $form->textField($model, 'Tarf_Cont_Amt_Pay', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_Amt_Pay'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_From', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Tarf_Cont_From', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_From'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_To', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Tarf_Cont_To', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_To'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Sign_Date', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Tarf_Cont_Sign_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_Sign_Date'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Pay_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Tarf_Cont_Pay_Id', $payments, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_Pay_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Portion', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Tarf_Cont_Portion', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_Portion'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Comment', array('class' => '')); ?>
                            <?php echo $form->textArea($model, 'Tarf_Cont_Comment', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_Comment'); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Events</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Event_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Tarf_Cont_Event_Id', $event_types, array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_Event_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Event_Date', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Tarf_Cont_Event_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_Event_Date'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Tarf_Cont_Event_Comment', array('class' => '')); ?>
                            <?php echo $form->textArea($model, 'Tarf_Cont_Event_Comment', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                            <?php echo $form->error($model, 'Tarf_Cont_Event_Comment'); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="col-lg-1">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                    <div class="col-lg-11 help-block">
                        <?php echo $form->error($model, 'Tarf_Cont_User_Id'); ?>
                    </div>

                </div>
            </div>
        </div>

    <?php $this->endWidget(); ?>
</div>


<?php
$search_url = Yii::app()->createAbsoluteUrl("site/tariffcontracts/searchuser");
$js = <<< EOD
        $(document).ready(function(){
            $('.date').datepicker({ format: 'yyyy-mm-dd' });
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

            $('body').on('click','#search_result tr', function(){
                $(this).addClass('highlight').siblings().removeClass('highlight');
                $('#TariffContracts_Tarf_Cont_User_Id').val($(this).data('id'));
            });
        });
   
EOD;

Yii::app()->clientScript->registerScript('_form', $js);
?>