<?php
/* @var $this ContractinvoiceController */
/* @var $model ContractInvoice */
/* @var $form CActiveForm */
/* @var $cont_model TariffContracts */
/**/

$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;



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
                    <h3 class="box-title">Search Contract</h3>
                </div>
                <div class="box-body">
                    <p class="help-inline">Enter the begin of the name or code or address or any one of the following criteria:</p>
                    <div class="col-lg-6">
                        <div class="box-body">
                            <div class="form-group">
                                <?php echo CHtml::label('Search Contract', '', array('class' => 'control-label')); ?>
                                <?php echo CHtml::textField('searach_text', $_REQUEST['fn'], array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::button('Search', array('class' => 'btn btn-success', 'name' => 'contract', 'id' => 'search_button')); ?>                                    <?php // echo CHtml::resetButton('Clear', array('class' => 'btn btn-primary')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <?php
    $update = !empty($cont_model);
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contract-invoice-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    $taf_cont_id = '';
    if($update){
        $taf_cont_id = $cont_model->Tarf_Cont_Id;
    }
    echo $form->hiddenField($new_model, 'Tarf_Cont_Id', array('value' => $taf_cont_id));
    $repeats = ContractInvoice::model()->getRepeat();
    echo $form->hiddenField($new_model, 'Inv_Repeat_Count', array('value' => 0))
    ?>

    <div class="col-lg-12 col-xs-12">
        <div class="box-body">
            <div id="search_right_result">
                <?php if ($update) { ?>
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
                                            <th><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Cont_Internal_Code'); ?></th>
                                            <!--<th><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Invoice'); ?></th>-->
                                            <th><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Cont_User_Id'); ?></th>
                                            <th><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Cont_Tariff_Id'); ?></th>
                                            <th><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Cont_Insp_Id'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $contract =  $cont_model;?>
                                        <tr class="highlight" data-uid="<?php echo $contract->Tarf_Cont_GUID ?>" data-id="<?php echo $contract->Tarf_Cont_Id ?>" data-custname = "<?php echo $contract->tarfContUser->User_Cust_Code; ?>" data-invoice = "<?php echo $contract->Tarf_Invoice; ?>" data-amount = "<?php echo $contract->Tarf_Cont_Amt_Pay; ?>" data-contract-end= "<?php echo $contract->Tarf_Cont_To; ?>" data-repeat= "<?php echo $contract->getPayment(); ?>">
                                            <td><?php echo $contract->Tarf_Cont_Internal_Code ?></td>
                                            <!--<td><?php echo $contract->Tarf_Invoice ?></td>-->
                                            <td><?php echo $contract->tarfContUser->User_Cust_Code ?></td>
                                            <td><?php echo $contract->tarfContTariff->Tarif_Description ?></td>
                                            <td><?php echo $contract->tarfContInsp->Insp_Name ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php
                            $inv_to = $amount = '';
                            if ($update) {
                                $inv_to = $contract->tarfContUser->User_Cust_Code;
                                $amount = $contract->Tarf_Cont_Amt_Pay;
                                $cont_end = $contract->Tarf_Cont_To;
                                $repeat_type = $contract->getPayment();
                            }
                            ?>
                            <?php echo CHtml::label('Invoice To', 'invoice_to') ?>
                            <?php echo CHtml::textField('invoice_to', $inv_to, array('id' => 'invoice_to', 'class' => 'form-control', 'readonly' => true)); ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo CHtml::label(TariffContracts::model()->getAttributeLabel('Tarf_Cont_To'), 'reference_invoice') ?>
                            <?php echo CHtml::textField('contract_end', $cont_end, array('id' => 'contract_end', 'class' => 'form-control', 'readonly' => true)); ?>
                        </div>
                    </div>
<!--                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo CHtml::label('Reference', 'reference_invoice') ?>
                            <?php echo CHtml::textField('reference_invoice', '', array('id' => 'reference_invoice', 'class' => 'form-control', 'readonly' => true)); ?>
                        </div>
                    </div>-->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo CHtml::label('Amount', 'inv_amount') ?>
                            <?php echo CHtml::textField('inv_amount', $amount, array('id' => 'inv_amount', 'class' => 'form-control', 'readonly' => true)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo CHtml::label(TariffContracts::model()->getAttributeLabel('Tarf_Cont_Pay_Id'), 'repeat_type') ?>
                            <?php echo CHtml::textField('repeat_type', $repeat_type, array('id' => 'repeat_type', 'class' => 'form-control', 'readonly' => true)); ?>
                            <?php // echo $form->labelEx($new_model, 'Inv_Repeat_Id', array('class' => '')); ?>
                            <?php // echo $form->dropDownList($new_model, 'Inv_Repeat_Id', $repeats, array('class' => 'form-control')); ?>
                            <?php // echo $form->error($new_model, 'Inv_Repeat_Id'); ?>
                        </div>


                        <div class="form-group">
                            <?php echo $form->labelEx($new_model, 'Inv_Next_Date', array('class' => '')); ?>
                            <?php echo $form->textField($new_model, 'Inv_Next_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($new_model, 'Inv_Next_Date'); ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 <?php echo !$update ? 'hide' : ''?>"  id="invoice_div">
        <?php
        if($update){
            $cont_model = TariffContracts::model()->with('contractInvoices')->find(
                    array(
                    'condition' => 't.Tarf_Cont_Id = :id',
                    'params' => array('id' => $cont_model->Tarf_Cont_Id),
                    'order' => 'contractInvoices.Inv_Next_Date DESC'
                )
            );
            $this->renderPartial('invoices', array('model' => $cont_model));
        }
        ?>
    </div>

    <div class="col-lg-12 col-xs-12">
        <div class="form-group">
            <div class="col-lg-1">
                <?php echo CHtml::submitButton(!$update ? 'Save' : 'Save', array('class' => !$update ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
            <div class="col-lg-11 help-block">
                <?php echo $form->error($new_model, 'Tarf_Cont_Id'); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
<?php
$search_url = Yii::app()->createAbsoluteUrl("site/contractinvoice/searchcontract");
$invoice_url = Yii::app()->createAbsoluteUrl("site/contractinvoice/getinvoice");
$js = <<< EOD
        $(document).ready(function(){

            $('#search_button').on("click", function(){
                var data=$("#search-form").serialize();
                $.ajax({
                    type: 'GET',
                    url: '$search_url',
                    data:data,
                    success:function(data){
                        $('#ContractInvoice_Tarf_Cont_Id').val('');
                        $("#search_right_result").html(data);
                        $('#invoice_to').val("");
                   },
                    error: function(data) {
                        alert("Something went wrong. Try again");
                    },
                    dataType:'html'
                });
            });

            $('body').on('click','#search_result tbody tr', function(){
                _this = $(this);
                $(this).addClass('highlight').siblings().removeClass('highlight');
                $('#ContractInvoice_Tarf_Cont_Id').val($(this).data('id'));
                $.ajax({
                    type: 'GET',
                    url: '$invoice_url',
                    data:{id: _this.data('id')},
                    success:function(data){
                        $('#invoice_to').val(_this.data('custname'));
                        $('#contract_end').val(_this.data('contract-end'));
                        $('#repeat_type').val(_this.data('repeat'));
                        $('#inv_amount').val(_this.data('amount'));
                        $('#invoice_div').removeClass('hide');
                        $('#invoice_div').removeClass('hide');
                        $('#invoice_div').html(data);
                   },
                    error: function(data) {
                        alert("Something went wrong. Try again");
                    },
                    dataType:'html'
                });
            });
        });

EOD;

Yii::app()->clientScript->registerScript('_form', $js);
?>