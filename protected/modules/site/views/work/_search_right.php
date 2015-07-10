<!--<div class="col-lg-12 row">
    <div class="col-lg-12 col-md-12">
        <label class="control-label">Spotlight Search: </label>
        <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
    </div>
</div>-->
<div class="col-lg-12">
    <?php if (!empty($authusers) || !empty($publusers)) { ?>
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <div class="col-lg-12 col-md-12">
                        <h3 class="box-title">Rightholders</h3>
                    </div>

                </div>
                <div class="box-body"  style="max-height: 300px; overflow-y: scroll">
                    <div class="col-lg-12 col-md-12 row">
                        <table id="search_result" class="table table-bordered selectable table-datatable">
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
                                        <tr data-urole="AU" data-uid="<?php echo $user->Auth_GUID ?>" data-name="<?php echo $user->fullname; ?>" data-intcode = "<?php echo $user->Auth_Internal_Code ?>">
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
                                        <tr data-urole="PU" data-uid="<?php echo $user->Pub_GUID ?>" data-name="<?php echo $user->Pub_Corporate_Name; ?>" data-intcode = "<?php echo $user->Pub_Internal_Code ?>">
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
        </div>
    <?php }else{
        echo '<div class="errorMessage text-center">No Users Found</div>';
    }
    ?>
</div>
