<?php
/* @var $this AuthoraccountController */
/* @var $model AuthorAccount */

$this->title='View #'.$model->Auth_Acc_Id;
$this->breadcrumbs=array(
	'Authors'=>array('index'),
	'View '.'AuthorAccount',
);
?>
<div class="user-view col-lg-12">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Auth_Acc_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Auth_Acc_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
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
		'Auth_Acc_Id',
		'Auth_Sur_Name',
		'Auth_First_Name',
		'Auth_Internal_Code',
		'Auth_Ipi_Number',
		'Auth_Ipi_Base_Number',
		'Auth_Ipn_Number',
		'Auth_Date_Of_Birth',
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
		'Auth_Gender',
		array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
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
        'Auth_Pay_Method_id',
        'Auth_Bank_Account_1',
        'Auth_Bank_Account_2',
        'Auth_Bank_Account_3',
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
        'Auth_Pseudo_Type_Id',
        'Auth_Pseudo_Name',
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
        'Auth_Death_Inhrt_Id',
        'Auth_Acc_Id',
        'Auth_Death_Inhrt_Surname',
        'Auth_Death_Inhrt_Address_1',
        'Auth_Death_Inhrt_Address_2',
        'Auth_Death_Inhrt_Address_3',
        'Auth_Death_Inhrt_Addtion_Annotation',
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
        'Auth_Unknown_Address',
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
    <h4>Managed Rights</h4>
    <?php
    if(!empty($managed_model)){
    $this->widget('zii.widgets.CDetailView', array(
    'data'=>$managed_model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
    'attributes'=>array(
        'Auth_Mnge_Rgt_Id',
        'Auth_Acc_Id',
        'Auth_Mnge_Society_Id',
        'Auth_Mnge_Entry_Date',
        'Auth_Mnge_Exit_Date',
        'Auth_Mnge_Internal_Position_Id',
        'Auth_Mnge_Entry_Date_2',
        'Auth_Mnge_Exit_Date_2',
        'Auth_Mnge_Region_Id',
        'Auth_Mnge_Profession_Id',
        'Auth_Mnge_File',
        'Auth_Mnge_Duration',
        'Auth_Mnge_Avl_Work_Cat_Id',
        'Auth_Mnge_Type_Rght_Id',
        'Auth_Mnge_Managed_Rights_Id',
        'Auth_Mnge_Territories_Id',
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
    'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
    'attributes'=>array(
        'Auth_Biogrph_Id',
        'Auth_Acc_Id',
        'Auth_Biogrph_Annotation',
    ),
));
    }else{
        echo 'Biography Not Created';
    }?>

</div>
</div>





