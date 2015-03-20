<?php
/* @var $this NumberassignmentController */
/* @var $model NumberAssignment */

$this->title='View #'.$model->Num_Assgn_Id;
$this->breadcrumbs=array(
	'Number Assignments'=>array('index'),
	'View '.'NumberAssignment',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Num_Assgn_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Num_Assgn_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Num_Assgn_Id',
		'Num_Assgn_System_Id',
		'Num_Assgn_Series_From',
		'Num_Assgn_Series_To',
		'Num_Assgn_List',
		array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
	),
)); ?>
</div>



