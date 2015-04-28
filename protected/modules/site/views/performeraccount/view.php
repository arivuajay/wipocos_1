<?php
/* @var $this PerformeraccountController */
/* @var $model PerformerAccount */

$this->title='View #'.$model->Perf_Acc_Id;
$this->breadcrumbs=array(
	'Performers'=>array('index'),
	'View '.'PerformerAccount',
);
?>
<div class="user-view col-lg-12">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Perf_Acc_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Perf_Acc_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
</div>
<div class="row">
<div class="user-view col-lg-6">
    <h4>Basic Data</h4>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Perf_Acc_Id',
		'Perf_Sur_Name',
		'Perf_First_Name',
		'Perf_Internal_Code',
		'Perf_Ipi',
		'Perf_Ipi_Base_Number',
		'Perf_Ipn_Number',
		'Perf_DOB',
                array(
                    'name' => 'Perf_Place_Of_Birth_Id',
                    'value' => isset($model->perfPlaceOfBirth->Region_Name) ? $model->perfPlaceOfBirth->Region_Name : 'Not Set'
                ),
                array(
                    'name' => 'Perf_Birth_Country_Id',
                    'value' => isset($model->perfBirthCountry->Country_Name) ? $model->perfBirthCountry->Country_Name : 'Not Set'
                ),
                array(
                    'name' => 'Perf_Nationality_Id',
                    'value' => isset($model->perfNationality->Nation_Name) ? $model->perfNationality->Nation_Name : 'Not Set'
                ),
                array(
                    'name' => 'Perf_Language_Id',
                    'value' => isset($model->perfLanguage->Lang_Name) ? $model->perfLanguage->Lang_Name : 'Not Set'
                ),
		'Perf_Identity_Number',
                array(
                    'name' => 'Perf_Marital_Status_Id',
                    'value' => isset($model->perfMaritalStatus->Marital_State) ? $model->perfMaritalStatus->Marital_State : 'Not Set'
                ),
		'Perf_Spouse_Name',
		array(
                'name' => 'Perf_Gender',
                'value' => Myclass::getGender($model->Perf_Gender)
            ),
		array(
                'name' => 'Status',
                'type' => 'raw',
                'value' => $model->status
            ),
	),
)); ?>
</div>

    <div class="user-view col-lg-6">
    <h4>Payment</h4>
    <?php
    if(!empty($payment_model)){
    $this->widget('zii.widgets.CDetailView', array(
    'data'=>$payment_model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
    'attributes'=>array(
//        'Perf_Pay_Method_id',
        'Perf_Bank_Account_1',
        'Perf_Bank_Account_2',
        'Perf_Bank_Account_3',
    ),
));
    }else{
        echo 'Payment Not Created';
    }
?>
    <h4>Pseudonyms</h4>
    <?php
    if(!empty($psedonym_model)){
    $this->widget('zii.widgets.CDetailView', array(
    'data'=>$psedonym_model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
    'attributes'=>array(
//        'Perf_Pseudo_Type_Id',
        array(
            'name' => 'Perf_Pseudo_Type_Id',
            'value' => isset($psedonym_model->perfPseudoType->Pseudo_Code) ? $psedonym_model->perfPseudoType->Pseudo_Code : 'Not Set'
        ),
        'Perf_Pseudo_Name',
    ),
));
    }else{
        echo 'Pseudonyms Not Created';
    }?>


        <h4>Death Inheritance</h4>
    <?php
    if(!empty($death_model)){
    $this->widget('zii.widgets.CDetailView', array(
    'data'=>$death_model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
    'attributes'=>array(
//        'Perf_Death_Inhrt_Id',
        'Perf_Death_Inhrt_Firstname',
        'Perf_Death_Inhrt_Surname',
        'Perf_Death_Inhrt_Email',
        'Perf_Death_Inhrt_Phone',
        'Perf_Death_Inhrt_Address_1',
        'Perf_Death_Inhrt_Address_2',
        'Perf_Death_Inhrt_Address_3',
        'Perf_Death_Inhrt_Addtion_Annotation',
    ),
));
    }else{
        echo 'Death Inheritance Not Created';
    }?>


</div>


</div>

<div class="row">
<div class="user-view col-lg-6">
    <h4>Address</h4>
    <?php
    if(!empty($address_model)){
    $this->widget('zii.widgets.CDetailView', array(
    'data'=>$address_model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
    'attributes'=>array(
        'Perf_Home_Address_1',
        'Perf_Home_Address_2',
        'Perf_Home_Address_3',
        'Perf_Home_Fax',
        'Perf_Home_Telephone',
        'Perf_Home_Email',
        'Perf_Home_Website',
        'Perf_Mailing_Address_1',
        'Perf_Mailing_Address_2',
        'Perf_Mailing_Address_3',
        'Perf_Mailing_Telephone',
        'Perf_Mailing_Fax',
        'Perf_Mailing_Email',
        'Perf_Mailing_Website',
        'Perf_Performer_Account_1',
        'Perf_Performer_Account_2',
        'Perf_Performer_Account_3',
        'Perf_Performer_Account_1',
        'Perf_Performer_Account_2',
        'Perf_Performer_Account_3',
        array(
            'name' => 'Perf_Unknown_Address',
            'type' => 'raw',
            'value' => $address_model->Perf_Unknown_Address == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
        ),
//        array(
//                'name' => 'Active',
//                'type' => 'raw',
//                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
    ),
));
    }else{
        echo 'Address Not Created';
    }
?>
</div>
<div class="user-view col-lg-6">
    <h4>Related Rights</h4>
    <?php
    if(!empty($related_model)){
    $this->widget('zii.widgets.CDetailView', array(
    'data'=>$related_model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
    'attributes'=>array(
//        'Perf_Rel_Rgt_Id',
//        'Perf_Rel_Society_Id',
        'Perf_Rel_Entry_Date',
        'Perf_Rel_Exit_Date',
        array(
            'name' => 'Perf_Rel_Internal_Position_Id',
            'value' => isset($related_model->perfRelInternalPosition->Int_Post_Name) ? $related_model->perfRelInternalPosition->Int_Post_Name : 'Not Set'
        ),
        'Perf_Rel_Entry_Date_2',
        'Perf_Rel_Exit_Date_2',
        array(
            'name' => 'Perf_Rel_Region_Id',
            'value' => isset($related_model->perfRelRegion->Region_Name) ? $related_model->perfRelRegion->Region_Name : 'Not Set'
        ),
        array(
            'name' => 'Perf_Rel_Profession_Id',
            'value' => isset($related_model->perfRelProfession->Profession_Name) ? $related_model->perfRelProfession->Profession_Name : 'Not Set'
        ),
        'Perf_Rel_File',
        'Perf_Rel_Duration',
        array(
            'name' => 'Perf_Rel_Avl_Work_Cat_Id',
            'value' => isset($related_model->perfRelAvlWorkCat->Work_Category_Name) ? $related_model->perfRelAvlWorkCat->Work_Category_Name : 'Not Set'
        ),
//        array(
//            'name' => 'Perf_Rel_Type_Rght_Id',
//            'value' => isset($related_model->perfRelTypeRght->Type_Rights_Name) ? $related_model->perfRelTypeRght->Type_Rights_Name : 'Not Set'
//        ),
        array(
            'name' => 'Perf_Rel_Managed_Rights_Id',
            'value' => isset($related_model->perfRelManagedRights->Mgd_Rights_Name) ? $related_model->perfRelManagedRights->Mgd_Rights_Name : 'Not Set'
        ),
        array(
            'name' => 'Perf_Rel_Territories_Id',
            'value' => isset($related_model->perfRelTerritories->Territory_Name) ? $related_model->perfRelTerritories->Territory_Name : 'Not Set'
        ),
    ),
));
    }else{
        echo 'Mmanaged Rights Not Created';
    }
?>


        <h4>Biography</h4>
    <?php
    if(!empty($biograph_model)){
    $this->widget('zii.widgets.CDetailView', array(
    'data'=>$biograph_model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
    'attributes'=>array(
//        'Perf_Biogrph_Id',
        'Perf_Biogrph_Annotation',
    ),
));
    }else{
        echo 'Biography Not Created';
    }?>

</div>
</div>
<div class="row">
    <div class="user-view col-lg-12">
<?php
$uploaded_files = PerformerUpload::model()->findAll('Perf_Acc_Id = :acc_id', array(':acc_id' => $model->Perf_Acc_Id));
if (!empty($uploaded_files)) {
    ?>
    <div class="">
        <div class="box-header">
            <h4 class="box-title">Uploaded Documents</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Document Name</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $uploaded_file->Perf_Upl_Doc_Name ?></td>
                            <td>
                                <?php
                                $file_path = $uploaded_file->getFilePath();
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/performeraccount/download','df'=> Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-eye"></i>', $file_path, array('target' => '_blank', 'title' => 'View')); 
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/performeraccount/update/id/' . $model->Perf_Acc_Id . '/tab/8/fileedit/' . $uploaded_file->Perf_Upl_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/performeraccount/filedelete/id/' . $uploaded_file->Perf_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")')); 
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>
        
    </div>
</div>