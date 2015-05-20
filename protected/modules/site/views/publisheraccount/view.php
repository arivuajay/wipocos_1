<?php
/* @var $this ProduceraccountController */
/* @var $model ProducerAccount */

$this->title = 'View #' . $model->Pub_Acc_Id;
$this->breadcrumbs = array(
    'Producers' => array('index'),
    'View ' . 'ProducerAccount',
);
?>
<div class="user-view col-lg-12">
    <p>
        <?php
        $this->widget(
                'booster.widgets.TbButton', array(
            'label' => 'Update',
            'url' => array('update', 'id' => $model->Pub_Acc_Id),
            'buttonType' => 'link',
            'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
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
            'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                )
        );
        ?>
    </p>
</div>
<div class="row">
    <div class="user-view col-lg-6">
        <h4>Basic Data</h4>
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'htmlOptions' => array('class' => 'table table-striped table-bordered'),
            'attributes' => array(
                'Pub_Acc_Id',
                'Pub_Internal_Code',
                'Pub_Corporate_Name',
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
//        array(
//                'name' => 'Active',
//                'type' => 'raw',
//                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
                ),
            ));
        } else {
            echo 'Address Not Created';
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
                ),
            ));
        } else {
            echo 'Payment Not Created';
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
                ),
            ));
        } else {
            echo 'Pseudonyms Not Created';
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
                ),
            ));
        } else {
            echo 'Liquidation and Inheritance Not Created';
        }
        ?>
        <h4>Related Rights</h4>
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
                ),
            ));
        } else {
            echo 'Releted Rights Not Created';
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
                    'Pub_Biogrph_Annotation',
                ),
            ));
        } else {
            echo 'Biography Not Created';
        }
        ?>
        <br />
        <?php
        $members = PublisherGroupMembers::model()->findAll('Pub_Group_Member_Internal_Code = :int_code', array(':int_code' => $model->Pub_Internal_Code));
        if (!empty($members)) {
            ?>
            <div class="">
                <div class="box-header">
                    <h4 class="box-title">Assigned Groups</h4>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
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
                        </tbody></table>
                </div>
            </div>
            <?php
        } else {
            echo 'No groups assigned';
        }
        ?>
        <?php
        $works = WorkRightholder::model()->findAll('Work_Member_Internal_Code = :int_code', array(':int_code' => $model->Pub_Internal_Code));
        if (!empty($works)) {
            ?>
            <h4 class="box-title">Assigned Works</h4>
            <div class="box-body no-padding">
                <table class="table table-condensed">
                    <tbody><tr>
                            <th>#</th>
                            <th>Works Name</th>
                            <th>Action</th>
                        </tr>
    <?php foreach ($works as $key => $work) { ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $work->work->Work_Org_Title ?></td>
                                <td><?php echo CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('/site/work/view', 'id' => $work->Work_Id)); ?></td>
                            </tr>
            <?php } ?>
                    </tbody></table>
            </div>
<?php } else {
    echo 'No works assigned';
} ?>

    </div>
</div>