<?php
/* @var $this SoundcarrierController */
/* @var $model SoundCarrier */

$this->title = 'View SoundCarrier:' . $model->Sound_Car_Title;
$this->breadcrumbs = array(
    'Sound Carriers' => array('index'),
    'View ' . 'SoundCarrier',
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
                'url' => array('update', 'id' => $model->Sound_Car_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Sound_Car_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Sound_Car_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center"><?php echo $this->title ?></h3>
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
                'Sound_Car_Title',
                'Sound_Car_Internal_Code',
                array(
                    'name' => 'Sound_Car_Language_Id',
                    'value' => isset($model->soundCarLanguage->Lang_Name) ? $model->soundCarLanguage->Lang_Name : 'Not Set'
                ),
                'Sound_Car_Standardized_Code',
                'Sound_Car_Catelog',
                'Sound_Car_Barcode',
                'Sound_Car_Distributor',
                array(
                    'name' => 'Sound_Car_Language_Id',
                    'value' => isset($model->soundCarLabel->Label_Name) ? $model->soundCarLabel->Label_Name : 'Not Set'
                ),
                array(
                    'name' => 'Sound_Car_Medium',
                    'value' => isset($model->soundCarMedia->Medium_Name) ? $model->soundCarMedia->Medium_Name : 'Not Set'
                ),
                array(
                    'name' => 'Sound_Car_Type_Id',
                    'value' => isset($model->soundCarType->Type_Name) ? $model->soundCarType->Type_Name : 'Not Set'
                ),
                'Sound_Car_Main_Artist',
                'Sound_Car_Producer',
                array(
                    'name' => 'Sound_Car_Product_Country_Id',
                    'value' => isset($model->soundCarProductCountry->Country_Name) ? $model->soundCarProductCountry->Country_Name : 'Not Set'
                ),
                'Sound_Car_Year',
                'Sound_Car_Release_Year',
                array(
                    'name' => 'Sound_Car_Manf_Id',
                    'value' => isset($model->soundCarManf->Manf_Name) ? $model->soundCarManf->Manf_Name : 'Not Set'
                ),
                array(
                    'name' => 'Created_By',
                    'value' => isset($model->createdBy->name) ? $model->createdBy->name : ''
                ),
                array(
                    'name' => 'Created_Date',
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
        <h4>Documentation</h4>
        <?php
        if (!empty($document_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $document_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    array(
                        'name' => 'Sound_Car_Doc_Status_Id',
                        'value' => $document_model->soundCarDocStatus->Document_Sts_Name
                    ),
                    array(
                        'name' => 'Sound_Car_Doc_Type_Id',
                        'value' => $document_model->soundCarDocType->Doc_Name
                    ),
                    'Sound_Car_Doc_Sign_Date',
                    'Sound_Car_Doc_File',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($document_model->createdBy->name) ? $document_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created_Date',
                        'value' => $document_model->Created_Date
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($document_model->updatedBy->name) ? $document_model->updatedBy->name : ''
                    ),
                    array(
                        'name' => 'Updated Date',
                        'value' => $document_model->Rowversion
                    ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4>Biography</h4>
        <?php
        if (!empty($biograph_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $biograph_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Sound_Car_Biogrph_Annotation',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($biograph_model->createdBy->name) ? $biograph_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created_Date',
                        'value' => $biograph_model->Created_Date
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($biograph_model->updatedBy->name) ? $biograph_model->updatedBy->name : ''
                    ),
                    array(
                        'name' => 'Updated Date',
                        'value' => $biograph_model->Rowversion
                    ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4>Biography Uploaded Files</h4>
        <?php
        $uploaded_files = array();
        if (!empty($biograph_model))
            $uploaded_files = SoundCarrierBiographUploads::model()->findAll('Sound_Car_Biogrph_Id = :bio_id', array(':bio_id' => $biograph_model->Sound_Car_Biogrph_Id));
        if (!empty($uploaded_files)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Uploaded Files</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <?php
                            $file_path = $uploaded_file->getFilePath();
                            $i = $key + 1
                            ?>
                            <td><?php echo $i ?>.</td>
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "SoundCarrier Biograph {$i}" ?></a></td>
                            <td><?php echo $uploaded_file->Sound_Car_Biogrph_Upl_Description ?></td>
                            <td><?php echo $uploaded_file->Created ?></td>
                            <td><?php echo $uploaded_file->createdBy->name ?></td>
                            <td>
                                <?php
                                echo MyHtml::link('<i class="fa fa-download"></i>', array('/site/soundcarrier/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/soundcarrier/biofiledelete/', 'id' => $uploaded_file->Sound_Car_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => ".popup-link{$i}"));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo 'No data created';
        }
        ?>
    </div>

    <div class="user-view col-lg-12">
                <h4>Publication</h4>
        <?php
        if (!empty($publications)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo SoundCarrierPublication::model()->getAttributeLabel('Sound_Car_Publ_GUID') ?></th>
                        <th><?php echo SoundCarrierPublication::model()->getAttributeLabel('Sound_Car_Publ_Internal_Code') ?></th>
                        <th><?php echo SoundCarrierPublication::model()->getAttributeLabel('Sound_Car_Publ_Year') ?></th>
    <!--                        <th><?php echo SoundCarrierPublication::model()->getAttributeLabel('Sound_Car_Publ_Country_Id') ?></th>
                        <th><?php echo SoundCarrierPublication::model()->getAttributeLabel('Sound_Car_Publ_Prod_Nation_Id') ?></th>
                        <th><?php echo SoundCarrierPublication::model()->getAttributeLabel('Sound_Car_Publ_Studio') ?></th>-->
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($publications as $key => $publication) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td>
                                <?php
                                if ($publication->Sound_Car_Publ_Work_Type == 'W') {
                                    echo $publication->soundCarWork->Work_Org_Title;
                                } else {
                                    echo $publication->soundCarRecord->Rcd_Title;
                                }
                                ?>
                            </td>
                            <td><?php echo $publication->Sound_Car_Publ_Internal_Code ?></td>
                            <td><?php echo $publication->Sound_Car_Publ_Year ?></td>
        <!--                            <td><?php echo $publication->soundCarPublCountry->Country_Name ?></td>
                            <td><?php echo $publication->soundCarPublProdNation->Nation_Name ?></td>
                            <td><?php echo $publication->soundCarPublStudio->Studio_Name ?></td>-->
                            <td><?php echo $publication->createdBy->name ?></td>
                            <td><?php echo $publication->updatedBy->name ?></td>
                            <td>
                                <?php
                                echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/soundcarrier/update', 'id' => $publication->Sound_Car_Id, 'tab' => 3, 'pubedit' => $publication->Sound_Car_Publ_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/soundcarrier/publicationdelete', 'id' => $publication->Sound_Car_Publ_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
            <?php
        } else {
            echo 'No data created';
        }
        ?>

    </div>
    <div class="user-view col-lg-12">
                <h4>Fixation</h4>
        <?php
        if (!empty($fixations)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo SoundCarrierFixations::model()->getAttributeLabel('Sound_Car_Fix_GUID') ?></th>
                        <th><?php echo SoundCarrierFixations::model()->getAttributeLabel('Sound_Car_Fix_Duration') ?></th>
    <!--                        <th><?php echo SoundCarrierFixations::model()->getAttributeLabel('Sound_Car_Fix_Date') ?></th>
                        <th><?php echo SoundCarrierFixations::model()->getAttributeLabel('Sound_Car_Fix_Studio') ?></th>
                        <th><?php echo SoundCarrierFixations::model()->getAttributeLabel('Sound_Car_Fix_Country_Id') ?></th>-->
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Updated By</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($fixations as $key => $fixation) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td>
                                <?php
                                if ($fixation->Sound_Car_Fix_Work_Type == 'W') {
                                    echo $fixation->soundCarWork->Work_Org_Title;
                                } else {
                                    echo $fixation->soundCarRecord->Rcd_Title;
                                }
                                ?>
                            </td>
                            <td><?php echo $fixation->Sound_Car_Fix_Duration ?></td>
        <!--                            <td><?php echo $fixation->Sound_Car_Fix_Date ?></td>
                            <td><?php echo $fixation->soundCarFixStudio->Studio_Name ?></td>
                            <td><?php echo $fixation->soundCarFixCountry->Country_Name ?></td>-->
                            <td><?php echo $fixation->createdBy->name ?></td>
                            <td><?php echo $fixation->Created_Date ?></td>
                            <td><?php echo $fixation->updatedBy->name ?></td>
                            <td><?php echo $fixation->Rowversion ?></td>
                            <td>
                                <?php
                                echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/soundcarrier/update', 'id' => $fixation->Sound_Car_Id, 'tab' => 6, 'fixedit' => $fixation->Sound_Car_Fix_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/soundcarrier/fixationdelete', 'id' => $fixation->Sound_Car_Fix_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
            <?php
        } else {
            echo 'No data created';
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
                        <th><?php echo SoundCarrierSubtitle::model()->getAttributeLabel('Sound_Car_Subtitle_Name') ?></th>
                        <th><?php echo SoundCarrierSubtitle::model()->getAttributeLabel('Sound_Car_Subtitle_Type_Id') ?></th>
                        <th><?php echo SoundCarrierSubtitle::model()->getAttributeLabel('Sound_Car_Subtitle_Language_Id') ?></th>
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
                            <td><?php echo $sub_title->Sound_Car_Subtitle_Name ?></td>
                            <td><?php echo $sub_title->soundCarSubtitleType->Type_Name ?></td>
                            <td><?php echo $sub_title->soundCarSubtitleLanguage->Lang_Name ?></td>
                            <td><?php echo $sub_title->createdBy->name ?></td>
                            <td><?php echo $sub_title->Created_Date ?></td>
                            <td><?php echo $sub_title->updatedBy->name ?></td>
                            <td><?php echo $sub_title->Rowversion ?></td>
                            <?php if ($export == false) { ?>
                                <td>
                                    <?php
                                    echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/soundcarrier/update/id/' . $sub_title->Sound_Car_Id . '/tab/4/edit/' . $sub_title->Sound_Car_Subtitle_Id), array('title' => 'Edit'));
                                    echo "&nbsp;&nbsp;";
                                    echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/soundcarrier/subtitledelete/id/' . $sub_title->Sound_Car_Subtitle_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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
        <h4>Right Holders - Works</h4>
        <?php
        if (!empty($work_members)) {
            ?>
            <div>
                <span>Created By: <?php echo $work_members[0]->createdBy->name ?></span><br />
                <span>Created Date: <?php echo $work_members[0]->Created_Date ?></span><br />
                <span>Updated By: <?php echo $work_members[0]->updatedBy->name ?></span><br />
                <span>Updated Date: <?php echo $work_members[0]->Rowversion ?></span><br /><br />
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th>#</th>
                            <th>Right Holder name</th>
                            <th>Internal Code</th>
                            <th>Work</th>
                            <th>Role</th>
                            <th>Equal Remuneration Points</th>
                            <th>Blank Levy Points</th>
                            <?php if ($export == false) { ?>
                                                        <!--<th>Action</th>-->
                            <?php } ?>
                        </tr>
                        <?php
                        foreach ($work_members as $key => $work_member) {
                            ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $work_member->rightholderAuthor->fullname; ?></td>
                                <td><?php echo $work_member->rightholderAuthor->Auth_Internal_Code; ?></td>
                                <td><?php echo $work_member->rightholderWork->Work_Org_Title; ?></td>
                                <td><?php echo $work_member->soundCarRightRole->rolename; ?></td>
                                <td><?php echo $work_member->Sound_Car_Right_Equal_Share; ?></td>
                                <td><?php echo $work_member->Sound_Car_Right_Blank_Share; ?></td>
                                <?php if ($export == false) { ?>
                                                            <!--<td><?php echo MyHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('/site/performeraccount/view', 'id' => $work_member->rightholderAuthor->Auth_Acc_Id)); ?></td>-->
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody></table>
            </div>
            <?php
        } else {
            echo 'No data created';
        }
        ?>

    </div>
    <div class="user-view col-lg-12">
        <h4>Right Holders - Recordings</h4>
        <?php
        if (!empty($rcd_members)) {
            ?>
            <div>
                <span>Created By: <?php echo $rcd_members[0]->createdBy->name ?></span><br />
                <span>Created Date: <?php echo $rcd_members[0]->Created_Date ?></span><br />
                <span>Updated By: <?php echo $rcd_members[0]->updatedBy->name ?></span><br />
                <span>Updated Date: <?php echo $rcd_members[0]->Rowversion ?></span><br /><br />
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th>#</th>
                            <th>Right Holder name</th>
                            <th>Internal Code</th>
                            <th>Recording</th>
                            <th>Role</th>
                            <th>Equal Remuneration Points</th>
                            <th>Blank Levy Points</th>
                            <?php if ($export == false) { ?>
                                                        <!--<th>Action</th>-->
                            <?php } ?>
                        </tr>
                        <?php
                        foreach ($rcd_members as $key => $rcd_member) {
                            ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $rcd_member->rightholderPerformer->fullname; ?></td>
                                <td><?php echo $rcd_member->rightholderPerformer->Perf_Internal_Code; ?></td>
                                <td><?php echo $rcd_member->rightholderRecord->Rcd_Title; ?></td>
                                <td><?php echo $rcd_member->soundCarRightRole->rolename; ?></td>
                                <td><?php echo $rcd_member->Sound_Car_Right_Equal_Share; ?></td>
                                <td><?php echo $rcd_member->Sound_Car_Right_Blank_Share; ?></td>
                                <?php if ($export == false) { ?>
                                                            <!--<td><?php echo MyHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('/site/performeraccount/view', 'id' => $rcd_member->rightholderPerformer->Perf_Acc_Id)); ?></td>-->
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody></table>
            </div>
            <?php
        } else {
            echo 'No data created';
        }
        ?>

    </div>

</div>



