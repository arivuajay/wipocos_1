<?php
/* @var $this AudittrailController */
/* @var $model AuditTrail */

$this->title='View #'.$model->aud_id;
$this->breadcrumbs=array(
	'Audit Trails'=>array('index'),
	'View '.'AuditTrail',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->aud_id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->aud_id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'aud_id',
		'aud_user',
		'aud_class',
		'aud_action',
		'aud_message',
		'aud_ip_address',
		'aud_created_date',
	),
)); ?>
</div>



