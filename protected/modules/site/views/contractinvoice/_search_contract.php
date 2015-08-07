<?php if (!empty($contracts)) { ?>
    <div class="form-group foundation">
        <div class="box-header">
            <div class="col-lg-12 col-md-12">
                <h3 class="box-title">Contracts</h3>
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
                        <?php
                        foreach ($contracts as $key => $contract) {
                            ?>
                        <tr data-uid="<?php echo $contract->Tarf_Cont_GUID ?>" data-id="<?php echo $contract->Tarf_Cont_Id ?>" data-custname = "<?php echo $contract->tarfContUser->User_Cust_Name; ?>" data-invoice = "<?php echo $contract->Tarf_Invoice; ?>" data-amount = "<?php echo $contract->Tarf_Cont_Amt_Pay; ?>">
                                <td><?php echo $contract->Tarf_Cont_Internal_Code ?></td>
                                <!--<td><?php echo $contract->Tarf_Invoice ?></td>-->
                                <td><?php echo $contract->tarfContUser->User_Cust_Name ?></td>
                                <td><?php echo $contract->tarfContTariff->Tarif_Description ?></td>
                                <td><?php echo $contract->tarfContInsp->Insp_Name ?></td>
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
    echo '<div class="form-group"><div class="errorMessage text-center">No Contracts Found</div></div>';
}
?>
