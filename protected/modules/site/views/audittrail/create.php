<?php
/* @var $this AudittrailController */
/* @var $model AuditTrail */

$this->title='Create Audit Trails';
$this->breadcrumbs=array(
	'Audit Trails'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
