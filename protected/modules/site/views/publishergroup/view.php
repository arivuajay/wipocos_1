<?php
/* @var $this GroupController */
/* @var $model Group */

if ($model->Pub_Group_Is_Publisher == '1') {
    $role = 'Publisher';
} elseif ($model->Pub_Group_Is_Producer == '1') {
    $role = 'Producer';
}

$this->title = "View Group: {$model->Pub_Group_Name}";
$this->breadcrumbs = array(
    "{$role} Groups" => array('publishergroup/index/role/' . lcfirst($role)),
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
                'url' => array('update', 'id' => $model->Pub_Group_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//                    
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Pub_Group_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Pub_Group_Id, 'export' => 'PDF'),
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
                'Pub_Group_Name',
//            array(
//                'name' => 'Pub_Group_Is_Publisher',
//                'type' => 'raw',
//                'value' => ($model->Pub_Group_Is_Publisher == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
//            array(
//                'name' => 'Pub_Group_Is_Producer',
//                'type' => 'raw',
//                'value' => ($model->Pub_Group_Is_Producer == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
                array(
                    'name' => 'Pub_Group_Photo',
                    'type' => 'raw',
                    'value' => $photo
                ),
                'Pub_Group_Internal_Code',
                'Pub_Group_IPN_Base_Number',
                'Pub_Group_IPI_Name_Number',
                'Pub_Group_IPN_Number',
                'Pub_Group_Date',
                'Pub_Group_Place',
                array(
                    'name' => 'Pub_Group_Country_Id',
                    'value' => isset($model->pubGroupCountry->Country_Name) ? $model->pubGroupCountry->Country_Name : 'Not set'
                ),
                array(
                    'name' => 'Pub_Group_Legal_Form_Id',
                    'value' => isset($model->pubGroupLegalForm->Legal_Form_Name) ? $model->pubGroupLegalForm->Legal_Form_Name : 'Not set'
                ),
                array(
                    'name' => 'Pub_Group_Language_Id',
                    'value' => isset($model->pubGroupLanguage->Lang_Name) ? $model->pubGroupLanguage->Lang_Name : 'Not set'
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
                        'name' => 'Updated_By',
                        'value' => isset($model->updatedBy->name) ? $model->updatedBy->name : ''
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
                    'Pub_Group_Rep_Name',
                    'Pub_Group_Rep_Address_1',
                    'Pub_Group_Rep_Address_2',
                    'Pub_Group_Rep_Address_3',
                    'Pub_Group_Rep_Address_4',
                    'Pub_Group_Home_Address_1',
                    'Pub_Group_Home_Address_2',
                    'Pub_Group_Home_Address_3',
                    'Pub_Group_Home_Address_4',
                    'Pub_Group_Home_Fax',
                    'Pub_Group_Home_Telephone',
                    'Pub_Group_Home_Email',
                    'Pub_Group_Home_Website',
                    'Pub_Group_Mailing_Address_1',
                    'Pub_Group_Mailing_Address_2',
                    'Pub_Group_Mailing_Address_3',
                    'Pub_Group_Mailing_Address_4',
                    'Pub_Group_Mailing_Telephone',
                    'Pub_Group_Mailing_Fax',
                    'Pub_Group_Mailing_Email',
                    'Pub_Group_Mailing_Website',
                    'Pub_Group_Country_Id',
                    array(
                        'name' => 'Pub_Group_Unknown_Address',
                        'type' => 'raw',
                        'value' => $address_model->Pub_Group_Unknown_Address == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                    ),
//                    array(
//                        'name' => 'Active',
//                        'type' => 'raw',
//                        'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//                    ),
                    array(
                        'name' => 'Created_By',
                        'value' => isset($address_model->createdBy->name) ? $address_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($address_model->updatedBy->name) ? $address_model->updatedBy->name : ''
                    ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
    </div>

    <div class="user-view col-lg-6">
        <h4>Payments - Copyright</h4>
        <?php
        if (!empty($payment_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $payment_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Pub_Group_Pay_Copy_Payee',
                    'Pub_Group_Pay_Copy_Rate',
                    'Pub_Group_Pay_Copy_Pay_Method',
                    'Pub_Group_Pay_Copy_Bank_Account',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($payment_model->createdBy->name) ? $payment_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($payment_model->updatedBy->name) ? $payment_model->updatedBy->name : ''
                    ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4>Payments – Related Rights</h4>
        <?php
        if (!empty($rel_payment_exists)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $rel_payment_exists,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Pub_Group_Pay_Rel_Payee',
                    'Pub_Group_Pay_Rel_Rate',
                    'Pub_Group_Pay_Rel_Pay_Method',
                    'Pub_Group_Pay_Rel_Bank_Account',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($rel_payment_exists->createdBy->name) ? $rel_payment_exists->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($rel_payment_exists->updatedBy->name) ? $rel_payment_exists->updatedBy->name : ''
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
                        'name' => 'Pub_Group_Pseudo_Type_Id',
                        'value' => isset($psedonym_model->pubGroupPseudoType->Pseudo_Code) ? $psedonym_model->pubGroupPseudoType->Pseudo_Code : 'Not Set'
                    ),
                    'Pub_Group_Pseudo_Name',
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
                        'name' => 'Updated_By',
                        'value' => isset($psedonym_model->updatedBy->name) ? $psedonym_model->updatedBy->name : ''
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
//        'Pub_Group_Mnge_Rgt_Id',
//        'Pub_Group_Mnge_Society_Id',
                    'Pub_Group_Mnge_Entry_Date',
                    'Pub_Group_Mnge_Exit_Date',
                    array(
                        'name' => 'Pub_Group_Mnge_Internal_Position_Id',
                        'value' => isset($managed_model->pubGroupMngeInternalPosition->Int_Post_Name) ? $managed_model->pubGroupMngeInternalPosition->Int_Post_Name : 'Not Set'
                    ),
                    'Pub_Group_Mnge_Entry_Date_2',
                    'Pub_Group_Mnge_Exit_Date_2',
                    array(
                        'name' => 'Pub_Group_Mnge_Region_Id',
                        'value' => isset($managed_model->pubGroupMngeRegion->Region_Name) ? $managed_model->pubGroupMngeRegion->Region_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Pub_Group_Mnge_Profession_Id',
                        'value' => isset($managed_model->pubGroupMngeProfession->Profession_Name) ? $managed_model->pubGroupMngeProfession->Profession_Name : 'Not Set'
                    ),
                    'Pub_Group_Mnge_File',
                    'Pub_Group_Mnge_Duration',
                    array(
                        'name' => 'Pub_Group_Mnge_Avl_Work_Cat_Id',
                        'value' => isset($managed_model->pubGroupMngeAvlWorkCat->Work_Category_Name) ? $managed_model->pubGroupMngeAvlWorkCat->Work_Category_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Pub_Group_Mnge_Type_Rght_Id',
                        'value' => isset($managed_model->pubGroupMngeTypeRght->Type_Rights_Name) ? $managed_model->pubGroupMngeTypeRght->Type_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Pub_Group_Mnge_Managed_Rights_Id',
                        'value' => isset($managed_model->pubGroupMngeManagedRights->Mgd_Rights_Name) ? $managed_model->pubGroupMngeManagedRights->Mgd_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Pub_Group_Mnge_Territories_Id',
                        'value' => isset($managed_model->pubGroupMngeTerritories->Territory_Name) ? $managed_model->pubGroupMngeTerritories->Territory_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Created_By',
                        'value' => isset($managed_model->createdBy->name) ? $managed_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($managed_model->updatedBy->name) ? $managed_model->updatedBy->name : ''
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
//        'Pub_Group_Biogrph_Id',
                    'Pub_Group_Biogrph_Annotation',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($biograph_model->createdBy->name) ? $biograph_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($biograph_model->updatedBy->name) ? $biograph_model->updatedBy->name : ''
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
            $uploaded_files = PublisherGroupBiographUploads::model()->findAll('Pub_Group_Biogrph_Id = :bio_id', array(':bio_id' => $biograph_model->Pub_Group_Biogrph_Id));
        if (!empty($uploaded_files)) {
            if ($model->Pub_Group_Is_Publisher == '1') {
                $role = 'Publisher';
            } elseif ($model->Pub_Group_Is_Producer == '1') {
                $role = 'Producer';
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
                            <td><?php echo $uploaded_file->Pub_Group_Biogrph_Upl_Description ?></td>
                            <td><?php echo $uploaded_file->Created ?></td>
                            <td><?php echo $uploaded_file->createdBy->name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/publishergroup/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/publishergroup/biofiledelete/', 'id' => $uploaded_file->Pub_Group_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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