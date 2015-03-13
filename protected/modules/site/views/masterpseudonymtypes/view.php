<?php
/* @var $this MasterpseudonymtypesController */
/* @var $model MasterPseudonymTypes */

$this->title='View #'.$model->Pseudo_Id;
$this->breadcrumbs=array(
	'Master Pseudonym Types'=>array('index'),
	'View '.'MasterPseudonymTypes',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Pseudo_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Pseudo_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Pseudo_Id',
		'Pseudo_Code',
		'Active',
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



