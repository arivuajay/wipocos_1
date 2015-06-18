<?php
/* @var $this MasterdocumentstatusController */
/* @var $model MasterDocumentStatus */

$this->title = 'Update Master Document Status: ' . $model->Document_Sts_Name;
$this->breadcrumbs = array(
    'Master Document Status' => array('index'),
    'Update Master Document Status',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>