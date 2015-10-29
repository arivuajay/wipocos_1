<?php
/* @var $this DistributionlogsheetController */
/* @var $model DistributionLogsheet */
/* @var $form CActiveForm */

$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);

$this->title = 'Share Calculation';
$this->breadcrumbs = array(
    'Utilization Periods' => array('/site/distributionutlizationperiod/index'),
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
//            'afterValidate' => 'js:InsertLog'
        ),
        'enableAjaxValidation' => true,
    ));
    $users = CHtml::listData(CustomerUser::model()->findAll(), 'User_Cust_Id', 'namewithcontract');
    $places = Myclass::getMasterPlace();
    $factors = Myclass::getMasterFactor();
    ?>  
    <div class="col-lg-12">
        <div class="box-body">
            <?php $this->renderPartial('_period_data_form', array('period_model' => $period_model)) ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Logsheet List</h3>
                </div>
                <div class="box-body">
                    <table id="linked-holders" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo Recording::model()->getAttributeLabel('Rcd_Title'); ?></th>
                                <th><?php echo Recording::model()->getAttributeLabel('Rcd_Internal_Code'); ?></th>
                                <!--<th class="hide">Duration</th>-->
                                <th><?php echo $measure_unit == 'D' ? DistributionLogsheetList::model()->getAttributeLabel('Log_List_Duration') : DistributionLogsheetList::model()->getAttributeLabel('Log_List_Frequency'); ?></th>
                                <th><?php echo DistributionLogsheetList::model()->getAttributeLabel('Log_List_Factor_Id'); ?></th>
                                <th><?php echo DistributionLogsheetList::model()->getAttributeLabel('Log_List_Coefficient_Id'); ?></th>
                                <th><?php echo DistributionLogsheetList::model()->getAttributeLabel('Log_List_Unit_Tariff'); ?></th>
                                <th><?php echo DistributionLogsheetList::model()->getAttributeLabel('Log_List_Work_Amount'); ?></th>
                                <th>Matching Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $defCurrency = MasterCurrency::model()->findByPk(DEFAULT_CURRENCY_ID)->Currency_Code;
                            if(!empty($defCurrency))
                                $defCurrency = "({$defCurrency})";
                            if ($model->distributionLogsheetLists) {
                                foreach ($model->distributionLogsheetLists as $key => $list) {
                                    if ($measure_unit == 'D') {
                                        $title = $list->listWork->Work_Org_Title;
                                        $int_code = $list->listWork->Work_Internal_Code;
                                    } else if ($measure_unit == 'F') {
                                        $title = $list->listRecording->Rcd_Title;
                                        $int_code = $list->listRecording->Rcd_Internal_Code;
                                    }
                                    ?>
                                    <tr data-uid="<?php echo $list->Log_List_Record_GUID ?>" data-title="<?php echo $title ?>" data-intcode="<?php echo $int_code ?>">
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $int_code; ?></td>
                                        <?php if ($measure_unit == 'D') { ?>
                                            <td class="td_duration" data-hour="<?php echo $list->duration_hours; ?>" data-minute="<?php echo $list->duration_minutes; ?>" data-second="<?php echo $list->duration_seconds; ?>"><span class="badge bg-light-blue"><?php echo $list->Log_List_Duration; ?></span></td>
                                        <?php } else { ?>
                                            <td><?php echo $list->Log_List_Frequency; ?></td>
                                        <?php } ?>
                                    <!--<td class="td_rcd_duration hide" data-hour="<?php echo $list->listRecording->duration_hours; ?>" data-minute="<?php echo $list->listRecording->duration_minutes; ?>" data-second="<?php echo $list->listRecording->duration_seconds; ?>"><?php echo $list->listRecording->Rcd_Duration; ?></td>-->
                                        <td class="td_factor" data-factor="<?php echo $list->Log_List_Factor_Id; ?>"><?php echo $list->logListFactor->Factor; ?></td>
                                        <td><?php echo $list->logListCoefficient->Coefficient; ?></td>
                                        <td><?php echo $list->Log_List_Unit_Tariff; ?></td>
                                        <td><?php echo $list->Log_List_Work_Amount; ?></td>
                                        <td><?php echo $list->getMatchingdetails($list->Log_List_Id,$list->Log_List_Record_GUID,$measure_unit, $defCurrency); ?></td>
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
        </div>
    </div>

    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Calculation</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Log_Net_Amount', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Log_Net_Amount', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Log_Net_Amount'); ?>
                        </div>
                    </div>
                </div>
                <div style="border-top: none; background-color: #F9F9F9 !important;" class="box-footer">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary', 'id' => 'right_insert')); ?>
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
                    <h3 class="box-title">Statistics</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo CHtml::label('Rate', 'Rate', array()); ?>
                            <?php echo CHtml::textField('Rate', $model->Log_Net_Amount, array('class' => 'form-control', 'disabled' => true)); ?>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo CHtml::label('Unit Tariff', 'Unit_Tariff', array()); ?>
                            <?php echo CHtml::textField('Unit_Tariff', $model->totalunittariff, array('class' => 'form-control', 'disabled' => true)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->endWidget(); ?>

</div>

<?php
$js = <<< EOD
        
EOD;
Yii::app()->clientScript->registerScript('_calc', $js);
?>
