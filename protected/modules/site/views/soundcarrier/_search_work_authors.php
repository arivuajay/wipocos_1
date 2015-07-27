<div class="col-lg-12">
    <?php
    $rightholders = $work->workRightholders;
    $not_empty = true;
    $auth_count = 0;
    foreach ($rightholders as $key => $rightholder) {
        if (!empty($rightholder->workAuthor)) {
            if ($not_empty)
                $not_empty = false;
            $auth_count++;
        }
    }
    if (!$not_empty) {
        ?>
        <div class="alert alert-success alert-dismissable">
            <!--<i class="fa fa-check"></i>-->
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <b><?php echo $auth_count; ?> Author<?php echo $auth_count > 1 ? 's' : ''?> Added to Linked Rightholders !</b>
        </div>
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Authors</h3>
                </div>

                <div class="box-body" style="max-height: 300px; overflow-y: scroll">
                    <div class="form-group">
                        <table class="table table-striped table-bordered selectable" id="link-performer">
                            <thead>
                            <th>Rightholder Name</th>
                            <th>Internal Code</th>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($rightholders)) {
                                    foreach ($rightholders as $key => $rightholder) {
                                        if (!empty($rightholder->workAuthor)) {
                                            ?>
                                            <tr data-uid="<?php echo $rightholder->workAuthor->Auth_GUID ?>" data-name="<?php echo $rightholder->workAuthor->fullname ?>" data-intcode = "<?php echo $rightholder->workAuthor->Auth_Internal_Code ?>" data-rcdrole = "<?php echo $rightholder->Work_Right_Role ?>" data-rcdrolename = "<?php echo $rightholder->workRightRole->namewithcode ?>" data-eqlshare = "<?php echo $rightholder->Work_Right_Broad_Share ?>" data-eqlorg = "<?php echo $rightholder->Work_Right_Broad_Org_id ?>" data-blkshare = "<?php echo $rightholder->Work_Right_Mech_Share ?>" data-blkorg = "<?php echo $rightholder->Work_Right_Mech_Org_Id ?>">
                                                <td><?php echo $rightholder->workAuthor->fullname; ?></td>
                                                <td><?php echo $rightholder->workAuthor->Auth_Internal_Code; ?></td>
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
                                        'application.components.MyTbButton', array(
                                    'label' => 'New Performer',
                                    'context' => 'success',
                                    'htmlOptions' => array(
                                        'id' => 'rightauthorbutton',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#rightauthorModal',
                                        'class' => 'hide'
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
        echo '<div class="errorMessage text-center">No Authors Found</div>';
    }
    ?>
</div>