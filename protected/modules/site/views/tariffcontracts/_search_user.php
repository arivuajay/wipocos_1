<?php if (!empty($users)) { ?>
    <div class="box-body">
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
                                <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Code'); ?></th>
                                <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Code'); ?></th>
                                <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Address'); ?></th>
                                <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Email'); ?></th>
                                <th><?php echo CustomerUser::model()->getAttributeLabel('User_Cust_Telephone'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($users as $key => $user) {
                                ?>
                                <tr data-uid="<?php echo $user->User_Cust_GUID ?>" data-id="<?php echo $user->User_Cust_Id ?>" data-name="<?php echo $user->User_Cust_Code; ?>">
                                    <td><?php echo $user->User_Cust_Code ?></td>
                                    <td><?php echo $user->User_Cust_Code ?></td>
                                    <td><?php echo $user->User_Cust_Address ?></td>
                                    <td><?php echo $user->User_Cust_Email ?></td>
                                    <td><?php echo $user->User_Cust_Telephone ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>


    <?php
} else {
    echo '<div class="form-group"><div class="errorMessage text-center">No Users Found</div></div>';
}
?>
