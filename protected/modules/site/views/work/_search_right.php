<?php if (!empty($authusers) || !empty($publusers)) {?>
<div class="box-body">
    <div class="form-group foundation">
        <div class="box-header">
            <h3 class="box-title">Search Results</h3>
        </div>
        <div class="box-body"  style="max-height: 300px; overflow-y: scroll">
            <table id="search_result" class="table table-bordered selectable">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Internal Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($authusers) {
                        foreach ($authusers as $key => $user) {
                            ?>
                            <tr data-urole="AU" data-uid="<?php echo $user->Auth_Internal_Code ?>" data-name="<?php echo $user->Auth_First_Name; ?>">
                                <td><?php echo $user->Auth_First_Name ?></td>
                                <td><?php echo $user->Auth_Sur_Name ?></td>
                                <td><?php echo $user->Auth_Internal_Code ?></td>
                            </tr>
                            <?php
                        }
                    }

                    if ($publusers) {
                        foreach ($publusers as $key => $user) {
                            ?>
                            <tr data-urole="PU" data-uid="<?php echo $user->Pub_Internal_Code ?>" data-name="<?php echo $user->Pub_Corporate_Name; ?>">
                                <td><?php echo $user->Pub_Corporate_Name ?></td>
                                <td><?php echo $user->Pub_Ipi_Base_Number ?></td>
                                <td><?php echo $user->Pub_Internal_Code ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php }?>