<?php
/* @var $this RecordingController */
/* @var $model Recording */

$this->title = "View Recording: {$model->Rcd_Title}";
$this->breadcrumbs = array(
    'Recordings' => array('index'),
    'View ' . 'Recording',
);
?>
<div class="user-view">
    <?php if ($export == false) {
        ?>
        <p>
            <?php
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Rcd_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Rcd_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Rcd_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
//
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">Recording <?php echo $this->title ?></h3>
        <?php
    }
    ?>
</div>

<div class="row">
    <div class="user-view col-lg-6">
        <h4>Basic Data</h4>
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'htmlOptions' => array('class' => 'table table-striped table-bordered'),
            'attributes' => array(
                'Rcd_Title',
                array(
                    'name' => 'Rcd_Language_Id',
                    'value' => isset($model->rcdLanguage->Lang_Name) ? $model->rcdLanguage->Lang_Name : 'Not Set'
                ),
                'Rcd_Internal_Code',
                array(
                    'name' => 'Rcd_Type_Id',
                    'value' => isset($model->rcdType->Type_Name) ? $model->rcdType->Type_Name : 'Not Set'
                ),
                'Rcd_Date',
                'Rcd_Duration',
                array(
                    'name' => 'Rcd_Record_Country_id',
                    'value' => isset($model->rcdRecordCountry->Country_Name) ? $model->rcdRecordCountry->Country_Name : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Product_Country_Id',
                    'value' => isset($model->rcdProductCountry->Country_Name) ? $model->rcdProductCountry->Country_Name : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Doc_Status_Id',
                    'value' => isset($model->rcdDocStatus->Document_Sts_Name) ? $model->rcdDocStatus->Document_Sts_Name : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Record_Type_Id',
                    'value' => Myclass::getMasterRecordType(TRUE, $model->Rcd_Record_Type_Id)
                ),
                array(
                    'name' => 'Rcd_Label_Id',
                    'value' => Myclass::getMasterLabel(TRUE, $model->Rcd_Label_Id)
                ),
                'Rcd_Reference',
                'Rcd_File',
                'Rcd_Isrc_Code',
                'Rcd_Iswc_Number',
                'Rcd_Author',
                'Rcd_Publisher',
                array(
                    'name' => 'Created_By',
                    'value' => isset($model->createdBy->name) ? $model->createdBy->name : ''
                ),
                array(
                    'name' => 'Created Date',
                    'value' => $model->Created_Date
                ),
                array(
                    'name' => 'Updated_By',
                    'value' => isset($model->updatedBy->name) ? $model->updatedBy->name : ''
                ),
                array(
                    'name' => 'Updated Date',
                    'value' => $model->Rowversion
                ),
            ),
        ));
        ?>
    </div>

    <div class="user-view col-lg-6">
        <h4>Publication</h4>
        <?php
        if (!empty($publication_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $publication_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Rcd_Publ_Internal_Code',
                    'Rcd_Publ_Year',
                    array(
                        'name' => 'Rcd_Publ_Country_Id',
                        'value' => isset($publication_model->rcdPublCountry->Country_Name) ? $publication_model->rcdPublCountry->Country_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Rcd_Publ_Prod_Nation_Id',
                        'value' => isset($publication_model->rcdPublProdNation->Nation_Name) ? $publication_model->rcdPublProdNation->Nation_Name : 'Not Set'
                    ),
                array(
                    'name' => 'Created_By',
                    'value' => isset($publication_model->createdBy->name) ? $publication_model->createdBy->name : ''
                ),
                array(
                    'name' => 'Created Date',
                    'value' => $publication_model->Created_Date
                ),
                array(
                    'name' => 'Updated_By',
                    'value' => isset($publication_model->updatedBy->name) ? $publication_model->updatedBy->name : ''
                ),
                array(
                    'name' => 'Updated Date',
                    'value' => $publication_model->Rowversion
                ),
                ),
            ));
        } else {
            echo 'No Publication created';
        }
        ?>

        <!--<h4 class="box-title">Artists - Producers</h4>-->
        <?php
        if (!empty($links)) {
            ?>
    <!--            <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th><?php echo RecordingLink::model()->getAttributeLabel('Rcd_Link_Title') ?></th>
                            <th><?php echo RecordingLink::model()->getAttributeLabel('Rcd_Perf_Id') ?></th>
                            <th><?php echo RecordingLink::model()->getAttributeLabel('Rcd_Prod_Id') ?></th>
            <?php if ($export == false) { ?>
                                    <th>Action</th>
            <?php } ?>
                        </tr>
            <?php foreach ($links as $key => $link) { ?>
                                <tr>
                                    <td><?php echo $key + 1 ?>.</td>
                                    <td><?php echo $link->Rcd_Link_Title ?></td>
                                    <td><?php echo $link->rcdPerf->Perf_First_Name . ' ' . $link->rcdPerf->Perf_Sur_Name ?></td>
                                    <td><?php echo $link->rcdProd->Pro_Corporate_Name ?></td>
                <?php if ($export == false) { ?>
                                            <td>
                    <?php
                    echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/recording/update/id/' . $link->Rcd_Id . '/tab/5/edit_link/' . $link->Rcd_Link_Id), array('title' => 'Edit'));
                    echo "&nbsp;&nbsp;";
                    echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/recording/linkdelete/id/' . $link->Rcd_Link_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                    ?>
                                            </td>
                <?php } ?>
                                </tr>
            <?php } ?>
                    </tbody></table>-->
            <?php
        } else {
//            echo 'No data created';
        }
        ?>
    </div>

    <div class="user-view col-lg-12">
                <h4 class="box-title">Sub Titles</h4>
        <?php
        if (!empty($sub_title_model)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo RecordingSubtitle::model()->getAttributeLabel('Rcd_Subtitle_Name') ?></th>
                        <th><?php echo RecordingSubtitle::model()->getAttributeLabel('Rcd_Subtitle_Type_Id') ?></th>
                        <th><?php echo RecordingSubtitle::model()->getAttributeLabel('Rcd_Subtitle_Language_Id') ?></th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Updated By</th>
                        <th>Updated Date</th>
                        <?php if ($export == false) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                    <?php foreach ($sub_title_model as $key => $sub_title) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $sub_title->Rcd_Subtitle_Name ?></td>
                            <td><?php echo $sub_title->rcdSubtitleType->Type_Name ?></td>
                            <td><?php echo $sub_title->rcdSubtitleLanguage->Lang_Name ?></td>
                            <td><?php echo $sub_title->createdBy->name ?></td>
                            <td><?php echo $sub_title->Created_Date ?></td>
                            <td><?php echo $sub_title->updatedBy->name ?></td>
                            <td><?php echo $sub_title->Rowversion ?></td>
                            <?php if ($export == false) { ?>
                                <td>
                                    <?php
                                    echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/recording/update/id/' . $sub_title->Rcd_Id . '/tab/2/edit/' . $sub_title->Rcd_Subtitle_Id), array('title' => 'Edit'));
                                    echo "&nbsp;&nbsp;";
                                    echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/recording/subtitledelete/id/' . $sub_title->Rcd_Subtitle_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                    ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo 'No Sub Titles created';
        }
        ?>

    </div>
    <div class="user-view col-lg-12">
        <h4 class="box-title">Right Holders</h4>
        <?php
        if (!empty($members)) {
            ?>
            <div>
                <span>Created By: <?php echo $members[0]->createdBy->name?></span><br />
                <span>Created Date: <?php echo $members[0]->Created_Date ?></span><br />
                <span>Updated By: <?php echo $members[0]->updatedBy->name?></span><br />
                <span>Updated Date: <?php echo $members[0]->Rowversion?></span><br /><br />
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th>#</th>
                            <th>Right Holder name</th>
                            <th>Internal Code</th>
                            <th>Role</th>
                            <th>Equitable Remuneration Points</th>
                            <!--<th>Organization</th>-->
                            <th>Blank Levy Points</th>
                            <th>Organization</th>
                            <?php if ($export == false) { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                        <?php
                        foreach ($members as $key => $member) {
                            if ($member->recordingPerformer) {
                                $name = $member->recordingPerformer->fullname;
                                $url = array('/site/performeraccount/view', 'id' => $member->recordingPerformer->Perf_Acc_Id);
                                $internal_code = $member->recordingPerformer->Perf_Internal_Code;
                            } elseif ($member->recordingProducer) {
                                $name = $member->recordingProducer->Pro_Corporate_Name;
                                $url = array('/site/produceraccount/view', 'id' => $member->recordingProducer->Pro_Acc_Id);
                                $internal_code = $member->recordingProducer->Pro_Internal_Code;
                            }
                            ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $internal_code; ?></td>
                                <td><?php echo $member->rcdRightRole->Type_Rights_Name; ?></td>
                                <td><?php echo $member->Rcd_Right_Equal_Share; ?></td>
                                <!--<td><?php echo $member->rcdRightBlankOrg->Org_Abbrevation; ?></td>-->
                                <td><?php echo $member->Rcd_Right_Blank_Share; ?></td>
                                <td><?php echo $member->rcdRightEqualOrg->Org_Abbrevation; ?></td>
                                <?php if ($export == false) { ?>
                                    <td><?php echo MyHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $url); ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody></table>
            </div>
            <?php
        } else {
            echo 'No Right Holders created';
        }
        ?>
    </div>
</div>



