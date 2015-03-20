<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->title='View #'.$model->Org_Id;
$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	'View '.'Organization',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Org_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Org_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php 

    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Org_Id',
		'Org_Abbr_Id',
		array(
                    'name' => 'Org_Logo_File',
                    'type' => 'raw',
                    'value' => CHtml::image($model->getFilePath(), 'logo', array('height' => '50px', 'width' => '50px'))
                ),
		'Org_Mailing_Address',
		array(
                    'name' => 'Org_Country_Id',
                    'value' => $model->orgCountry->Country_Name
                ),
		array(
                    'name' => 'Org_Territory_Id',
                    'value' => $model->orgTerritory->Territory_Name
                ),
		array(
                    'name' => 'Org_Region_Id',
                    'value' => $model->orgRegion->Region_Name
                ),
		array(
                    'name' => 'Org_Profession_Id',
                    'value' => $model->orgProfession->Profession_Name
                ),
		array(
                    'name' => 'Org_Role_Id',
                    'value' => $model->orgRole->Description
                ),
		'Org_Hirearchy_Id',
		array(
                    'name' => 'Org_Payment_Id',
                    'value' => $model->orgPayment->Paymode_Name
                ),
		'Org_Type_Id',
		'Org_Factor_Id',
		array(
                    'name' => 'Org_Doc_Type_Id',
                    'value' => $model->orgDocType->Doc_Type_Name
                ),
		array(
                    'name' => 'Org_Doc_Id',
                    'value' => $model->orgDoc->Doc_Name
                ),
		'Org_Duration',
		'Org_CopyRight',
		'Org_RelatedRights',
		'Org_Currency',
		'Org_Rate',
		'Org_Main_Performer_Id',
		'Org_Producer_Id',
		array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
	),
)); ?>
</div>



