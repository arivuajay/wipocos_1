<?php
/* @var $this AudittrailController */
/* @var $model AuditTrail */

$this->title='Update Audit Trails: '. $model->aud_id;
$this->breadcrumbs=array(
	'Audit Trails'=>array('index'),
	'Update Audit Trails',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>