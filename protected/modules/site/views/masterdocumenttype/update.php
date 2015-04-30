<?php
/* @var $this MasterdocumenttypeController */
/* @var $model MasterDocumentType */

$this->title = 'Update Master Document Types: ' . $model->Master_Doc_Type_Id;
$this->breadcrumbs = array(
    'Master Document Types' => array('index'),
    'Update Master Document Types',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>