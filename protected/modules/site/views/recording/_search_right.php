<!--<div class="col-lg-12 row">
    <div class="col-lg-12 col-md-12">
        <label class="control-label">Spotlight Search: </label>
        <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
    </div>
</div>-->
<div class="col-lg-12">
    <?php if (!empty($perfusers) || !empty($produsers)) { ?>
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
                                if ($perfusers) {
                                    foreach ($perfusers as $key => $user) {
                                        ?>
                                        <tr data-urole="PE" data-uid="<?php echo $user->Perf_Internal_Code ?>" data-name="<?php echo $user->Perf_First_Name.' '.$user->Perf_Sur_Name; ?>">
                                            <td><?php echo $user->Perf_First_Name ?></td>
                                            <td><?php echo $user->Perf_Sur_Name ?></td>
                                            <td><?php echo $user->Perf_Internal_Code ?></td>
                                        </tr>
                                        <?php
                                    }
                                }

                                if ($produsers) {
                                    foreach ($produsers as $key => $user) {
                                        ?>
                                        <tr data-urole="PR" data-uid="<?php echo $user->Pro_Internal_Code ?>" data-name="<?php echo $user->Pro_Corporate_Name; ?>">
                                            <td><?php echo $user->Pro_Corporate_Name ?></td>
                                            <td><?php echo $user->Pro_Ipi_Base_Number ?></td>
                                            <td><?php echo $user->Pro_Internal_Code ?></td>
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
        <?php }
    ?>
</div>
