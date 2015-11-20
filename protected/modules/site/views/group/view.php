<?php
/* @var $this GroupController */
/* @var $model Group */

if ($model->Group_Is_Author == '1') {
    $role = 'Author';
} elseif ($model->Group_Is_Performer == '1') {
    $role = 'Performer';
}

$this->title = "View Group: {$model->Group_Name}";
$this->breadcrumbs = array(
    "{$role} Groups" => array('group/index/role/' . lcfirst($role)),
    'View ' . 'Group',
);
?>
<?php if ($export) { ?>
    <h3 class="text-center"><?php echo "$role Group $this->title" ?></h3>
<?php } ?>


<div class="user-view">
    <p>
        <?php
        if ($export == false) {
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Group_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Group_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Group_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
//
                    )
            );
        }
        ?>
    </p>
</div>

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
                'Group_Name',
//            array(
//                'name' => 'Group_Is_Author',
//                'type' => 'raw',
//                'value' => ($model->Group_Is_Author == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
//            array(
//                'name' => 'Group_Is_Performer',
//                'type' => 'raw',
//                'value' => ($model->Group_Is_Performer == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
                array(
                    'name' => 'Group_Photo',
                    'type' => 'raw',
                    'value' => $photo
                ),
                'Group_Internal_Code',
                'Group_IPN_Base_Number',
                'Group_IPI_Name_Number',
                'Group_IPN_Number',
                'Group_Date',
                'Group_Place',
                array(
                    'name' => 'Group_Country_Id',
                    'value' => isset($model->groupCountry->Country_Name) ? $model->groupCountry->Country_Name : 'Not set'
                ),
                array(
                    'name' => 'Group_Legal_Form_Id',
                    'value' => isset($model->groupLegalForm->Legal_Form_Name) ? $model->groupLegalForm->Legal_Form_Name : 'Not set'
                ),
                array(
                    'name' => 'Group_Language_Id',
                    'value' => isset($model->groupLanguage->Lang_Name) ? $model->groupLanguage->Lang_Name : 'Not set'
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
        <h4>Representatives</h4>
        <?php
        if (!empty($address_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $address_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Group_Rep_Name',
                    'Group_Rep_Address_1',
                    'Group_Rep_Address_2',
                    'Group_Rep_Address_3',
                    'Group_Rep_Address_4',
                    'Group_Home_Address_1',
                    'Group_Home_Address_2',
                    'Group_Home_Address_3',
                    'Group_Home_Address_4',
                    'Group_Home_Fax',
                    'Group_Home_Telephone',
                    'Group_Home_Email',
                    'Group_Home_Website',
                    'Group_Mailing_Address_1',
                    'Group_Mailing_Address_2',
                    'Group_Mailing_Address_3',
                    'Group_Mailing_Address_4',
                    'Group_Mailing_Telephone',
                    'Group_Mailing_Fax',
                    'Group_Mailing_Email',
                    'Group_Mailing_Website',
                    'Group_Country_Id',
                    array(
                        'name' => 'Group_Unknown_Address',
                        'type' => 'raw',
                        'value' => $address_model->Group_Unknown_Address == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                    ),
                    array(
                        'name' => 'Created_By',
                        'value' => isset($address_model->createdBy->name) ? $address_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created Date',
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
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>

         <h4 class="box-title">Cross-references</h4>
        <?php
        $pseudonyms = GroupPseudonym::model()->findAll('Group_Id = :group_acc_id', array(':group_acc_id' => $model->Group_Id));
        if (!empty($pseudonyms)) {
            ?>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th>#</th>
                            <th>Group Pseudo Type </th>
                            <th>Group Pseudo Name </th>
                            <th>Created By</th>
                            <th>Updated By</th>
                        </tr>
                        <?php foreach ($pseudonyms as $key => $pseudonym) { ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $pseudonym->groupPseudoType->Pseudo_Code ?></td>
                                <td><?php echo $pseudonym->Group_Pseudo_Name ?></td>
                                <td><?php echo $pseudonym->createdBy->name ?></td>
                                <td><?php echo $pseudonym->updatedBy->name ?></td>
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
                    array(
                        'name' => 'groupPayMethod',
                        'type' => 'raw',
                        'value' => $payment_model->groupPayMethod->Paymode_Name
                    ),
                    'Group_Bank_Account_1',
                    'Group_Bank_Account_2',
                    'Group_Bank_Account_3',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($payment_model->createdBy->name) ? $payment_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created Date',
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
        <h4>Cross-references</h4>
        <?php
        if (!empty($psedonym_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $psedonym_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    array(
                        'name' => 'Group_Pseudo_Type_Id',
                        'value' => isset($psedonym_model->groupPseudoType->Pseudo_Code) ? $psedonym_model->groupPseudoType->Pseudo_Code : 'Not Set'
                    ),
                    'Group_Pseudo_Name',
//                    array(
//                        'name' => 'Active',
//                        'type' => 'raw',
//                        'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//                    ),
                    array(
                        'name' => 'Created_By',
                        'value' => isset($psedonym_model->createdBy->name) ? $psedonym_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created Date',
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


        <h4>Managed Rights</h4>
        <?php
        if (!empty($managed_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $managed_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
//        'Group_Mnge_Rgt_Id',
//        'Group_Mnge_Society_Id',
                    'Group_Mnge_Entry_Date',
                    'Group_Mnge_Exit_Date',
                    array(
                        'name' => 'Group_Mnge_Internal_Position_Id',
                        'value' => isset($managed_model->groupMngeInternalPosition->Int_Post_Name) ? $managed_model->groupMngeInternalPosition->Int_Post_Name : 'Not Set'
                    ),
                    'Group_Mnge_Entry_Date_2',
                    'Group_Mnge_Exit_Date_2',
                    array(
                        'name' => 'Group_Mnge_Region_Id',
                        'value' => isset($managed_model->groupMngeRegion->Region_Name) ? $managed_model->groupMngeRegion->Region_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Group_Mnge_Profession_Id',
                        'value' => isset($managed_model->groupMngeProfession->Profession_Name) ? $managed_model->groupMngeProfession->Profession_Name : 'Not Set'
                    ),
                    'Group_Mnge_File',
                    'Group_Mnge_Duration',
                    array(
                        'name' => 'Group_Mnge_Avl_Work_Cat_Id',
                        'value' => isset($managed_model->groupMngeAvlWorkCat->Work_Category_Name) ? $managed_model->groupMngeAvlWorkCat->Work_Category_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Group_Mnge_Type_Rght_Id',
                        'value' => isset($managed_model->groupMngeTypeRght->Type_Rights_Name) ? $managed_model->groupMngeTypeRght->Type_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Group_Mnge_Managed_Rights_Id',
                        'value' => isset($managed_model->groupMngeManagedRights->Mgd_Rights_Name) ? $managed_model->groupMngeManagedRights->Mgd_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Group_Mnge_Territories_Id',
                        'value' => isset($managed_model->groupMngeTerritories->Territory_Name) ? $managed_model->groupMngeTerritories->Territory_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'not_available',
                        'type' => 'raw',
                        'value' => $managed_model->not_available == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                    ),
                    array(
                        'name' => 'Created_By',
                        'value' => isset($managed_model->createdBy->name) ? $managed_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created Date',
                        'value' => $managed_model->Created_Date
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($managed_model->updatedBy->name) ? $managed_model->updatedBy->name : ''
                    ),
                    array(
                        'name' => 'Updated Date',
                        'value' => $managed_model->Rowversion
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
//        'Group_Biogrph_Id',
                    'Group_Biogrph_Annotation',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($biograph_model->createdBy->name) ? $biograph_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created Date',
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
            $uploaded_files = GroupBiographUploads::model()->findAll('Group_Biogrph_Id = :bio_id', array(':bio_id' => $biograph_model->Group_Biogrph_Id));
        if (!empty($uploaded_files)) {
            if ($model->Group_Is_Author == '1') {
                $role = 'Author';
            } elseif ($model->Group_Is_Performer == '1') {
                $role = 'Performer';
            }
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
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "{$role} Group Biograph {$i}" ?></a></td>
                            <td><?php echo $uploaded_file->Group_Biogrph_Upl_Description ?></td>
                            <td><?php echo $uploaded_file->Created ?></td>
                            <td><?php echo $uploaded_file->createdBy->name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/group/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/group/biofiledelete/', 'id' => $uploaded_file->Group_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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
</div>