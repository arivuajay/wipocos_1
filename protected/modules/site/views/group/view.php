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
                    'booster.widgets.TbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Group_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Group_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Group_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
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
                        'name' => 'Active',
                        'type' => 'raw',
                        'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                    ),
                ),
            ));
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
                    array(
                        'name' => 'Group_Pseudo_Type_Id',
                        'value' => isset($psedonym_model->authPseudoType->Pseudo_Code) ? $psedonym_model->authPseudoType->Pseudo_Code : 'Not Set'
                    ),
                    'Group_Pseudo_Name',
                    array(
                        'name' => 'Active',
                        'type' => 'raw',
                        'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
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
                        'value' => isset($managed_model->authMngeInternalPosition->Int_Post_Name) ? $managed_model->authMngeInternalPosition->Int_Post_Name : 'Not Set'
                    ),
                    'Group_Mnge_Entry_Date_2',
                    'Group_Mnge_Exit_Date_2',
                    array(
                        'name' => 'Group_Mnge_Region_Id',
                        'value' => isset($managed_model->authMngeRegion->Region_Name) ? $managed_model->authMngeRegion->Region_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Group_Mnge_Profession_Id',
                        'value' => isset($managed_model->authMngeProfession->Profession_Name) ? $managed_model->authMngeProfession->Profession_Name : 'Not Set'
                    ),
                    'Group_Mnge_File',
                    'Group_Mnge_Duration',
                    array(
                        'name' => 'Group_Mnge_Avl_Work_Cat_Id',
                        'value' => isset($managed_model->authMngeAvlWorkCat->Work_Category_Name) ? $managed_model->authMngeAvlWorkCat->Work_Category_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Group_Mnge_Type_Rght_Id',
                        'value' => isset($managed_model->authMngeTypeRght->Type_Rights_Name) ? $managed_model->authMngeTypeRght->Type_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Group_Mnge_Managed_Rights_Id',
                        'value' => isset($managed_model->authMngeManagedRights->Mgd_Rights_Name) ? $managed_model->authMngeManagedRights->Mgd_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Group_Mnge_Territories_Id',
                        'value' => isset($managed_model->authMngeTerritories->Territory_Name) ? $managed_model->authMngeTerritories->Territory_Name : 'Not Set'
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
                        <th>Created</th>
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
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/group/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/group/biofiledelete/', 'id' => $uploaded_file->Group_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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