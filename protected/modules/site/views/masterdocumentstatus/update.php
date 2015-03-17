<?php
/* @var $this MasterdocumentstatusController */
/* @var $model MasterDocumentStatus */

$this->title='Update Master Document Status: '. $model->Master_Document_Sts_Id;
$this->breadcrumbs=array(
	'Master Document Status'=>array('index'),
	'Update Master Document Status',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>