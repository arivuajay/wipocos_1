<!--<div class="col-lg-12 row">
    <div class="col-lg-12 col-md-12">
        <label class="control-label">Spotlight Search: </label>
        <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
    </div>
</div>-->
<div class="col-lg-12">
    <?php if (!empty($works)) { ?>
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <div class="col-lg-12 col-md-12">
                        <h3 class="box-title">Works</h3>
                    </div>

                </div>
                <div class="box-body"  style="max-height: 300px; overflow-y: scroll">
                    <div class="col-lg-12 col-md-12 row">
                        <table id="search_result" class="table table-bordered selectable table-datatable">
                            <thead>
                                <tr>
                                    <th>Orginial Title</th>
                                    <th>Internal Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($works) {
                                    foreach ($works as $key => $work) {
                                        ?>
                                        <tr data-urole="WK" data-uid="<?php echo $work->Work_GUID ?>" data-name="<?php echo $work->Work_Org_Title; ?>" data-intcode = "<?php echo $work->Work_Internal_Code ?>">
                                            <td><?php echo $work->Work_Org_Title ?></td>
                                            <td><?php echo $work->Work_Internal_Code ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<!--                <div class="box-footer">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <?php echo CHtml::button('Select', array('class' => 'btn btn-primary')); ?>
                            <?php echo CHtml::resetButton('Clear', array('class' => 'btn btn-danger')); ?>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    <?php }
    ?>
</div>
