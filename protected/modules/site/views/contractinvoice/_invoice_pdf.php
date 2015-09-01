<?php 
/* @var $this ContractinvoiceController */
/* @var $model ContractInvoice */

$contract = $model->tarfCont;
?><style>
    body{
        color: #333;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 14px;
        line-height: 1.42857;
    }
</style>
<div class="row" style="margin-right: -15px;margin-left: -15px;">
    <div class="col-xs-12" style="float: left;width: 95%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;">
        <h2 class="page-header" style="padding-bottom: 9px;border-bottom: 1px solid #eee;">
            <img src="<?php echo EMAILHEADERIMAGE; ?>" style="height: 14px;"/> <?php echo SITENAME; ?>
            <small style="float: right; font-size: 12px; color:#777">Date: <?php echo date('d-m-Y', strtotime($model->Inv_Date)); ?></small>
        </h2>
    </div>
</div>
<div class="row invoice-info" style="font-weight: normal; margin-right: -15px; margin-left: -15px;">
    <div class="col-sm-6 invoice-col" style="width: 45%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;float: left;">
        <p class="lead" style="margin-bottom: 20px;font-size: 16px;font-weight: 300;line-height: 1.4;">User Details:</p>
        <address style="margin-bottom: 20px;font-style: normal;line-height: 1.42857143;">
                <strong><?php echo $contract->tarfContUser->User_Cust_Name; ?></strong><br>
                <?php echo $contract->tarfContUser->User_Cust_Name; ?><br>
                <?php echo $contract->tarfContUser->User_Cust_Address; ?><br>
                Phone: <?php echo $contract->tarfContUser->User_Cust_Telephone; ?><br/>
                Fax: <?php echo $contract->tarfContUser->User_Cust_Fax; ?><br/>
                Website: <?php echo CHtml::link($contract->tarfContUser->User_Cust_Website, $contract->tarfContUser->User_Cust_Website, array('target' => '_blank')); ?><br/>
                Email: <?php echo CHtml::link($contract->tarfContUser->User_Cust_Email, "mailto:{$contract->tarfContUser->User_Cust_Email}", array()); ?>
            </address>
    </div>
    <div class="col-sm-6 invoice-col" style="width: 45%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;float: left;">
        <p class="lead" style="margin-bottom: 20px;font-size: 16px;font-weight: 300;line-height: 1.4;">Agreement:</p>
            <b><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Cont_Internal_Code') ?>:</b> <?php echo $contract->Tarf_Cont_Internal_Code; ?><br/>
            <b><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Cont_From') ?>:</b> <?php echo $contract->Tarf_Cont_From; ?><br/>
            <b><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Cont_To') ?>:</b> <?php echo $contract->Tarf_Cont_To; ?><br/>
            <b><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Cont_Sign_Date') ?>:</b> <?php echo $contract->Tarf_Cont_Sign_Date; ?><br/>
            <b><?php echo TariffContracts::model()->getAttributeLabel('Tarf_Cont_Pay_Id') ?>:</b> <?php echo $contract->getPayment(); ?><br/>
    </div>
</div>
<div class="clearfix" style="font-weight: normal; clear: both;"></div>

<div class="row" style="font-weight: normal; margin-right: -15px; margin-left: -15px;">
    <div class="col-xs-12" style="float: left;width: 96%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;">
        <p class="lead" style="margin-bottom: 20px;font-size: 16px;font-weight: 300;line-height: 1.4;">Royalty:</p>
        <div class="table-responsive" style="min-height: .01%;overflow-x: auto;">
            <table class="table" style="width: 100%;max-width: 100%;margin-bottom: 20px;text-align: left;border-collapse: collapse !important;">
                <tbody>
                    <tr>
                        <th style="width: 50%;border-bottom: 1px solid #cccccc;padding: 8px;"><?php echo ContractInvoice::model()->getAttributeLabel('Inv_Invoice') ?>:</th>
                        <td style="border-bottom: 1px solid #cccccc;padding: 8px;"><?php echo $model->Inv_Invoice; ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%;border-bottom: 1px solid #cccccc;padding: 8px;"><?php echo ContractInvoice::model()->getAttributeLabel('Inv_Amount') ?>:</th>
                        <td style="border-bottom: 1px solid #cccccc;padding: 8px;"><?php echo $model->Inv_Amount; ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%;border-bottom: 1px solid #cccccc;padding: 8px;">Contract Duration:</th>
                            <?php $diff = ContractInvoice::getContractDuration($contract->Tarf_Cont_Pay_Id, $model->Inv_Date, $contract->Tarf_Cont_To); ?>
                        <td style="border-bottom: 1px solid #cccccc;padding: 8px;"><?php echo $diff; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
