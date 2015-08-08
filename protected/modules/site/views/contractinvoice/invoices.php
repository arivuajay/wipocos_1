<?php
$invoices = $model->contractInvoices;
if (!empty($invoices)) {
    ?>
    <div class="form-group foundation">
        <div class="box-header">
            <div class="col-lg-12 col-md-12">
                <h3 class="box-title">Generated Invoices</h3>
            </div>

        </div>
        <div class="box-body"  style="max-height: 300px; overflow-y: scroll">
            <div class="col-lg-12 col-md-12 row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo ContractInvoice::model()->getAttributeLabel('Inv_Invoice'); ?></th>
                            <th><?php echo ContractInvoice::model()->getAttributeLabel('Inv_Date'); ?></th>
                            <th><?php echo ContractInvoice::model()->getAttributeLabel('Inv_Amount'); ?></th>
                            <th><?php echo ContractInvoice::model()->getAttributeLabel('Inv_Next_Date'); ?></th>
                            <th><?php echo ContractInvoice::model()->getAttributeLabel('Inv_Repeat_Id'); ?></th>
                            <th><?php echo ContractInvoice::model()->getAttributeLabel('Inv_Repeat_Count'); ?></th>
                            <th align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($invoices as $key => $invoice) {
                            ?>
                            <tr>
                                <td><?php echo $invoice->Inv_Invoice ?></td>
                                <td><?php echo $invoice->Inv_Date ?></td>
                                <td><?php echo $invoice->Inv_Amount ?></td>
                                <td><?php echo $invoice->Inv_Next_Date ?></td>
                                <td><?php echo $invoice->getRepeat() ?></td>
                                <td><?php echo $invoice->Inv_Repeat_Count ?></td>
                                <td align="center">
                                    <?php echo MyHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('/site/contractinvoice/view', 'id' => $invoice->Inv_Id), array('title' => 'View', 'target' => '_blank'));?>&nbsp;
                                    <?php echo MyHtml::link('<i class="glyphicon glyphicon-list-alt"></i>', array('/site/contractinvoice/invoice', 'id' => $invoice->Inv_Id), array('title' => 'View Invoice', 'target' => '_blank'));?>&nbsp;
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">

        </div>
    </div>

    <?php
} else {
//    echo '<div class="form-group"><div class="errorMessage text-center">No Invoices Generated</div></div>';
}
?>
