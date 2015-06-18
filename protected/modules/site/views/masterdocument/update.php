<?php
/* @var $this MasterdocumentController */
/* @var $model MasterDocument */

$this->title = 'Update Master Document: ' . $model->Doc_Name;
$this->breadcrumbs = array(
    'Master Documents' => array('index'),
    'Update Master Documents',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>