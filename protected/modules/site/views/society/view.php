<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->title='View #'.$model->Society_Id;
$this->breadcrumbs=array(
	'Societies'=>array('index'),
	'View '.'Society',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Society_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Society_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php 

    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Society_Id',
		'Society_Abbr_Id',
		array(
                    'name' => 'Society_Logo_File',
                    'type' => 'raw',
                    'value' => CHtml::image($model->getFilePath(), 'logo', array('height' => '50px', 'width' => '50px'))
                ),
		'Society_Mailing_Address',
		array(
                    'name' => 'Society_Country_Id',
                    'value' => $model->socCountry->Country_Name
                ),
		array(
                    'name' => 'Society_Territory_Id',
                    'value' => $model->socTerritory->Territory_Name
                ),
		array(
                    'name' => 'Society_Region_Id',
                    'value' => $model->socRegion->Region_Name
                ),
		array(
                    'name' => 'Society_Profession_Id',
                    'value' => $model->socProfession->Profession_Name
                ),
		array(
                    'name' => 'Society_Role_Id',
                    'value' => $model->socRole->Description
                ),
		'Society_Hirearchy_Id',
		array(
                    'name' => 'Society_Payment_Id',
                    'value' => $model->socPayment->Paymode_Name
                ),
		'Society_Type_Id',
		'Society_Factor_Id',
		array(
                    'name' => 'Society_Doc_Type_Id',
                    'value' => $model->socDocType->Doc_Type_Name
                ),
		array(
                    'name' => 'Society_Doc_Id',
                    'value' => $model->socDoc->Doc_Name
                ),
		'Society_Duration',
		'Society_CopyRight',
		'Society_RelatedRights',
		'Society_Currency',
		'Society_Rate',
		'Society_Main_Performer_Id',
		'Society_Producer_Id',
		array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
	),
)); ?>
</div>



