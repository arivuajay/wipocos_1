<div class="col-lg-12">
    <?php
    $not_empty = true;
    $perf_count = 0;
    if (!empty($performers)) {
        if ($not_empty)
            $not_empty = false;
        $perf_count++;
    }
    if (!$not_empty) {
        ?>
        <!--        <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <b><?php echo $perf_count; ?> Performer<?php echo $perf_count > 1 ? 's' : '' ?> Added to Linked Rightholders !</b>
                </div>-->
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
                                if (!empty($performers)) {
                                    foreach ($performers as $key => $performer) {
                                        ?>
                                        <tr data-uid="<?php echo $performer->Perf_GUID ?>" data-name="<?php echo $performer->fullname ?>" data-intcode = "<?php echo $performer->Perf_Internal_Code ?>">
                                            <td><?php echo $performer->fullname; ?></td>
                                            <td><?php echo $performer->Perf_Internal_Code; ?></td>
                                        </tr>
                                        <?php
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
                                        'application.components.MyTbButton', array(
                                    'label' => 'New Performer',
                                    'context' => 'success',
                                    'htmlOptions' => array(
                                        'id' => 'rightperformerbutton',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#rightperformerModal',
//                                        'class' => 'hide'
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