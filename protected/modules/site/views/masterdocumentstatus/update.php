<?php
/* @var $this MasterdocumentstatusController */
/* @var $model MasterDocumentStatus */

$this->title='Update Master Document Statuses: '. $model->Master_Document_Sts_Id;
$this->breadcrumbs=array(
	'Master Document Statuses'=>array('index'),
	'Update Master Document Statuses',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>