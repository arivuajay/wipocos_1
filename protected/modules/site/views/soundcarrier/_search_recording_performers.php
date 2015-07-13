<div class="col-lg-12">
    <?php
    $rightholders = $recording->recordingRightholders;
    $not_empty = true;
    foreach ($rightholders as $key => $rightholder) {
        if (!empty($rightholder->recordingPerformer)) {
            $not_empty = false;
            break;
        }
    }
    if (!$not_empty) {
        ?>
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Performers</h3>
                </div>

                <div class="box-body" style="max-height: 300px; overflow-y: scroll">
                    <div class="form-group">
                        <table class="table table-striped table-bordered selectable" id="link-performer-rec">
                            <thead>
                            <th>Rightholder Name</th>
                            <th>Internal Code</th>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($rightholders)) {
                                    foreach ($rightholders as $key => $rightholder) {
                                        if (!empty($rightholder->recordingPerformer)) {
                                            ?>
                                            <tr data-uid="<?php echo $rightholder->recordingPerformer->Perf_GUID ?>" data-name="<?php echo $rightholder->recordingPerformer->fullname ?>" data-intcode = "<?php echo $rightholder->recordingPerformer->Perf_Internal_Code ?>">
                                                <td><?php echo $rightholder->recordingPerformer->fullname; ?></td>
                                                <td><?php echo $rightholder->recordingPerformer->Perf_Internal_Code; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                } else {
                                    echo "<tr id='norecord_tr_rec'><td colspan='8'>No data created</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                    <div class="form-group">
                        <div class="col-lg-10">
                            <?php // echo CHtml::button('Add', array('class' => 'btn btn-primary', 'id' => 'add-performer-rec', 'disabled' => true)); ?>
                        </div>
                        <div class="col-lg-2">
                            <?php
                            $this->widget(
                                    'booster.widgets.TbButton', array(
                                'label' => 'New Performer',
                                'context' => 'success',
                                'htmlOptions' => array(
                                    'id' => 'rightperformerbutton',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#rightperformerModal',
                                ),
                                    )
                            );
                            ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="errorMessage text-center">No Performers Found</div>';
    }
    ?>
</div>