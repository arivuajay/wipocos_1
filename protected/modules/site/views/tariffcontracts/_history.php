<div class="box box-primary">
    <div class="box-header">
        <h4 class="box-title">Contract History</h4>
    </div>
    <div class="box-body no-padding">
        <?php if ($model->contractHistory) {
            ?>
            <table class="table table-bordered table-datatable">
                <thead>
                    <tr>
                        <th><?php echo TariffContractsHistory::model()->getAttributeLabel('Tarf_Hist_From'); ?></th>
                        <th><?php echo TariffContractsHistory::model()->getAttributeLabel('Tarf_Hist_To'); ?></th>
                        <th><?php echo TariffContractsHistory::model()->getAttributeLabel('Tarf_Hist_Tariff_Id'); ?></th>
                        <th><?php echo TariffContractsHistory::model()->getAttributeLabel('Tarf_Hist_Insp_Id'); ?></th>
                        <th><?php echo TariffContractsHistory::model()->getAttributeLabel('Tarf_Hist_Amt_Pay'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($model->contractHistory as $history) {
                        ?>
                        <tr>
                            <td><?php echo $history->Tarf_Hist_From ?></td>
                            <td><?php echo $history->Tarf_Hist_To ?></td>
                            <td><?php echo $history->tarfHistTariff->Tarif_Code ?></td>
                            <td><?php echo $history->tarfHistInsp->Insp_Name ?></td>
                            <td><?php echo $history->Tarf_Hist_Amt_Pay ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        <?php }else{ ?>    
        <div class="text-center" style="padding: 5px;">No Data Found</div>
        <?php } ?>    
    </div>
</div>

