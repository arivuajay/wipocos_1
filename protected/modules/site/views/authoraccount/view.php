<?php
/* @var $this AuthoraccountController */
/* @var $model AuthorAccount */
$this->title = "View Author: {$model->fullname}";
$this->breadcrumbs = array(
    'Authors' => array('index'),
    'View ' . 'AuthorAccount',
);
if ($export == false) {
    ?>
    <div class="user-view col-lg-12">
        <p>
            <?php
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Auth_Acc_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Auth_Acc_Id),
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
                'url' => array('view', 'id' => $model->Auth_Acc_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
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
                'Auth_Acc_Id',
                'Auth_Sur_Name',
                'Auth_First_Name',
                array(
                    'name' => 'Auth_Photo',
                    'type' => 'raw',
                    'value' => $photo
                ),
                'Auth_Internal_Code',
                'Auth_Ipi',
                'Auth_Ipi_Base_Number',
                'Auth_Ipn_Number',
                'Auth_DOB',
                array(
                    'name' => 'Auth_Place_Of_Birth_Id',
                    'value' => isset($model->authPlaceOfBirth->Region_Name) ? $model->authPlaceOfBirth->Region_Name : 'Not Set'
                ),
                array(
                    'name' => 'Auth_Birth_Country_Id',
                    'value' => isset($model->authBirthCountry->Country_Name) ? $model->authBirthCountry->Country_Name : 'Not Set'
                ),
                array(
                    'name' => 'Auth_Nationality_Id',
                    'value' => isset($model->authNationality->Nation_Name) ? $model->authNationality->Nation_Name : 'Not Set'
                ),
                array(
                    'name' => 'Auth_Language_Id',
                    'value' => isset($model->authLanguage->Lang_Name) ? $model->authLanguage->Lang_Name : 'Not Set'
                ),
                'Auth_Identity_Number',
                array(
                    'name' => 'Auth_Marital_Status_Id',
                    'value' => isset($model->authMaritalStatus->Marital_State) ? $model->authMaritalStatus->Marital_State : 'Not Set'
                ),
                'Auth_Spouse_Name',
                array(
                    'name' => 'Auth_Gender',
                    'value' => Myclass::getGender($model->Auth_Gender)
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
                    'Auth_Home_Address_1',
                    'Auth_Home_Address_2',
                    'Auth_Home_Address_3',
                    'Auth_Home_Fax',
                    'Auth_Home_Telephone',
                    'Auth_Home_Email',
                    'Auth_Home_Website',
                    'Auth_Mailing_Address_1',
                    'Auth_Mailing_Address_2',
                    'Auth_Mailing_Address_3',
                    'Auth_Mailing_Telephone',
                    'Auth_Mailing_Fax',
                    'Auth_Mailing_Email',
                    'Auth_Mailing_Website',
                    'Auth_Author_Account_1',
                    'Auth_Author_Account_2',
                    'Auth_Author_Account_3',
                    'Auth_Performer_Account_1',
                    'Auth_Performer_Account_2',
                    'Auth_Performer_Account_3',
                    array(
                        'name' => 'Auth_Unknown_Address',
                        'type' => 'raw',
                        'value' => $address_model->Auth_Unknown_Address == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
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
    </div>

    <div class="user-view col-lg-6">
        <h4>Payment</h4>
        <?php
        if (!empty($payment_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $payment_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
//        'Auth_Pay_Method_id',
                    'Auth_Bank_Account_1',
                    'Auth_Bank_Account_2',
                    'Auth_Bank_Account_3',
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
//        'Auth_Pseudo_Type_Id',
                    array(
                        'name' => 'Auth_Pseudo_Type_Id',
                        'value' => isset($psedonym_model->authPseudoType->Pseudo_Code) ? $psedonym_model->authPseudoType->Pseudo_Code : 'Not Set'
                    ),
                    'Auth_Pseudo_Name',
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>


        <h4>Death Inheritance</h4>
        <?php
        if (!empty($death_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $death_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
//        'Auth_Death_Inhrt_Id',
                    'Auth_Death_Inhrt_Firstname',
                    'Auth_Death_Inhrt_Surname',
                    'Auth_Death_Inhrt_Email',
                    'Auth_Death_Inhrt_Phone',
                    'Auth_Death_Inhrt_Address_1',
                    'Auth_Death_Inhrt_Address_2',
                    'Auth_Death_Inhrt_Address_3',
                    'Auth_Death_Inhrt_Addtion_Annotation',
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
//        'Auth_Mnge_Rgt_Id',
//        'Auth_Mnge_Society_Id',
                    'Auth_Mnge_Entry_Date',
                    'Auth_Mnge_Exit_Date',
                    array(
                        'name' => 'Auth_Mnge_Internal_Position_Id',
                        'value' => isset($managed_model->authMngeInternalPosition->Int_Post_Name) ? $managed_model->authMngeInternalPosition->Int_Post_Name : 'Not Set'
                    ),
                    'Auth_Mnge_Entry_Date_2',
                    'Auth_Mnge_Exit_Date_2',
                    array(
                        'name' => 'Auth_Mnge_Region_Id',
                        'value' => isset($managed_model->authMngeRegion->Region_Name) ? $managed_model->authMngeRegion->Region_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Auth_Mnge_Profession_Id',
                        'value' => isset($managed_model->authMngeProfession->Profession_Name) ? $managed_model->authMngeProfession->Profession_Name : 'Not Set'
                    ),
                    'Auth_Mnge_File',
                    'Auth_Mnge_Duration',
                    array(
                        'name' => 'Auth_Mnge_Avl_Work_Cat_Id',
                        'value' => isset($managed_model->authMngeAvlWorkCat->Work_Category_Name) ? $managed_model->authMngeAvlWorkCat->Work_Category_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Auth_Mnge_Type_Rght_Id',
                        'value' => isset($managed_model->authMngeTypeRght->Type_Rights_Name) ? $managed_model->authMngeTypeRght->Type_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Auth_Mnge_Managed_Rights_Id',
                        'value' => isset($managed_model->authMngeManagedRights->Mgd_Rights_Name) ? $managed_model->authMngeManagedRights->Mgd_Rights_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Auth_Mnge_Territories_Id',
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
//        'Auth_Biogrph_Id',
                    'Auth_Biogrph_Annotation',
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4>Biography Uploaded Files</h4>
        <?php
        $uploaded_files = array();
        if(!empty($biograph_model))
            $uploaded_files = AuthorBiographUploads::model()->findAll('Auth_Biogrph_Id = :bio_id', array(':bio_id' => $biograph_model->Auth_Biogrph_Id));
        if (!empty($uploaded_files)) {
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
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "Author Biograph {$i}" ?></a></td>
                            <td><?php echo $uploaded_file->Auth_Biogrph_Upl_Description ?></td>
                            <td><?php echo $uploaded_file->Created ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/authoraccount/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/authoraccount/biofiledelete/', 'id' => $uploaded_file->Auth_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => ".popup-link{$i}"));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else{
            echo 'No data created';
        }
        ?>

        <h4>Assigned Groups</h4>
        <?php
        $members = GroupMembers::model()->findAll('Group_Member_GUID = :int_code', array(':int_code' => $model->Auth_GUID));
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
                                <td><?php echo $member->group->Group_Name ?></td>
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
        <h4 class="box-title">Assigned Works</h4>
        <?php
        $works = WorkRightholder::model()->findAll('Work_Member_GUID = :int_code', array(':int_code' => $model->Auth_GUID));
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
                                    <td><?php echo CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('/site/work/view', 'id' => $work->Work_Id)); ?></td>
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


<div class="row">
    <div class="user-view col-lg-12">
        <h4 class="box-title">Uploaded Documents</h4>
        <?php
        $uploaded_files = AuthorUpload::model()->findAll('Auth_Acc_Id = :acc_id', array(':acc_id' => $model->Auth_Acc_Id));
        if (!empty($uploaded_files)) {
            ?>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Document Name</th>
                            <?php if ($export == false) { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                        <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $uploaded_file->Auth_Upl_Doc_Name ?></td>
                                <?php if ($export == false) { ?>
                                    <td>
                                        <?php
                                        $file_path = $uploaded_file->getFilePath();
                                        echo CHtml::link('<i class="fa fa-download"></i>', array('/site/authoraccount/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                        echo "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-eye"></i>', $file_path, array('target' => '_blank', 'title' => 'View'));
                                        echo "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/authoraccount/update/id/' . $model->Auth_Acc_Id . '/tab/8/fileedit/' . $uploaded_file->Auth_Upl_Id), array('title' => 'Edit'));
                                        echo "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/authoraccount/filedelete/id/' . $uploaded_file->Auth_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                        ?>
                                    </td>
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