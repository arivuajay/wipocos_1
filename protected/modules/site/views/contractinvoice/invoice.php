<?php
$contract = $model->tarfCont;
$this->title = 'View Invoice: ' . $model->Inv_Invoice;
$this->breadcrumbs = array(
    'Invoice' => array('index'),
    'View Invoice',
);
?>
<!-- Main content -->
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Wipocos.
                <small class="pull-right">Date: <?php echo date('d-m-Y', strtotime($model->Inv_Date)); ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
            <p class="lead">User Details:</p>
            <address>
                <strong><?php echo $contract->tarfContUser->User_Cust_Name;?></strong><br>
                <?php echo $contract->tarfContUser->User_Cust_Name;?><br>
                <?php echo $contract->tarfContUser->User_Cust_Address;?><br>
                Phone: <?php echo $contract->tarfContUser->User_Cust_Telephone;?><br/>
                Fax: <?php echo $contract->tarfContUser->User_Cust_Fax;?><br/>
                Website: <?php echo CHtml::link($contract->tarfContUser->User_Cust_Website, $contract->tarfContUser->User_Cust_Website, array('target' => '_blank'));?><br/>
                Email: <?php echo CHtml::link($contract->tarfContUser->User_Cust_Email, "mailto:{$contract->tarfContUser->User_Cust_Email}", array());?>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-6 invoice-col">
            <p class="lead">Agreement:</p>
            <b>Invoice #<?php echo $model->Inv_Invoice;?></b><br/>
            <b>Paid Amount: </b><?php echo $model->Inv_Amount;?><br/>
            <b>Contract Number:</b> <?php echo $contract->Tarf_Cont_Internal_Code;?><br/>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
<!--        <div class="col-xs-6 table-responsive">
            <p class="lead">Establishment:</p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">City:</th>
                        <td><?php echo $contract->tarfContCity->City_Name;?></td>
                    </tr>
                    <tr>
                        <th>District:</th>
                        <td><?php echo $contract->Tarf_Cont_District;?></td>
                    </tr>
                    <tr>
                        <th>Area:</th>
                        <td><?php echo $contract->Tarf_Cont_Area;?></td>
                    </tr>
                    <tr>
                        <th>Tariff Code:</th>
                        <td><?php echo $contract->tarfContTariff->Tarif_Description;?></td>
                    </tr>
                    <tr>
                        <th>Inspector:</th>
                        <td><?php echo $contract->tarfContInsp->Insp_Name;?></td>
                    </tr>
                    <tr>
                        <th>Balance:</th>
                        <td><?php echo $contract->Tarf_Cont_Balance;?></td>
                    </tr>
                </table>
            </div>
        </div>-->

<!--        <div class="col-xs-6">

            <p class="lead">Event:</p>
            <table class="table">
                <tr>
                    <th style="width:50%">Type:</th>
                    <td><?php echo $contract->tarfContEvent->Evt_Type_Name;?></td>
                </tr>
                <tr>
                    <th>Date:</th>
                    <td><?php echo $contract->Tarf_Cont_Event_Date;?></td>
                </tr>
            </table>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <b>Comment:</b> <?php echo $contract->Tarf_Cont_Event_Comment;?>
            </p>

        </div>-->
    </div>

    <div class="row">
        <div class="col-xs-12">
            <p class="lead">Royalty:</p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Amount to Pay:</th>
                        <td><?php echo $contract->Tarf_Cont_Amt_Pay;?></td>
                    </tr>
                    <tr>
                        <th>From:</th>
                        <td><?php echo $contract->Tarf_Cont_From;?></td>
                    </tr>
                    <tr>
                        <th>To:</th>
                        <td><?php echo $contract->Tarf_Cont_To;?></td>
                    </tr>
                    <tr>
                        <th>Date of signature:</th>
                        <td><?php echo $contract->Tarf_Cont_Sign_Date;?></td>
                    </tr>
                    <tr>
                        <th>Payment:</th>
                        <td><?php echo $contract->getPayment();?></td>
                    </tr>
                    <tr>
                        <th>Portion:</th>
                        <td><?php echo $contract->Tarf_Cont_Portion;?></td>
                    </tr>
                </table>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <b>Comment:</b> <?php echo $contract->Tarf_Cont_Comment;?>
                </p>
            </div>

        </div>
    </div>
</section>