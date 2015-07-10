<!--<div class="col-lg-12 row">
    <div class="col-lg-12 col-md-12">
        <label class="control-label">Spotlight Search: </label>
        <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
    </div>
</div>-->
<div class="col-lg-12">
    <?php if (!empty($recordings)) { ?>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($recordings) {
                                    foreach ($recordings as $key => $recording) {
                                        ?>
                                        <tr data-urole="WK" data-uid="<?php echo $recording->Rcd_GUID ?>" data-name="<?php echo $recording->Rcd_Title; ?>" data-intcode = "<?php echo $recording->Rcd_Internal_Code ?>">
                                            <td><?php echo $recording->Rcd_Title ?></td>
                                            <td><?php echo $recording->Rcd_Internal_Code ?></td>
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
    <?php }else{
        echo '<div class="errorMessage text-center">No Recordings Found</div>';
    }
    ?>
</div>
