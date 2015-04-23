<?php
/* @var $this PublishergroupController */
/* @var $model PublisherGroup */

$this->title='View #'.$model->Pub_Group_Id;
$this->breadcrumbs=array(
	'Publisher Groups'=>array('index'),
	'View '.'PublisherGroup',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Pub_Group_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Pub_Group_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Pub_Group_Name',
                array(
                'name' => 'Pub_Group_Is_Publisher',
                'type' => 'raw',
                'value' => ($model->Pub_Group_Is_Publisher == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                ),
                array(
                'name' => 'Pub_Group_Is_Producer',
                'type' => 'raw',
                'value' => ($model->Pub_Group_Is_Producer == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                ),
		'Pub_Internal_Code',
		'Pub_IPI_Name_Number',
		'Pub_IPN_Base_Number',
		'Pub_Group_IPD_Number',
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
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
	),
)); ?>
</div>



