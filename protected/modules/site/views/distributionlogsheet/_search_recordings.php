<!--<div class="col-lg-12 row">
    <div class="col-lg-12 col-md-12">
        <label class="control-label">Spotlight Search: </label>
        <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
    </div>
</div>-->
<div class="col-lg-12">
    <div class="box-body">
        <div class="form-group foundation">
            <div class="box-header">
                <div class="col-lg-12 col-md-12">
                    <h3 class="box-title">Recordings</h3>
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
                            if (!empty($recordings)) {
                                foreach ($recordings as $key => $recording) {
                                    ?>
                                    <tr data-uid="<?php echo $recording->Rcd_GUID ?>" data-title="<?php echo $recording->Rcd_Title; ?>" data-intcode = "<?php echo $recording->Rcd_Internal_Code ?>" data-duration_hours="<?php echo $recording->duration_hours ?>" data-duration_minutes="<?php echo $recording->duration_minutes ?>" data-duration_seconds="<?php echo $recording->duration_seconds ?>" data-duration="<?php echo $recording->Rcd_Duration ?>" data-date="<?php echo $recording->Rcd_Date?>">
                                        <td><?php echo $recording->Rcd_Title ?></td>
                                        <td><?php echo $recording->Rcd_Internal_Code ?></td>
                                        <td class="td_rcd_duration" data-hour="<?php echo $recording->duration_hours; ?>" data-minute="<?php echo $recording->duration_minutes; ?>" data-second="<?php echo $recording->duration_seconds; ?>"><?php echo $recording->Rcd_Duration ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <div class="col-lg-10">
                            <?php
                            if(empty($recordings)){
                                echo '<div class="errorMessage text-center aft_search">No Recordings Found</div>';
                            }
                            ?>
                        </div>
                        <div class="col-lg-2"></div>
                        <?php // echo CHtml::button('Select', array('class' => 'btn btn-primary')); ?>
                        <?php // echo CHtml::resetButton('Clear', array('class' => 'btn btn-danger'));  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
