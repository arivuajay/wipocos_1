<div class="col-lg-12">
    <?php
    $rightholders = $recording->recordingRightholders;
    $not_empty = true;
    $perf_count = 0;
    foreach ($rightholders as $key => $rightholder) {
        if (!empty($rightholder->recordingPerformer)) {
            if ($not_empty)
                $not_empty = false;
            $perf_count++;
        }
    }
    ?>
    <div id="alert-div">
    <?php
    if (!$not_empty) {
    ?>
    <div class="alert alert-success alert-dismissable">
        <!--<i class="fa fa-check"></i>-->
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <b><?php echo $perf_count; ?> Performer<?php echo $perf_count > 1 ? 's' : '' ?> Linked !</b>
    </div>
    <?php
    } else {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <!--<i class="fa fa-check"></i>-->
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <b>No Performers Linked !</b>
    </div>
    <?php
    }
    ?>
    </div>
    <div class="box-body hide">
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
                            if (!$not_empty) {
                                if (!empty($rightholders)) {
                                    foreach ($rightholders as $key => $rightholder) {
                                        if (!empty($rightholder->recordingPerformer)) {
                                            ?>
                                            <tr data-rcdrolename = "<?php echo $rightholder->rcdRightRole->namewithcode ?>" data-uid="<?php echo $rightholder->recordingPerformer->Perf_GUID ?>" data-name="<?php echo $rightholder->recordingPerformer->fullname ?>" data-intcode = "<?php echo $rightholder->recordingPerformer->Perf_Internal_Code ?>" data-rcdrole = "<?php echo $rightholder->Rcd_Right_Role ?>" data-eqlshare = "<?php echo $rightholder->Rcd_Right_Equal_Share ?>" data-eqlorg = "<?php echo $rightholder->Rcd_Right_Equal_Org_id ?>" data-blkshare = "<?php echo $rightholder->Rcd_Right_Blank_Share ?>" data-blkorg = "<?php echo $rightholder->Rcd_Right_Blank_Org_Id ?>">
                                                <td><?php echo $rightholder->recordingPerformer->fullname; ?></td>
                                                <td><?php echo $rightholder->recordingPerformer->Perf_Internal_Code; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                } else {
                                    echo "<tr id='norecord_tr_rec'><td colspan='8'>No data created</td></tr>";
                                }
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
                            <?php // echo CHtml::button('Add', array('class' => 'btn btn-primary', 'id' => 'add-performer-rec', 'disabled' => true));  ?>
                        </div>
                        <div class="col-lg-2">
                            <?php
//                            $this->widget(
//                                    'application.components.MyTbButton', array(
//                                'label' => 'New Performer',
//                                'context' => 'success',
//                                'htmlOptions' => array(
//                                    'id' => 'rightperformerbutton',
//                                    'data-toggle' => 'modal',
//                                    'data-target' => '#rightperformerModal',
////                                    'class' => 'hide'
//                                ),
//                                    )
//                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>