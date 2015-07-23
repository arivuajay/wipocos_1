<div class="box box-primary">
    <div class="box-header">
        <h4 class="box-title">List of All Right Holders in the Work</h4>
    </div>
    <div class="box-body no-padding">
        <table class="table table-striped table-bordered">
            <thead>
            <th>Recording</th>
            <th>Rightholder Name</th>
            <th>Internal Code</th>
            </thead>
            <tbody>
                <?php
                $i = 0;
                if (!empty($exists_model)) {
                    foreach ($exists_model as $key => $member) {
                        ?>
                        <tr>
                            <td><?php echo $member->rightholderWork->Work_Org_Title; ?></td>
                            <?php if ($member->Sound_Car_Right_Member_Type == 'P') { ?>
                                <td><?php echo $member->rightholderPerformer->fullname; ?></td>
                                <td><?php echo $member->rightholderPerformer->Perf_Internal_Code; ?></td>
                            <?php } else if ($member->Sound_Car_Right_Member_Type == 'A') { ?>
                                <td><?php echo $member->rightholderAuthor->fullname; ?></td>
                                <td><?php echo $member->rightholderAuthor->Auth_Internal_Code; ?></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $i++;
                    }
                } else {
                    echo "<tr id='norecord_tr_rec'><td colspan='8'>No data created</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


