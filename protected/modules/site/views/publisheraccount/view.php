<?php
/* @var $this ProduceraccountController */
/* @var $model ProducerAccount */

$this->title = "View Publisher: {$model->Pub_Corporate_Name}";
$this->breadcrumbs = array(
    'Producers' => array('index'),
    'View ' . 'ProducerAccount',
);
if ($export == false) {
    ?>
    <div class="user-view col-lg-12">
        <p>
            <?php
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Pub_Acc_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//                    
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Pub_Acc_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Pub_Acc_Id, 'export' => 'PDF'),
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
                'Pub_Internal_Code',
                'Pub_Corporate_Name',
                array(
                    'name' => 'Pub_Photo',
                    'type' => 'raw',
                    'value' => $photo
                ),
                'Pub_Ipi',
                'Pub_Ipi_Base_Number',
//                'Pub_Place',
                'Pub_Reg_Date',
                'Pub_Reg_Number',
                'Pub_Excerpt_Date',
                array(
                    'name' => 'Pub_Country_Id',
                    'value' => isset($model->pubCountry->Country_Name) ? $model->pubCountry->Country_Name : 'Not Set'
                ),
                array(
                    'name' => 'Pub_Language_Id',
                    'value' => isset($model->pubLanguage->Lang_Name) ? $model->pubLanguage->Lang_Name : 'Not Set'
                ),
                array(
                    'name' => 'Pub_Legal_Form_id',
                    'value' => isset($model->pubLegalForm->Legal_Form_Name) ? $model->pubLegalForm->Legal_Form_Name : 'Not Set'
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
                    'Pub_Head_Address_1',
                    'Pub_Head_Address_2',
                    'Pub_Head_Address_3',
                    'Pub_Head_Fax',
                    'Pub_Head_Telephone',
                    'Pub_Head_Email',
                    'Pub_Head_Website',
                    'Pub_Mailing_Address_1',
                    'Pub_Mailing_Address_2',
                    'Pub_Mailing_Address_3',
                    'Pub_Mailing_Telephone',
                    'Pub_Mailing_Fax',
                    'Pub_Mailing_Email',
                    'Pub_Mailing_Website',
                    array(
                        'name' => 'Pub_Unknown_Address',
                        'type' => 'raw',
                        'value' => $address_model->Pub_Unknown_Address == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
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
        <h4>Assigned Groups</h4>
        <?php
        $members = PublisherGroupMembers::model()->findAll('Pub_Group_Member_GUID = :int_code', array(':int_code' => $model->Pub_GUID));
        if (!empty($members)) {
            ?>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody><tr>
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
        <h4>Assigned Works</h4>
        <?php
        $works = WorkRightholder::model()->findAll('Work_Member_GUID = :int_code', array(':int_code' => $model->Pub_GUID));
        if (!empty($works)) {
            ?>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th>#</th>
                            <th>Works Name</th>
                            <th>Internal Code</th>
                            <?php if ($export == false) { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                        <?php foreach ($works as $key => $work) { ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $work->work->Work_Org_Title ?></td>
                                <td><?php echo $work->work->Work_Internal_Code ?></td>
                                <?php if ($export == false) { ?>
                                    <td><?php echo MyHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('/site/work/view', 'id' => $work->Work_Id)); ?></td>
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
//        'Pub_Pay_Method_id',
                    array(
                        'name' => 'Pub_Pay_Method_id',
                        'value' => isset($payment_model->pubPayMethod->Paymode_Name) ? $payment_model->pubPayMethod->Paymode_Name : 'Not Set'
                    ),
                    'Pub_Bank_Account',
                    'Pub_Pay_Address',
                    'Pub_Pay_Iban',
                    'Pub_Pay_Swift',
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
//        'Pub_Pseudo_Type_Id',
                    array(
                        'name' => 'Pub_Pseudo_Type_Id',
                        'value' => isset($psedonym_model->pubPseudoType->Pseudo_Code) ? $psedonym_model->pubPseudoType->Pseudo_Code : 'Not Set'
                    ),
                    'Pub_Pseudo_Name',
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
//        'Pub_Death_Inhrt_Id',
                    'Pub_Suc_Name',
                    'Pub_Suc_Address_1',
                    'Pub_Suc_Address_2',
                    'Pub_Suc_Annotation',
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
        <h4>Managed Rights</h4>
        <?php
        if (!empty($managed_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $managed_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
//        'Pub_Mnge_Rgt_Id',
//        'Pub_Mnge_Society_Id',
                    'Pub_Mnge_Entry_Date',
                    'Pub_Mnge_Exit_Date',
                    array(
                        'name' => 'Pub_Mnge_Internal_Position_Id',
                        'value' => isset($managed_model->pubMngeInternalPosition->Int_Post_Name) ? $managed_model->pubMngeInternalPosition->Int_Post_Name : 'Not Set'
                    ),
                    'Pub_Mnge_Entry_Date_2',
                    'Pub_Mnge_Exit_Date_2',
                    array(
                        'name' => 'Pub_Mnge_Region_Id',
                        'value' => isset($managed_model->pubMngeRegion->Region_Name) ? $managed_model->pubMngeRegion->Region_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Pub_Mnge_Profession_Id',
                        'value' => isset($managed_model->pubMngeProfession->Profession_Name) ? $managed_model->pubMngeProfession->Profession_Name : 'Not Set'
                    ),
                    'Pub_Mnge_File',
                    'Pub_Mnge_Duration',
                    array(
                        'name' => 'Pub_Mnge_Avl_Work_Cat_Id',
                        'value' => isset($managed_model->pubMngeAvlWorkCat->Work_Category_Name) ? $managed_model->pubMngeAvlWorkCat->Work_Category_Name : 'Not Set'
                    ),
//        array(
//            'name' => 'Pub_Mnge_Type_Rght_Id',
//            'value' => isset($managed_model->pubMngeTypeRght->Type_Rights_Name) ? $managed_model->pubMngeTypeRght->Type_Rights_Name : 'Not Set'
//        ),
                    array(
                        'name' => 'Pub_Mnge_Managed_Rights_Id',
                        'value' => isset($managed_model->pubMngeManagedRights->Mgd_Rights_Name) ? $managed_model->pubMngeManagedRights->Mgd_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Pub_Mnge_Territories_Id',
                        'value' => isset($managed_model->pubMngeTerritories->Territory_Name) ? $managed_model->pubMngeTerritories->Territory_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Created_By',
                        'value' => isset($managed_model->createdBy->name) ? $managed_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Created_Date',
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
//        'Pub_Biogrph_Id',
                    'Pub_Managers',
                    'Pub_Biogrph_Annotation',
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
            $uploaded_files = PublisherBiographUploads::model()->findAll('Pub_Biogrph_Id = :bio_id', array(':bio_id' => $biograph_model->Pub_Biogrph_Id));
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
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "Publisher Biograph {$i}" ?></a></td>
                            <td><?php echo $uploaded_file->Pub_Biogrph_Upl_Description ?></td>
                            <td><?php echo $uploaded_file->Created ?></td>
                            <td><?php echo $uploaded_file->createdBy->name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/publisheraccount/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/publisheraccount/biofiledelete/', 'id' => $uploaded_file->Pub_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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