<?php
/* @var $this MasterdocumentController */
/* @var $model MasterDocument */

$this->title = 'Update Master Documents: ' . $model->Master_Doc_Id;
$this->breadcrumbs = array(
    'Master Documents' => array('index'),
    'Update Master Documents',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>