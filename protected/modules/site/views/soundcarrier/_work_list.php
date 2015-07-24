<?php
$works = (new SoundCarrierRightholder)->distinctWorks($model->Sound_Car_Id);
?>
<div class="box box-primary">
    <div class="box-header">
        <h4 class="box-title">List of Works</h4>
    </div>
    <div class="box-body no-padding">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Internal Code</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($works)) {
                    foreach ($works as $key => $work) {
                        ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <?php if ($work->Sound_Car_Right_Work_Type == 'W') { ?>
                                <td><?php echo $work->rightholderWork->Work_Org_Title ?></td>
                                <td><?php echo $work->rightholderWork->Work_Internal_Code ?></td>
                            <?php } else if ($work->Sound_Car_Right_Work_Type == 'R') { ?>
                                <td><?php echo $work->rightholderRecord->Rcd_Title ?></td>
                                <td><?php echo $work->rightholderRecord->Rcd_Internal_Code ?></td>
                            <?php } ?>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="3">No Data Found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


