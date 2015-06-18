<?php
/* @var $this MastereventtypeController */
/* @var $model MasterEventType */

$this->title = 'Update Master Event Type: ' . $model->Evt_Type_Name;
$this->breadcrumbs = array(
    'Master Event Types' => array('index'),
    'Update Master Event Types',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>