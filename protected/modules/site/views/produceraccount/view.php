<?php
/* @var $this PerformeraccountController */
/* @var $model PerformerAccount */

$this->title = "View Producer: {$model->Pro_Corporate_Name}";
$this->breadcrumbs = array(
    'Producers' => array('index'),
    'View ' . 'PerformerAccount',
);
if ($export == false) {
    ?>
    <div class="user-view col-lg-12">
        <p>
            <?php
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Pro_Acc_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//                    
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Pro_Acc_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Pro_Acc_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
//                    
                    )
            );
            ?>
        </p>
    </div>
<?php } ?>

<?php if ($export) { ?>
    <h3 class="text-center"><?php echo $this->title ?></h3>
<?php } ?>

<div class="row">
    <div class="user-view col-lg-6">
        <h4>Basic Data</h4>
        <?php
        $file_path = $model->getFilePath();
        $photo = CHtml::link(CHtml::image($file_path, 'No Profile Picture', array('height' => '110px', 'width' => '110px')), $file_path, array('class' => 'popup-prof'));
        $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => ".popup-prof"));

        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'htmlOptions' => array('class' => 'table table-striped table-bordered'),
            'attributes' => array(
                'Pro_Internal_Code',
                'Pro_Corporate_Name',
                array(
                    'name' => 'Pro_Photo',
                    'type' => 'raw',
                    'value' => $photo
                ),
                'Pro_Ipi',
                'Pro_Ipi_Base_Number',
//                'Pro_Place',
                'Pro_Reg_Date',
                'Pro_Reg_Number',
                'Pro_Excerpt_Date',
                array(
                    'name' => 'Pro_Country_Id',
                    'value' => isset($model->proCountry->Country_Name) ? $model->proCountry->Country_Name : 'Not Set'
                ),
                array(
                    'name' => 'Pro_Language_Id',
                    'value' => isset($model->proLanguage->Lang_Name) ? $model->proLanguage->Lang_Name : 'Not Set'
                ),
                array(
                    'name' => 'Pro_Legal_Form_id',
                    'value' => isset($model->proLegalForm->Legal_Form_Name) ? $model->proLegalForm->Legal_Form_Name : 'Not Set'
                ),
                array(
                    'name' => 'Status',
                    'type' => 'raw',
                    'value' => $model->status
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

        <h4>Address</h4>
        <?php
        if (!empty($address_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $address_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Pub_Home_Address_1',
                    'Pub_Home_Address_2',
                    'Pub_Home_Address_3',
                    'Pub_Home_Fax',
                    'Pub_Home_Telephone',
                    'Pub_Home_Email',
                    'Pub_Home_Website',
                    'Pro_Mailing_Address_1',
                    'Pro_Mailing_Address_2',
                    'Pro_Mailing_Address_3',
                    'Pro_Mailing_Telephone',
                    'Pro_Mailing_Fax',
                    'Pro_Mailing_Email',
                    'Pro_Mailing_Website',
                    array(
                        'name' => 'Pro_Unknown_Address',
                        'type' => 'raw',
                        'value' => $address_model->Pro_Unknown_Address == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                    ),
                    array(
                        'name' => 'Created_By',
                        'value' => isset($address_model->createdBy->name) ? $address_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created_Date',
                        'value' => $address_model->Created_Date
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($address_model->updatedBy->name) ? $address_model->updatedBy->name : ''
                    ),
                    array(
                        'name' => 'Updated Date',
                        'value' => $address_model->Rowversion
                    ),
//        array(
//                'name' => 'Active',
//                'type' => 'raw',
//                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4>Assigned Recordings</h4>
        <?php
        $recordings = RecordingRightholder::model()->findAll('Rcd_Member_GUID = :int_code', array(':int_code' => $model->Pro_GUID));
        if (!empty($recordings)) {
            ?>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th>#</th>
                            <th>Recording Name</th>
                            <th>Internal Code</th>
                            <?php if ($export == false) { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                        <?php foreach ($recordings as $key => $recording) { ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $recording->rcd->Rcd_Title ?></td>
                                <td><?php echo $recording->rcd->Rcd_Internal_Code ?></td>
                                <?php if ($export == false) { ?>
                                    <td><?php echo MyHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('/site/recording/view', 'id' => $recording->Rcd_Id)); ?></td>
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

    <div class="user-view col-lg-6">
        <h4>Payment</h4>
        <?php
        if (!empty($payment_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $payment_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
//        'Pro_Pay_Method_id',
                    array(
                        'name' => 'Pro_Pay_Method_id',
                        'value' => isset($payment_model->proPayMethod->Paymode_Name) ? $payment_model->proPayMethod->Paymode_Name : 'Not Set'
                    ),
                    'Pro_Bank_Account',
                    'Pro_Pay_Address',
                    'Pro_Pay_Iban',
                    'Pro_Pay_Swift',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($payment_model->createdBy->name) ? $payment_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created_Date',
                        'value' => $payment_model->Created_Date
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($payment_model->updatedBy->name) ? $payment_model->updatedBy->name : ''
                    ),
                    array(
                        'name' => 'Updated Date',
                        'value' => $payment_model->Rowversion
                    ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4>Pseudonyms</h4>
        <?php
        if (!empty($psedonym_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $psedonym_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
//        'Pro_Pseudo_Type_Id',
                    array(
                        'name' => 'Pro_Pseudo_Type_Id',
                        'value' => isset($psedonym_model->proPseudoType->Pseudo_Code) ? $psedonym_model->proPseudoType->Pseudo_Code : 'Not Set'
                    ),
                    'Pro_Pseudo_Name',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($psedonym_model->createdBy->name) ? $psedonym_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created_Date',
                        'value' => $psedonym_model->Created_Date
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($psedonym_model->updatedBy->name) ? $psedonym_model->updatedBy->name : ''
                    ),
                    array(
                        'name' => 'Updated Date',
                        'value' => $psedonym_model->Rowversion
                    ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>


        <h4>Liquidation and Inheritance</h4>
        <?php
        if (!empty($death_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $death_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
//        'Pro_Death_Inhrt_Id',
                    'Pro_Suc_Name',
                    'Pro_Suc_Address_1',
                    'Pro_Suc_Address_2',
                    'Pro_Suc_Annotation',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($death_model->createdBy->name) ? $death_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created_Date',
                        'value' => $death_model->Created_Date
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($death_model->updatedBy->name) ? $death_model->updatedBy->name : ''
                    ),
                    array(
                        'name' => 'Updated Date',
                        'value' => $death_model->Rowversion
                    ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>

        <h4>Related Rights</h4>
        <?php
        if (!empty($related_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $related_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
//        'Pro_Rel_Rgt_Id',
//        'Pro_Rel_Society_Id',
                    'Pro_Rel_Entry_Date',
                    'Pro_Rel_Exit_Date',
                    array(
                        'name' => 'Pro_Rel_Internal_Position_Id',
                        'value' => isset($related_model->proRelInternalPosition->Int_Post_Name) ? $related_model->proRelInternalPosition->Int_Post_Name : 'Not Set'
                    ),
                    'Pro_Rel_Entry_Date_2',
                    'Pro_Rel_Exit_Date_2',
                    array(
                        'name' => 'Pro_Rel_Region_Id',
                        'value' => isset($related_model->proRelRegion->Region_Name) ? $related_model->proRelRegion->Region_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Pro_Rel_Profession_Id',
                        'value' => isset($related_model->proRelProfession->Profession_Name) ? $related_model->proRelProfession->Profession_Name : 'Not Set'
                    ),
                    'Pro_Rel_File',
                    'Pro_Rel_Duration',
                    array(
                        'name' => 'Pro_Rel_Avl_Work_Cat_Id',
                        'value' => isset($related_model->proRelAvlWorkCat->Work_Category_Name) ? $related_model->proRelAvlWorkCat->Work_Category_Name : 'Not Set'
                    ),
//        array(
//            'name' => 'Pro_Rel_Type_Rght_Id',
//            'value' => isset($related_model->proRelTypeRght->Type_Rights_Name) ? $related_model->proRelTypeRght->Type_Rights_Name : 'Not Set'
//        ),
                    array(
                        'name' => 'Pro_Rel_Managed_Rights_Id',
                        'value' => isset($related_model->proRelManagedRights->Mgd_Rights_Name) ? $related_model->proRelManagedRights->Mgd_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Pro_Rel_Territories_Id',
                        'value' => isset($related_model->proRelTerritories->Territory_Name) ? $related_model->proRelTerritories->Territory_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Created_By',
                        'value' => isset($related_model->createdBy->name) ? $related_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created_Date',
                        'value' => $related_model->Created_Date
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($related_model->updatedBy->name) ? $related_model->updatedBy->name : ''
                    ),
                    array(
                        'name' => 'Updated Date',
                        'value' => $related_model->Rowversion
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
//        'Pro_Biogrph_Id',
                    'Pro_Biogrph_Annotation',
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
        <h4 class="box-title">Biography Uploaded Files</h4>
        <?php
        $uploaded_files = array();
        if (!empty($biograph_model))
            $uploaded_files = ProducerBiographUploads::model()->findAll('Pro_Biogrph_Id = :bio_id', array(':bio_id' => $biograph_model->Pro_Biogrph_Id));
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
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "Producer Biograph {$i}" ?></a></td>
                            <td><?php echo $uploaded_file->Pro_Biogrph_Upl_Description ?></td>
                            <td><?php echo $uploaded_file->Created ?></td>
                            <td><?php echo $uploaded_file->createdBy->name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/produceraccount/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/produceraccount/biofiledelete/', 'id' => $uploaded_file->Pro_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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

        <h4>Assigned Groups</h4>
        <?php
        $members = PublisherGroupMembers::model()->findAll('Pub_Group_Member_GUID = :int_code', array(':int_code' => $model->Pro_GUID));
        if (!empty($members)) {
            ?>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Group Name</th>
                        </tr>
                        <?php foreach ($members as $key => $member) { ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $member->pubGroup->Pub_Group_Name ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo 'No data created';
        }
        ?>
    </div>
</div>

