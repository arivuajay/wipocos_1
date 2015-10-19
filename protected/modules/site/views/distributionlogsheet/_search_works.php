<!--<div class="col-lg-12 row">
    <div class="col-lg-12 col-md-12">
        <label class="control-label">Spotlight Search: </label>
        <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
    </div>
</div>-->
<?php if (!empty($works)) { ?>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <div class="col-lg-12 col-md-12">
                        <h3 class="box-title">Works</h3>
                    </div>

                </div>

                <div class="box-body"  style="max-height: 300px; overflow-y: scroll">
                    <div class="col-lg-12 col-md-12 row">
                        <table id="record_search" class="table table-bordered selectable table-datatable">
                            <thead>
                                <tr>
                                    <th>Orginial Title</th>
                                    <th>Internal Code</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($works)) {
                                    foreach ($works as $key => $work) {
                                        ?>
                                        <tr data-uid="<?php echo $work->Work_GUID ?>" data-title="<?php echo $work->Work_Org_Title; ?>" data-intcode = "<?php echo $work->Work_Internal_Code ?>" data-duration_hours="<?php echo $work->duration_hours ?>" data-duration_minutes="<?php echo $work->duration_minutes ?>" data-duration_seconds="<?php echo $work->duration_seconds ?>" data-duration="<?php echo $work->Work_Duration ?>" data-date="">
                                            <td><?php echo $work->Work_Org_Title ?></td>
                                            <td><?php echo $work->Work_Internal_Code ?></td>
                                            <td class="td_rcd_duration" data-hour="<?php echo $work->duration_hours; ?>" data-minute="<?php echo $work->duration_minutes; ?>" data-second="<?php echo $work->duration_seconds; ?>"><?php echo $work->Work_Duration ?></td>
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
    </div>
    <?php
} else {
    echo '<div class="errorMessage text-center aft_search">No Works Found</div>';
}
?>