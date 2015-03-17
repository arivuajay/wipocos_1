<?php
/* @var $this MasterdocumentstatusController */
/* @var $model MasterDocumentStatus */

$this->title='Create Master Document Statuses';
$this->breadcrumbs=array(
	'Master Document Statuses'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
